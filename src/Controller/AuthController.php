<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 17/08/2016
 * Time: 00:57
 */

namespace Auth\Controller;


use Auth\Form\AuthFilter;
use Auth\Form\AuthForm;
use Auth\Form\ForgothenPasswordForm;
use Auth\Form\ProfileForm;
use Auth\Form\RegisterFilter;
use Auth\Form\RegisterForm;
use Auth\Form\UpdatePasswordForm;
use Auth\Model\Users\Profile;
use Auth\Model\Users\Users;
use Auth\Model\Users\UsersRepository;
use Auth\Storage\HybriStorage;
use Auth\Storage\Result;
use Auth\Storage\SocialAuth;
use Base\Controller\AbstractController;
use Base\Model\Check;
use Interop\Container\ContainerInterface;
use Mail\Service\Mail;
use Zend\Debug\Debug;
use Zend\Session\Container;
use Zend\View\Helper\ViewModel;
use Zend\View\Model\JsonModel;


class AuthController extends AbstractController {

    /**
     * @var $session_hybridauth Container
     */
    protected $session_hybridauth;

    /**
     * @var $hybridAuth SocialAuth
     */
    protected $hybridAuth;
    /**
     * @var $userWrapperFactory Profile
     */
    protected $userWrapperFactory;
    /**
     * @param ContainerInterface $containerInterface
     */
    function __construct(ContainerInterface $containerInterface)
    {
        $this->containerInterface=$containerInterface;
        $this->form=AuthForm::class;
        $this->filter=AuthFilter::class;
        $this->table=UsersRepository::class;
        $this->model=Users::class;
        $this->route="auth";
        $this->controller="auth";
        $this->getCache();
    }
  

    public function loginAction(){


        if($this->IdentityManager->hasIdentity()){
            return $this->redirect()->toRoute("{$this->route}/default",['controller'=>$this->controller,'action'=>'success']);
        }
        $this->template="/auth/auth/login";
        $this->form=$this->getForm();
        $view=$this->getView($this->data);
        $view->setVariable('form',$this->form);
        return $view;
    }

    /**
     * @return \Zend\Http\Response
     */
    public function authenticateAction()
    {
        if($this->IdentityManager->hasIdentity()){
            
            return $this->redirect()->toRoute("{$this->route}/default",['controller'=>$this->controller,'action'=>'success']);
        }
        
            //PEGAR OS DADOS DO USUARIO PASSADO VIA POST
            $request = $this->params()->fromPost();
            //PEGAMOS O FORMULARIO
            $this->form = $this->getForm();
            //VERIFICA SE FOI PASSADO UM POST
            if ($request) {
                //CARREGAMOS O FORMULARIO COM SO DADO DO USUARIO
                $this->form->setData($request);
                //VERIFICA SE O FORMULARIO É VALIDO
                if ($this->form->isValid()) {
                    //RECUPERA OS DADOS VALIDADOS DO FORMULARIO
                    $dataform = $this->form->getData();
                    //VERIFICA SE O USUARIO EXISTE
                    $result = $this->getIdentityManager()->login(
                        $dataform['email'],
                        $this->encryptPassword($dataform['email'],$dataform['password']),
                        $this->getRequest()->getServer('HTTP_USER_AGENT'),
                        $this->getRequest()->getServer('REMOTE_ADDR'));
                    //CARREGA AS MENSSAGENS COM A CLASS RESULT
                    $messagesResult=new Result($result->getCode(),$result->getIdentity());
                    //SE VALIDO O USUARIO ENTRA AQUI
                    if ($result->isValid()) {
                        //AUTHENTICADO COM SUCESSO
                        $user=$this->IdentityManager->hasIdentity();
                        $this->Messages()->flashSuccess("Oops! Seja Bem Vindo {$user->title}.");
                        return $this->redirect()->toRoute("admin");
                    } else {
                        //AUTHENTICAÇÃO INVALIDA
                        $this->Messages()->flashError($messagesResult->getMessage());
                        return $this->redirect()->toRoute($this->route);
                    }
                }
                else{
                    $this->Messages()->error("OS DADOS PASADOS SÃO INVALIDOS!");
                    //RECARREGA O FORMULARIO
                    $this->template="/auth/auth/login";
                    $view=$this->getView([]);
                    $view->setVariable('form',$this->form);
                    $view->setTemplate($this->template);
                    return $view;
                }
            }
            else{
                $this->Messages()->flashError("AUTENTICAÇÃO FALHOU, VOCÊ NÃO TEM PERMISSÃO!");
            }
        return $this->redirect()->toRoute("{$this->route}/default",['controller'=>$this->controller]);
    }

   
    public function updatepasswordAction(){

        if(!$this->IdentityManager->hasIdentity())
        {
            $this->Messages()->flashError("VOCÊ JA DEVE ESTAR LOGADO, POR ISSO NÃO É PERMITIDO CADASTRAR UM NOVO REGISTRO!");
            return $this->redirect()->toRoute("{$this->route}/default",['controller'=>$this->controller,'action'=>'register']);
        }
        $this->form=UpdatePasswordForm::class;
        if($this->getData()){
            $this->data['email']=$this->user->email;
            $this->prepareData($this->data);
            $result = $this->getTable()->changePassword($this->data['id'], $this->data['password']);
            $view=new JsonModel($this->getTable()->getData()->toArray());
            return $view;

        }

        $this->getForm();
        $this->form->setData($this->IdentityManager->toArray());
        $view=$this->getView($this->data);
        $view->setVariable('form',$this->form);
        return $view;
    }
    public function forgothenpasswordAction(){

        if($this->IdentityManager->hasIdentity()){
            $this->Messages()->flashError("AUTENTICAÇÃO FALHOU, VOCÊ NÃO TEM PERMISSÃO!");
            return $this->redirect()->toRoute($this->route);
        }
        $this->table=UsersRepository::class;
        $this->model=Users::class;
        $this->form=ForgothenPasswordForm::class;
        $this->getForm();
        if($this->getData()){
            $this->form->setData($this->data);
            //VERIFICA SE O FORMULARIO E VALIDO
            if ($this->form->isValid()) {
                $usr_email = $this->data['email'];
                //PEGA OS DADOS DO USUARIO NO BANCO PELO EMAIL
                $auth = $this->getTable()->getUserByEmail($usr_email);
                //VERIFICA SE ENCONTRO UM USUARIO
                if ($auth) {
                    //GERA UMA NOVA MSENHA
                    $password = $this->encryptPassword($usr_email, md5(date("YmdHis")), $this->config->staticsalt);
                    $auth->setPassword($this->encryptPassword($usr_email, $password, $this->config->staticsalt));
                    //TENTA ALTERAR A SENHA NO BANCO
                    $result = $this->getTable()->changePassword($auth->getId(),$auth->getPassword());
                    //SE ALTERO A SENHA ENVIA POR EMAIL
                    if ($result) {
                        $this->Messages()->flashSuccess("MSG_FORGOTTEN_PASSWORD_SUCCCESS");
                        //ENVIA A SENHA POR EMAIL
                        $this->sendPasswordByEmail($usr_email, $password);
                        return $this->redirect()->toRoute('auth');
                    } else {
                        $this->Messages()->error("MSG_FORGOTTEN_PASSWORD_ERROR");
                    }
                }
                else{
                    $this->Messages()->error("OPPSS! O EMAIL {$usr_email} NÃO FI ENCONTRADO!");
                }
            } else {
                foreach ($this->form->getMessages() as $msg):
                    $this->Messages()->error(implode(PHP_EOL, $msg));
                endforeach;
            }
        }
        $this->form->setData((array)$this->user);
        $view=$this->getView($this->data);
        $view->setVariable('form',$this->form);
        // $view->setTemplate('/admin/admin/editar');
        return $view;
    }

    public function sendPasswordByEmail($usr_email, $password) {
        //URL DO SITE
        $url = sprintf("%s", $this->getRequest()->getServer('HTTP_ORIGIN'));
        $data['url'] = $url;
        //NOVO PASSWORD
        $data['password'] = $password;
        //SERVIÇO DE EMAIL
        $mail = $this->containerInterface->get(Mail::class);
        //SETAMOS AS INFORMAÇÕES DE ENVIO
        //:assunto ->Subject
        //:email do usuario que se cadastro ->To
        //:dados do email ->Data
        //:template de email ->Template
        $mail->setSubject('Your password has been changed!')
            ->setTo($usr_email)
            ->setData($data)
            ->setViewTemplate('forgotten-password');
        $mail->send();
    }

    public function successAction(){

        $view=$this->getView($this->data);
        return $view;
    }
public function accessdenyAction(){

        $view=$this->getView($this->data);
        return $view;
    }


    public function logoutsuccessAction(){

        $view=$this->getView($this->data);
        return $view;
    }

    public function logoutAction()
    {
        $title=$this->user->title;
       if ($this->getIdentityManager()->hasIdentity()) {
            $this->getIdentityManager()->logout();

        }
        $this->Messages()->flashSuccess("Até breve {$title}!");
       return $this->redirect()->toRoute("{$this->route}/default",['controller'=>$this->controller]);

    }
    
}