<?php

class Utilisateur
{
    public $IdU;
    public $Nom;
    public $Prenom;
    public $Pwd;

    public function __construct($IdU,$Nom,$Prenom,$Pwd){
        $this->IdU=$IdU;
        $this->Nom=$Nom;
        $this->Prenom=$Prenom;
        $this->Pwd=$Pwd;
    }

    
}