
<?php
require_once '../ConnectBDD/ConnectBDD.php';
require_once "../Modele/ListeTache.php";
require_once '../Modele/ListeTacheGateway.php';
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';

$con = new ConnectBDD();
$connect = $con->getConnect();
$LTgateway = new ListeTacheGateway($connect);
$IdL= htmlspecialchars (($_POST['idListe']));

$tabFindListe[]=$LTgateway->findById($IdL);
foreach ($tabFindListe as $tab){
    foreach ($tab as $liste){
        $LTgateway->suppListe($liste);
    }
}

?>