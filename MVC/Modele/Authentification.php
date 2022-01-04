<?php
session_start();
include '../ConnectBDD/ConnectBDD.php';

if (isset($_POST['mail']) && isset($_POST['password'])) {

    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);
    $con = new ConnectBDD();
    $connect = $con->getConnect();

    $check = $connect->prepare('SELECT Nom , Mail, Pwd from utilisateur where Mail = ?');
    $check->execute(array($mail));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 1) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            // $password = hash('sha256', $password);

            if ($password  == $data['Pwd']) {
                $_SESSION['user'] = $data['Nom'];
                header('Location:../Vues/accueilco.php');
            } else header('Location:../Vues/connexion.php?login_err=password');
        } else header('Location:../Vues/connexion.php?login_err=mail');
    } else header('Location:../Vues/connexion.php?login_err=already');
} else header('Location:../Vues/connexion.php');
