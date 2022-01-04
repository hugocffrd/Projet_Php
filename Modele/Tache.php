

<?php

class Tache
{
    private $IdT;
    private $Nom;
    private $Texte;
    private $DateFin;
    private $IdL;
    private $Checked;


    public function getChecked()
    {
        return $this->Checked;
    }

    public function setIdT($IdT): void
    {
        $this->IdT = $IdT;
    }


    public function getIdT()
    {
        return $this->IdT;
    }

    public function setNom($Nom): void
    {
        $this->Nom = $Nom;
    }

    public function getNom()
    {
        return $this->Nom;
    }

    public function setTexte($Texte): void
    {
        $this->Texte = $Texte;
    }

    public function getTexte()
    {
        return $this->Texte;
    }


    public function setDateFin($DateFin): void
    {
        $this->DateFin = $DateFin;
    }

    public function getDateFin()
    {
        return $this->DateFin;
    }

    public function getIdL()
    {
        return $this->IdL;
    }

    public function __construct($IdT,$Nom,$Texte,$DateFin,$IdL,$Checked)
    {
        $this->IdT=$IdT;
        $this->Nom=$Nom;
        $this->Texte=$Texte;
        $this->DateFin=$DateFin;
        $this->IdL=$IdL;
        $this->Checked=$Checked;
    }

    public function show(){
        print $this->IdT." ".$this->Nom.",".$this->Texte.",".$this->DateFin.",".$this->IdL."<br>";
    }


}
?>
