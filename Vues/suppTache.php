
<?php
require_once '../ConnectBDD/ConnectBDD.php';
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';


$con = new ConnectBDD();
$connect = $con->getConnect();
$Tgateway=new TacheGateway($connect);

if (isset($_GET['action'])){
    $IdT=$_GET['action'];
}

$tabFindtache[]=$Tgateway->findById($IdT);

foreach ($tabFindtache as $tabT){
    foreach ($tabT as $tache){
        $Tgateway->suppTache($tache);
    }
}

?>
