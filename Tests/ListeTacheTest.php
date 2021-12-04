<!DOCTYPE html>
<body>
<h1>Test pour les listes</h1>
<?php

require_once "../Modele/ListeTache.php";
require_once "../Modele/ListeTacheGateway.php";

//Test création Liste de tache en mémoire
$pdoExcp=new Exception();
$listeTest = new ListeTache(001, false, NULL);

//Test création liste dans base de données
$LTgateway=new ListeTacheGateway("mysql:host=localhost;dbname=dbroot","root","");
//$LTgateway->insertListe($listeTest);
$listeTest = new ListeTache(002, false, NULL);
//$LTgateway->insertListe($listeTest);

//Test recherche d'une liste avec l'identifiant
$tabFindListe[]=$LTgateway->findById(002);
foreach ($tabFindListe as $tab){
    foreach ($tab as $liste){
        print ($liste->getIdL()." ".$liste->getPrivee());
    }
}
?>
</body>
</html>
