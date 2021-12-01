

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

    public function get_Nom(){
        return $this->Nom;
    }

    public function get_Texte(){
        return $this->Texte;
    }

    public function  get_DateFin(){
        return $this->DateFin;
    }

}
?>
