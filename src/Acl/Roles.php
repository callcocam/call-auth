<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 22:23
 */

namespace Auth\Acl;


use Base\Model\AbstractRepository;
use Zend\Debug\Debug;
use Zend\Permissions\Acl\Role\RoleInterface;

class Roles  implements RoleInterface{

    protected $roles;
    protected $is_admin;
    /**
     * @param AbstractRepository $repository
     */
    public function __construct(AbstractRepository $repository){

        $Roles=$repository->findBy(['state'=>'0']);
        if($Roles->getResult()){
            foreach($Roles->getData() as $o){
                $this->roles[$o->getId()]=$o;
                $this->is_admin[$o->getId()]=$o->getIsAdmin();
            }
        }
    }
    /**
     * Returns the string identifier of the Role
     *
     * @return string
     */
    public function getRoleId()
    {
        return $this->roles;
    }

    /**
     * @return array
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * @return array
     */
    public function getIsAdmin($key)
    {
        return isset($this->is_admin[$key])?$this->is_admin[$key]:0;
    }
}