<?php

class ListeTache
{
    private $IdL;
    private $lesTaches=array(Tache::class);
    private $mailU;
    private $privee;

    public function getIdL()
    {
        return $this->IdL;
    }

    public function getLesTaches(): array
    {
        return $this->lesTaches;
    }

    public function getPrivee()
    {
        return $this->privee;
    }

    public function getMailU()
    {
        return $this->mailU;
    }

    public function __construct($IdL,$lesTaches,$privee,$mailU){
        $this->IdL=$IdL;
        $this->lesTaches=$lesTaches;
        $this->privee=$privee;
        $this->mailU=$mailU;
    }


}