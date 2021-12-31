<?php

class ListeTache
{
    private $IdL;
    private $Nom;
    private $mailU;
    private $privee;

    public function getIdL()
    {
        return $this->IdL;
    }

    public function getNom()
    {
        return $this->Nom;
    }

    public function getPrivee()
    {
        return $this->privee;
    }

    public function getMailU()
    {
        return $this->mailU;
    }

    public function __construct($IdL, $Nom, $privee, $mailU)
    {
        $this->IdL = $IdL;
        $this->Nom = $Nom;
        $this->privee = $privee;
        $this->mailU = $mailU;
    }
}
