<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 22:27
 */

namespace Auth\Acl;

use Auth\Storage\IdentityManager;
use Zend\Debug\Debug;
use Zend\Permissions\Acl\Acl as AclDb;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

class Acl extends AclDb {

    protected $role_defaul='5';
    protected $identityManager;
    protected $resources;
    protected $roles;
    protected $is_admin;
    protected $actionsDefault=['useronline','access-deny','login','authenticate','success','logout-success','logout',
                                'updateprofile','update-password','finalizar','forgothen-password','register','confirmemail',
                                'calback','sociallogin','saida','backend'];
    protected $privilesActions=[
        'delete'=>['index','print','search-item','create','update','delete'],
        'create'=>['create','update','index','print','search-item'],
        'update'=>['update','index','print','search-item'],
        'index'=>['index','print','search-item'],
        'print'=>['print'],
    ];

    public function __construct(IdentityManager $identityManager,Roles $roles,Resources $resources,Privileges $privileges)
    {
       $this->identityManager=$identityManager;
        if($this->identityManager->hasIdentity()){
            $this->role_defaul=$this->identityManager->hasIdentity()->role_id;

        }
        $this->setIsAdmin($roles->getIsAdmin($this->role_defaul));
        $this->_setRoles($roles);
        $this->__setResources($resources);
        $this->_setPrivileges($privileges);
    }

    /**
     * @param $roles
     * @return $this
     */
    private function _setRoles(Roles $roles)
    {
        $this->roles=$roles->getRoleId();
        krsort($this->roles);
        //Adidiona as roles
        foreach ($this->roles as $role) {
            //Verifica a role ja foi add
            if (!$this->hasRole((string) $role->getId())) {
                //Inicia os parents da role ex:1 e parent da 2 a 2 da 3 etc
                //a 1 herda da 2,3,4 e 5
                $parentNames = array();
                if (!is_null($role->getParentId()) && (int) $role->getParentId()) {
                    $parentNames = (string) $role->getParentId();
                }
                //Adiciana a role
                $this->addRole(new Role((string) $role->getId()), $parentNames);
            }

            //Se a role for index conceda todos os privileges
            if ($role->getIsAdmin()) {
                $this->allow((string) $role->getId(), array(), array());
            }
        }
        return $this;
    }

    /**
     * @param $resources
     * @return $this
     */
    private function __setResources(Resources $resources)
    {
        //Da Tabela De Resourses
        $this->resources=$resources->getResources();
        //Controller Das Configurações Add Todos Os Controllers Do Sistema
        if($resources->getController()){
            foreach ($resources->getController() as $key => $resource) {
                if (!$this->hasResource($key)) {
                    $this->addResource(new Resource($key));
                }
            }
        }

        return $this;
    }

    /**
     * @param Privileges $privileges
     * @return $this
     */
    private function _setPrivileges(Privileges $privileges)
    {
        $list=$privileges->getPrivileges();
        if($list){
            foreach ($list as $key=> $privilege) {
                if(isset($this->privilesActions[$privilege['title']])){
                    $allow=array_merge($this->privilesActions[$privilege['title']],$this->actionsDefault);
                }
                else
                {
                    $allow=array_merge($privilege['title'],$this->actionsDefault);
                }
                if($privilege['allowed']==="allow" || $this->getIsAdmin()):
                    $this->allow((string) $privilege['role_id'], $this->resources[$privilege["resource_id"]], $allow);
                else:
                    $this->deny((string) $privilege['role_id'], $this->resources[$privilege["resource_id"]], $allow);
                endif;

            }
        }
        if ($this->hasResource('Auth\Controller\Auth')) {
            $this->allow((string)$this->role_defaul, 'Auth\Controller\Auth', $this->actionsDefault);
        }
        if ($this->hasResource('Auth\Controller\UpdatePassword')) {
            $this->allow((string) $this->role_defaul,'Auth\Controller\UpdatePassword', $this->actionsDefault);
        }
        if ($this->hasResource('Auth\Controller\Profile')) {
            $this->allow((string) $this->role_defaul,'Auth\Controller\Profile', $this->actionsDefault);
        }
        return $this;
    }


    /**
     * @return string
     */
    public function getRoleDefaul()
    {
        return $this->role_defaul;
    }

    /**
     * @return mixed
     */
    public function getIdentityManager()
    {
        return $this->identityManager;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->is_admin;
    }

    /**
     * @param mixed $is_admin
     */
    public function setIsAdmin($is_admin)
    {
        $this->is_admin = $is_admin;
    }



} 