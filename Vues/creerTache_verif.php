<?php
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';

if (isset($_POST['Ntache'])) {

    $Tgateway = new TacheGateway("mysql:host=localhost;dbname=dbroot", "root", "");

    $nom = htmlspecialchars($_POST['Ntache']);
    $desc = htmlspecialchars($_POST['Tdesc']);
    if (htmlspecialchars($_POST['dateF'])) {
        $date = htmlspecialchars($_POST['dateF']);
    } else $date = null;


    $idl = 0; // 0 pour public de base
    $nbid = 0;

    //Pour connaitre le nombre de tâches totales
    $connect = new Connection("mysql:host=localhost;dbname=dbroot", "root", "");
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
        $tacheCreer = new Tache($id, $nom, $desc, $date, $idl);
        $Tgateway->insertTache($tacheCreer);
        header('Location:CreerTache.php?reg_err=success');
    } else header('Location:CreerTache.php?reg_err=nom');
} else header('Location:CreerTache.php?reg_err=ErreurTache');
