<?php
require_once '../ConnectBDD/ConnectBDD.php';
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';


$con = new ConnectBDD();
$connect = $con->getConnect();
$Tgateway = new TacheGateway($connect);

if (isset($_POST["user"])) {
    $isconected = 1;
} else $isconected = 0;

if (isset($_GET['action'])) {
    $IdT = $_GET['action'];
}

$tabFindtache[] = $Tgateway->findById($IdT);


foreach ($tabFindtache as $tabT) {
    foreach ($tabT as $tache) {
        if ($tache->getChecked()) {
            $Tgateway->updateChecked($tache, 0);
        } else {
            $Tgateway->updateChecked($tache, 1);
        }
    }
}

if ($isconected == 1) {
    header('Location:accueilco.php');
} else {
    header('Location:../index.php');
}
