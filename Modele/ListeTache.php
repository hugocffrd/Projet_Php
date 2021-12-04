<?php

class ListeTache
{
    private $IdL;
    private $mailU;
    private $privee;

    public function getIdL()
    {
        return $this->IdL;
    }


    public function getPrivee()
    {
        return $this->privee;
    }

    public function getMailU()
    {
        return $this->mailU;
    }

    public function __construct($IdL,$privee,$mailU){
        $this->IdL=$IdL;
        $this->privee=$privee;
        $this->mailU=$mailU;
    }


}