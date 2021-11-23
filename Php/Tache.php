<html>

<body>
<h1>Test de la classe Tache</h1>

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
$tacheTest=new Tache(003,"Nourrir les poulets","Il faut les nourrir pour les manger après",10/12/2021);
$tacheTest->show();
?>



</body>
</html>