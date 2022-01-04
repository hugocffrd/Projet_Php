
<?php
require_once '../ConnectBDD/ConnectBDD.php';
require_once "../Modele/ListeTache.php";
require_once '../Modele/ListeTacheGateway.php';
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';


$con = new ConnectBDD();
$connect = $con->getConnect();
$LTgateway = new ListeTacheGateway($connect);
$Tgateway = new TacheGateway($connect);

if (isset($_GET['action'])) {
    $IdL = $_GET['action'];
}

$tabFindtache[] = $Tgateway->findByIdL($IdL);
$tabFindListe[] = $LTgateway->findById($IdL);
foreach ($tabFindtache as $tabT) {
    foreach ($tabT as $tache) {
        $Tgateway->suppTache($tache);
    }
}
foreach ($tabFindListe as $tabL) {
    foreach ($tabL as $liste) {
        $LTgateway->suppListe($liste);
    }
}
if ($liste->getPrivee() == 1) {
    header('Location:accueilco.php');
} else header('location:../index.php');

?>