<?php
session_start();
require '../Modele/Connection.php';

if (isset($_POST['mail']) && isset($_POST['password'])) {

    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);
    $connect = new PDO("mysql:host=localhost;dbname=dbroot", "root", "");

    $check = $connect->prepare('SELECT Nom , Mail, Pwd from utilisateur where Mail = ?');
    $check->execute(array($mail));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 1) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            // $password = hash('sha256', $password);

            if ($password  == $data['Pwd']) {
                $_SESSION['user'] = $data['Nom'];
                header('Location:accueil.php');
            } else header('Location:connexion.php?login_err=password');
        } else header('Location:connexion.php?login_err=mail');
    } else header('Location:connexion.php?login_err=already');
} else header('Location:connexion.php');
