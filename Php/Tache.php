<?php

class Tache
{
    public $IdT;
    public $Nom;
    public $Texte;
    public $DateFin;

    public function __construct($IdT,$Nom,$Texte,$DateFin)
    {
        $this->IdT=$IdT;
        $this->Nom=$Nom;
        $this->Texte=$Texte;
        $this->DateFin=$DateFin;
    }

    public function show(){
        print $this->IdT." ".$this->Nom.",".$this->Texte.",".$this->DateFin."<br>";
    }

}

