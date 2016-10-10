<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 10:21
 */

namespace Auth\Storage;


interface IdentityManagerInterface {

    public function login($identity, $credential,$user_agent,$ip_address);
    public function logout();
    public function hasIdentity();
    public function storeIdentity($identity);
    public function getAuthService();
} 