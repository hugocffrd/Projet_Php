<?php
session_start();

require_once '../ConnectBDD/ConnectBDD.php';
require_once '../Modele/TacheGateway.php';
require_once '../Modele/ListeTacheGateway.php';


// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:connexion.php');
    die();
}
$con = new ConnectBDD();
$connect = $con->getConnect();
// On récupere les données de l'utilisateur
$req = $connect->prepare('SELECT * FROM utilisateur WHERE Nom = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();
?>

<!doctype html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="text-center">
    <h1 class="p-5">Bonjour <?php echo $data['Prenom'];
        echo " ";
        echo $data['Nom'];
        ?> !</h1>
    <hr/>

    <a href="deconnexion.php" class="btn btn-danger bouton">Déconnexion</a>
    <button class="bouton btn btn-primary" height="100px" onclick=window.location.href='creerListe.php'>+ liste
        publique
    </button>
    <button class="bouton btn btn-primary" height="100px"
            onclick=window.location.href='creerListePrivee.php?action=<?php echo $data['Mail'] ?>'>+ liste
        privée
    </button>
</div>

<?php
$Tgateway = new TacheGateway($connect);
$LTgateway = new ListeTacheGateway($connect);
$tabFindListeTache[] = $LTgateway->findAll();
?>

<div class="text-center" id="divLists">
    <H2>Listes publiques</H2>

    <?php
    foreach ($tabFindListeTache

             as $tabL) {
        foreach ($tabL

                 as $liste) {
            if ($liste->getPrivee() == false) {

                $tabFindTache[] = $Tgateway->findByIdL($liste->getIdL());
                ?>
                <div id="containerList">
                    <div id="headerlist">
                        <H2> <?php echo $liste->getNom() ?></H2>
                        <button type="button" class="btn" id="suppList"
                                onclick=window.location.href='suppListe.php?action=<?php echo $liste->getIdL() ?>'> X
                        </button>
                    </div>

                    <div class="btn-group-vertical">
                        <?php

                        foreach ($tabFindTache

                        as $tabT) {
                        foreach ($tabT

                        as $tache) {


                        if ($tache->getDateFin() < date('Y-m-d')) {
                        ?>
                        <button type="button" class="btn btn-secondary"
                                onclick=window.location.href='gestionTache.php?action=<?php echo $tache->getIdT() ?>'
                                id="BLate">
                            <?php
                            echo $tache->getNom();
                            } else {
                            ?>
                            <button type="button" class="btn btn-secondary"
                                    onclick=window.location.href='gestionTache.php?action=<?php echo $tache->getIdT() ?>'
                                    id="BOk">
                                <?php
                                echo $tache->getNom();

                                }
                                }
                                }
                                $tabFindTache = array();
                                ?>
                            </button>
                    </div>
                    <button type="button" class="boutonAdd btn btn-success"
                            onclick=window.location.href='creerTache.php?action=<?php echo $liste->getIdL() ?>'> +
                        tâche
                    </button>
                </div>
                <?php
            }


        }
        ?>


        <?php
    }

    ?>

</div>
<div class="text-center" id="divLists">
    <H2>Listes privées</H2>

    <?php
    foreach ($tabFindListeTache

             as $tabL) {
        foreach ($tabL

                 as $liste) {
            if ($liste->getPrivee()) {
                if ($liste->getMailU() == $data['Mail']) {
                    $tabFindTache[] = $Tgateway->findByIdL($liste->getIdL());
                    ?>
                    <div id="containerList">
                        <div id="headerlist">
                            <H2> <?php echo $liste->getNom() ?></H2>
                            <button type="button" class="btn" id="suppList"
                                    onclick=window.location.href='suppListe.php?action=<?php echo $liste->getIdL() ?>'>
                                X
                            </button>
                        </div>

                        <div class="btn-group-vertical">
                            <?php

                            foreach ($tabFindTache

                            as $tabT) {
                            foreach ($tabT

                            as $tache) {


                            if ($tache->getDateFin() < date('Y-m-d')) {
                            ?>
                            <button type="button" class="btn btn-secondary"
                                    onclick=window.location.href='gestionTache.php?action=<?php echo $tache->getIdT() ?>'
                                    id="BLate">
                                <?php
                                echo $tache->getNom();
                                } else {
                                ?>
                                <button type="button" class="btn btn-secondary"
                                        onclick=window.location.href='gestionTache.php?action=<?php echo $tache->getIdT() ?>'
                                        id="BOk">
                                    <?php
                                    echo $tache->getNom();

                                    }
                                    }
                                    }
                                    $tabFindTache = array();
                                    ?>
                                </button>

                        </div>
                        <button type="button" class="boutonAdd btn btn-success"
                                onclick=window.location.href='creerTache.php?action=<?php echo $liste->getIdL() ?>'> +
                            tâche
                        </button>
                    </div>

                    <?php


                }

            }
        }
    }

    ?>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
<style>
    body {
        background: #90cbff;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    H2 {
        margin: 10px;
    }

    .bouton {
        background-color: #EEB241;
        color: white;
        padding: 14px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        width: 15%;
    }


    #containerList {
        background-color: lightgray;
        border-radius: 10px;
        width: 40%;
        margin: 20px;

    }

    .btn-group-vertical {
        width: 100%;
    }

    #BLate {
        color: lightsalmon;
    }

    #BOk {
        color: white;
    }

    .boutonAdd {
        margin: 5px;
    }

    #headerlist {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bouton {
        background-color: #EEB241;
        margin: 2px;
        color: white;
        padding: 14px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        width: 15%;
    }

    #suppList {
        margin: 5px;
        background-color: firebrick;
    }
</style>


</html>