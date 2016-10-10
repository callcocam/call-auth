<?php
/**
 * Created by PhpStorm.
 * User: claudio
 * Date: 27/08/2016
 * Time: 10:26
 */

namespace Auth\Storage;


class Result {

    protected $message;
    const SUCCESS = 1;
    const FAILURE = 0;
    const FAILURE_IDENTITY_NOT_FOUND = -1;
    const FAILURE_IDENTITY_AMBIGUOUS = -2;
    const FAILURE_CREDENTIAL_INVALID = -3;
    const FAILURE_UNCATEGORIZED = -4;

    public function __construct($code, $identity, array $messages = [
            0=>"OH NO! NÃO FOI POSSIVEL COMPLETAR A OPERAÇÃO",
            1=>"OLÁ! %s, SEJA BEM VINDO",
            -1=>"OH NO! NÃO FOI POSSIVEL ENCONTRAR VOÇÊ",
            -2=>"OH NO! NÃO FOI POSSIVEL COMPLETAR A OPERAÇÃO",
            -3=>"OH NO! SUA SENHA NÃO FOI DIGITADA CORRETAMENTE.",
            -4=>"OH NO! NÃO FOI POSSIVEL COMPLETAR A OPERAÇÃO",
        ]
    )
    {

        switch ($code) {

            case Result::FAILURE:
                $this->message = "OH NO! NÃO FOI POSSIVEL COMPLETAR A OPERAÇÃO";
                break;

            case Result::SUCCESS:
                $this->message = sprintf($messages[$code],$identity);
                break;

            case Result::FAILURE_IDENTITY_NOT_FOUND:
                $this->message = $messages[$code];
                break;

            case Result::FAILURE_IDENTITY_AMBIGUOUS:
                $this->message = $messages[$code];
                break;

            case Result::FAILURE_CREDENTIAL_INVALID:
                $this->message = $messages[$code];
                break;

            case Result::FAILURE_UNCATEGORIZED:
                $this->message = $messages[$code];
                break;

            default:
                $this->message = "OH NO! NÃO FOI POSSIVEL COMPLETAR A OPERAÇÃO";
                break;
        }
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }


}