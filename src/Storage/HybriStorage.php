<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 10:49
 */

namespace Auth\Storage;

use Zend\Authentication\Storage\Session as SessionStorage;

class HybriStorage extends SessionStorage  {

    /**
     * @param int $rememberMe
     * @param int $time
     */
    public function setRememberMe($rememberMe = 0, $time = 1209600) {
        if ($rememberMe == 1) {
            $this->session->getManager()->rememberMe($time);
        }
    }

    /**
     *
     */
    public function forgetMe() {
        $this->session->getManager()->forgetMe();
    }

    /**
     * @return O Id Da Sessão
     */
    public function getSessionId()
    {
        return $this->session->getManager()->getId();
    }
}