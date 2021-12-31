<?php
function accueil()
{
    require_once "Vues/Accueil.php";
}
function connexion()
{
    require_once "Vues/Connexion.php";
}
function erreur($msgErreur)
{
    require_once 'vueErreur.php';
}
