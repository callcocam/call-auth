<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 22:35
 */

namespace Auth\View\Helper;


use Auth\Acl\Acl;

use Auth\Model\Redesociais\RedesociaisRepository;
use Interop\Container\ContainerInterface;
use Zend\Debug\Debug;
use Zend\View\Helper\AbstractHelper;

class UserIdentity extends AbstractHelper {
    /**
     * @var Acl
     */
    protected $authAcl;
    protected $containerInterface;
    protected $hasIdentity;
    protected static $labels;
    protected static $html;
    protected $providers;

    protected $label;
    protected $field;

    public function getAuthAcl() {
        if ($this->authAcl) {
            return $this->authAcl;
        }
        else
            return false;
    }

    /**
     * @param ContainerInterface $containerInterface
     */
    public function __construct(ContainerInterface $containerInterface) {
        $this->authAcl =$containerInterface->get(Acl::class);
        $this->hasIdentity=$this->authAcl->getIdentityManager()->hasIdentity();
        $this->containerInterface=$containerInterface;
    }

    /**
     * @return mixed
     */
    public function getHasIdentity()
    {
        return $this->hasIdentity;
    }

    public function IsAllowed($role,$Resource,$privilege){
        if($this->authAcl->hasResource($Resource) && !$this->authAcl->getIsAdmin($role)){
            return $this->authAcl->isAllowed($role, $Resource, $privilege);
        }
        else{
            return true;
        }

    }

    public function getForm($html,$form){
        echo  $this->view->messages();
       /* $this->view->formElementErrors()
            ->setMessageOpenFormat('<ul class="nav"><li class="erro-obrigatorio">')
            ->setMessageSeparatorString('</li>')->render($form);*/
        $form->setAttribute("id","Manager");
        $form->setAttribute("class","form floating-label form-validate");
        $form->setAttribute("accept-charset","utf-8");
        $formRender[]= $this->view->form()->openTag($form);
        $this->GerarElement($form,false);
        $primeiro = str_replace(array_keys(self::$html), array_values(self::$html), $html);
        $formRender[]= str_replace(array_keys(self::$labels), array_values(self::$labels), $primeiro);
        $formRender[]= $this->view->form()->closeTag();
        return implode("",$formRender);
    }


    public function GerarElement($form,$removeClass=true) {
        foreach ($form->getElements() as $key => $element) {
            $visible = "";
            //verifica se o usuario pode ter acesso ao campo
            if ($element->hasAttribute('placeholder')) {
                $element->setAttribute('placeholder', '');
                //$element->setAttribute('placeholder', $this->view->translate($element->getAttribute('placeholder')));
            }
            if($removeClass){
                $element->setAttribute('class','');
            }

            if (!empty($element->getLabel())) {
                self::$labels["{{{$key}}}"] = $this->view->Html("label")->setAttributes(array("for" => $element->getName()))->setText($this->view->translate($element->getLabel()));
            }
            // verifica se e um campo hidden [oculto]
            if ($element->getAttribute('type') === "hidden") {
                self::$html["#{$key}#"] = $this->view->formHidden($element->setLabel(''));
            } elseif ($element->getAttribute('type') === "submit") {
                $this->setButton($element,$key);
            } elseif ($element->getAttribute('type') === "radio") {
                $this->setRadio($element,$key);
            }
            elseif($element->getAttribute('name')=="created" || $element->getAttribute('name')=="modified"){
            $this->setDate($element,$key);
            } elseif ($element->getAttribute('name') === "images") {
               $this->setImage($element,$key);
            } else {
               $this->setDefault($element,$key);
            }
        }

    }


    /**
     * @param $element
     * @param $key
     */
    public function setDefault($element, $key)
    {
        if(!empty($element->getOption('add-on-append'))){
            // $element->setOption('add-on-append',$this->view->fontAwesome($element->getOption('add-on-append')));
        }
        self::$html["#{$key}#"] = $this->view->formRow($element->setLabel(''));

    }

    public function setRadio($element, $key){
    // Debug::dump($element);die;
        foreach($element->getValueOptions() as $key_opt => $vale):
            $checked=$element->getValue()==$key_opt?true:false;
            $el=$this->view->Html('input')->setAttributes(['type'=>$element->getAttribute('type'),'name'=>$element->getAttribute('name'),'id'=>$element->getAttribute('id'),'value'=>$key_opt,'checked'=>$checked]);
            $span=$this->view->Html('span')->setText($vale);
            $label[]=$this->view->Html('label')->setClass($element->getOptions()['label_attributes']['class'])->setText($el)->appendText($span);
        endforeach;
        self:: $html["#{$key}#"] = implode('',$label);
      }

    /**
     * @param $element
     * @param $key
     */
    public function setDate($element, $key)
    {

        if(!empty($element->getOption('add-on-append'))){
            // $element->setOption('add-on-append',$this->view->fontAwesome($element->getOption('add-on-append')));
        }
        self::$html["#{$key}#"] = $this->view->formRow($element->setLabel(''));

    }

    /**
     * @param $element
     */
    public function setButton($element,$key)
    {
        if(!empty($element->getOption('add-on-append'))){
            $element->setOption('glyphicon',$this->view->fontAwesome($element->getOption('add-on-append')));
        }
        self::$html["#{$key}#"] = $this->view->MakeButton($element);
    }

    /**
     * @param $element
     * @param $key
     */
    public function setImage($element, $key)
    {
        $base_path = $this->containerInterface->get('request')->getServer('DOCUMENT_ROOT');
        $element->setOption('add-on-append',$this->view->glyphicon('picture'));
        $element->setOption('add-on-prepend',"Selec. Image");
        $element->setAttribute('type','text')->setLabel("");
        $this->labes["{{{$key}}}"]=$this->view->translate($element->getLabel());
        $this->fields["#{$key}#"]=$this->view->formElement($element);
        if (!is_file(sprintf("%s%sdist%s%s", $base_path, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, $element->getValue()))):
            $caminho = "no_avatar.jpg";
        else:
            $caminho = $element->getValue();
        endif;
        self::$html["#imagePreview#"] = \Base\Model\Check::Image($caminho, $element->getValue(), "420", "330", "thumbnail img-responsive preview_IMG");

        self::$html["#{$key}#"] = $this->view->formRow($element);
    }

    public function login_social(){

        $ul=$this->view->Html('ul');
        $redes=$this->containerInterface->get(RedesociaisRepository::class)->findBy(['state'=>'0']);
        $li=[];
        if($redes->getResult()):
            $data=$redes->getData();
             foreach($data as $rede):
                $icone=strtolower($rede->getProvider());
                $span=$this->view->Html('span')->setClass("fa fa-{$icone} fa-3x");
                $a=$this->view->Html('a')->setAttributes(['title'=>"Cadastrar-se Usando O {$rede->getProvider()}",'href'=>$this->view->url('authenticate/default',['provider'=>$rede->getProvider(),'redirect'=>'saida'])]);
                $a->setText($span);
                $li[]=$this->view->Html('li')->setClass("social-{$icone}")->setText($a);
            endforeach;

        endif;
        if($li){
            return $ul->setText(implode("",$li));
        }
        return '';
    }
    public function login_social_p(){
       $p=[];
       $read=$this->containerInterface->get(RedesociaisRepository::class)->findBy(['state'=>'0']);
       if($read->getResult()):
            $data=$read->getData();
            foreach($data as $red):
                $icone=strtolower($red->getProvider());
                $span=$this->view->Html('span')->setClass("fa fa-{$icone}  pull-left");
                $a=$this->view->Html('a')->setAttributes(['title'=>"Cadastrar-se Usando O {$red->getProvider()}",'class'=>'btn btn-block btn-raised btn-info','href'=>$this->view->url('authenticate/default',['provider'=>$red->getProvider(),'redirect'=>'saida'])]);
                $a->setText($span)->appendText("Login {$red->getProvider()}");
                $p[]=$this->view->Html('p')->setText($a);

            endforeach;

        endif;

            return implode("",$p);

    }

    public function nav_user_top($ulAttr=[],$liAttr=[],$aAttr=[]){
        $elementUl=$this->view->Html('ul');
        if($ulAttr){
            $elementUl->setAttributes($ulAttr);
        }

        $elementLi=$this->view->Html('li');
        if($liAttr){
            $elementLi->setAttributes($liAttr);
        }

        //NOME DO USUARIO
        $title=strtoupper($this->view->UserIdentity()->getHasIdentity()->title);
        //NIVEL DE ACESSO
        $access=strtoupper($this->view->UserIdentity()->getHasIdentity()->access);
        //SPAN COM O NOME DO USUARIO
        $span=$this->view->Html('span')->setClass('profile-info')->setText(
            strtoupper($title)
        )
        ->appendText($this->view->Html('small')->setText(
            strtoupper($access)
        ));
        //IMAGEN FOTO DO USUARIO
        $img=$this->view->Html('img')->setAttributes(['src'=>"/dist/tim.php?src=/dist/{$this->view->UserIdentity()->getHasIdentity()->images}&w=140&h=140",'alt'=>$this->view->UserIdentity()->getHasIdentity()->title]);

        //LINK PARA ABRIR O MENU DO USUARIO
        $link=$this->view->Html('a')->setAttributes(['href'=>"javascript:void(0);",'class'=>'dropdown-toggle ink-reaction','data-toggle'=>"dropdown"]);
        //SETA A IMAGEM EO O NOME DO USUARIO
        $link->setText($img)->appendText($span);
        //SET O LINK NO LI
        $elementLi->setText($link);
        //ABRE O SUB MENU
        $dropdown_menu=$this->view->Html('ul')->setClass('dropdown-menu animation-dock');
        //LINK PARA MINHA CONTA
        $minhaConta=$this->view->Html('a')->setAttributes(['href'=>$this->view->url('auth/default',['controller'=>'profile','action'=>'update-profile'])])->setText("MINHA CONTA");
        $liMinhaConta=$this->view->Html('li')->setText($minhaConta);
        $dropdown_menu->setText($liMinhaConta);

        //LINK ALTERA MEUS DADOS
        $updatePass=$this->view->Html('a')->setAttributes(['href'=>$this->view->url('auth/default',['controller'=>'update-password','action'=>'update-password'])])->setText("ALTERAR SENHA");
        $updatePassword=$this->view->Html('li')->setText($updatePass);
        $dropdown_menu->appendText($updatePassword);

        //LINK DO LOGOUT
        $logout=$this->view->Html('a')->setAttributes(['href'=>$this->view->url('auth/default',['controller'=>'auth','action'=>'logout'])])->setText("LOGOUT");
        $liLogout=$this->view->Html('li')->setText($logout);
        $dropdown_menu->appendText($liLogout);
        //LINK TODOS OS LINKS NO SUB MENU
        $elementLi->setText($link)->appendText($dropdown_menu);

        return $elementUl->setText($elementLi);

    }
}