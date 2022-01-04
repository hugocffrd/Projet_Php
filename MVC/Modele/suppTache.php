
<?php
require_once '../ConnectBDD/ConnectBDD.php';
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';


$con = new ConnectBDD();
$connect = $con->getConnect();
$Tgateway = new TacheGateway($connect);

if (isset($_GET['action'])) {
    $IdT = $_GET['action'];
}
if (isset($_GET['user'])) {
    $isconected = $_GET['user'];
} else $isconected = 0;


$tabFindtache[] = $Tgateway->findById($IdT);

foreach ($tabFindtache as $tabT) {
    foreach ($tabT as $tache) {
        $Tgateway->suppTache($tache);
    }
}
if ($isconected == 1) {
    header('Location:../Vues/accueilco.php');
} else {
    header('Location:../index.php');
}
?>
