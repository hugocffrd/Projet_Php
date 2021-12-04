

<?php

class Tache
{
    private $IdT;

    public function getIdT()
    {
        return $this->IdT;
    }
    private $Nom;

    public function setNom($Nom): void
    {
        $this->Nom = $Nom;
    }

    public function getNom()
    {
        return $this->Nom;
    }
    private $Texte;

    public function setTexte($Texte): void
    {
        $this->Texte = $Texte;
    }

    public function getTexte()
    {
        return $this->Texte;
    }
    private $DateFin;

    public function setDateFin($DateFin): void
    {
        $this->DateFin = $DateFin;
    }

    public function getDateFin()
    {
        return $this->DateFin;
    }

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
?>
