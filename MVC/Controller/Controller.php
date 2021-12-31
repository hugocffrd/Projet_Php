<?php
function accueil()
{
    require "Vues/Accueil.php";
}
function connexion()
{
    require "Vues/Connexion.php";
}
function erreur($msgErreur)
{
    require 'vueErreur.php';
}
