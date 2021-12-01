<?php

class Utilisateur
{
    public $Mail;
    public $Nom;
    public $Prenom;
    public $Pwd;

    public function __construct($Mail,$Nom,$Prenom,$Pwd){
        $this->Mail=$Mail;
        $this->Nom=$Nom;
        $this->Prenom=$Prenom;
        $this->Pwd=$Pwd;
    }

    public function get_Nom(){
        return $this->Nom;
    }

    public function get_Prenom(){
        return $this->Prenom;
    }

    
}