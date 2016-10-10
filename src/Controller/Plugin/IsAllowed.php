<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 22:41
 */

namespace Auth\Controller\Plugin;


use Auth\Acl\Acl;
use Zend\Debug\Debug;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Mvc\MvcEvent;

class IsAllowed extends AbstractPlugin{
    /**
     * @var
     */
    private $auth;
    /**
     * @var Acl
     */
    private $acl;

    /**
     * @param $auth
     * @param $acl
     */
    public function __construct($auth,$acl) {

        $this->auth = $auth;
        $this->acl = $acl;
    }

    public function __invoke(MvcEvent $e) {

        $controller = $e->getTarget();
        if (!$controller) {
            $controller = $e->getRouteMatch()->getParam('controller');
        }
       //$controller_class = get_class($controller);

        //$Resource = strtolower(str_replace("\\", "_", $controller_class));
        //$Resource =  $controller_class;
        $Resource =  $e->getRouteMatch()->getParam('controller','Auth\Controller\Auth');
        $privilege = $e->getRouteMatch()->getParam('action');
        if($this->acl->getIsAdmin()){
            return true;
        }

        if (!$this->acl->hasResource($Resource)) {
            return false;
            // throw new Exception('Resource ' . $Resource . ' not defined');
        }
        if ($this->auth->hasIdentity()) {
            $user = $this->auth->hasIdentity();
            $role =(string)$user->role_id;
           // $result=['resources'=>$Resource,'roles'=>$role,'privilege'=>$privilege];
           // Debug::dump($result);

            return $this->acl->isAllowed($role, $Resource, $privilege);
        } else {
            return $this->acl->isAllowed($this->acl->getRoleDefaul(), $Resource, $privilege);
        }
    }
} 