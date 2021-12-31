<?php
require "Controller/Controller.php";

accueil();
$action = $_GET['action'];

switch ($action) {
    case 'connection':
?>
        <meta http-equiv="refresh" content="0;url=Vues/connexion.php">
    <?php
        break;

    case 'inscription':
    ?>
        <meta http-equiv="refresh" content="0;url=Vues/creerUtilisateur.php">
    <?php
        break;

    case 'creerListe':
    ?>
        <meta http-equiv="refresh" content="0;url=Vues/creerListe.php">
<?php
}
