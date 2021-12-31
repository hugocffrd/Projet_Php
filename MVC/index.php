<?php
require "Controller/Controller.php";

accueil();

try {
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "connection") {
?>
            <meta http-equiv="refresh" content="0;url=Vues/connexion.php">
        <?php
        }
        if ($_GET["action"] == "inscription") {
        ?>
            <meta http-equiv="refresh" content="0;url=Vues/creerUtilisateur .php">
        <?php
        }
        if ($_GET["action"] == "creerListe") {
        ?>
            <meta http-equiv="refresh" content="0;url=Vues/creerListe.php">
<?php
        }
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}
