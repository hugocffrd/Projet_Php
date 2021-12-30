<?php

class Utilisateur
{
    private $Mail;
    private $Nom;
    private $Prenom;
    private $Pwd;

    public function getPrenom()
    {
        return $this->Prenom;
    }

    public function getMail()
    {
        return $this->Mail;
    }
    public function getPwd()
    {
        return $this->Pwd;
    }
    public function getNom()
    {
        return $this->Nom;
    }

    public function __construct($Mail,$Nom,$Prenom,$Pwd){
        $this->Mail=$Mail;
        $this->Nom=$Nom;
        $this->Prenom=$Prenom;
        $this->Pwd=$Pwd;
    }

    
}