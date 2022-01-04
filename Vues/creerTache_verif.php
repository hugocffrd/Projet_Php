<?php
require_once '../ConnectBDD/ConnectBDD.php';
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';

if (isset($_GET['action'])){
    $idl=$_GET['action'];
}

if (isset($_POST['Ntache'])) {

    $con = new ConnectBDD();
    $connect = $con->getConnect();

    $Tgateway = new TacheGateway($connect);
    $nom = htmlspecialchars($_POST['Ntache']);
    $desc = htmlspecialchars($_POST['Tdesc']);
    if (htmlspecialchars($_POST['dateF'])) {
        $date = htmlspecialchars($_POST['dateF']);
    } else $date = null;


    $nbid = 0;

    //Pour connaitre le nombre de tâches totales
    $check = $connect->prepare('SELECT IdT from tache');
    $check->execute(array($nbid));
    $Nbrow = $check->rowCount();

    // si il n'y a aucune tâche alors on créer l'id 0
    if ($Nbrow == 0) {
        $id = 0;
    } else {
        $id = $Nbrow + 1; // Créer une id pour la tâche que l'on créer
    }


    if (strlen($nom) < 100) {
        $tacheCreer = new Tache($id, $nom, $desc, $date, $idl,0);
        $Tgateway->insertTache($tacheCreer);
        header('Location:CreerTache.php?reg_err=success');
    } else header('Location:CreerTache.php?reg_err=nom');
} else header('Location:CreerTache.php?reg_err=ErreurTache');
