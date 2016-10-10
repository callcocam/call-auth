<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 22:19
 */

namespace Auth\Acl;


use Base\Model\AbstractRepository;

class Privileges {
    protected $privileges=[];

    /**
     * @param AbstractRepository $repository
     */
    public function __construct(AbstractRepository $repository){
        $Privileges=$repository->findBy(['state'=>'0']);
        if($Privileges->getResult()){
            foreach($Privileges->getData() as $o){
                $this->privileges[]=$o->toArray();
            }
        }
    }

    /**
     * @return mixed
     */
    public function getPrivileges()
    {
        return $this->privileges;
    }

} 