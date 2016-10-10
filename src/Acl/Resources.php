<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 22:21
 */

namespace Auth\Acl;


use Base\Model\AbstractRepository;

class Resources {
    protected $resources=[];
    /**
     * @var array
     */
    private $controller;


    /**
     * @param AbstractRepository $repository
     * @param array $controller
     */
    public function __construct(AbstractRepository $repository,$controller=[]){
       //Carrega Os Resourses que adicionados Na Tabela De Resources
        $Resources=$repository->findBy(['state'=>'0']);
        if($Resources->getResult()){
            foreach($Resources->getData() as $o){
                $this->resources[$o->getId()]=$o->getAlias();
            }
        }
        $this->controller = $controller;
    }
    /**
     * @return array
     */
    public function getResources()
    {
        return $this->resources;
    }


    /**
     * @param string $key factories|invokables
     * @return um array de controllers
     */
    public function getController($key='factories')
    {
        return $this->controller[$key];
    }
} 