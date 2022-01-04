<!DOCTYPE html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" media="screen" type="text/css" />

</head>

<body>

    <H1 id="titlePublic"> Page publique </H1>
    <div id="container">
        <button class="bouton" height="100px" onclick=window.location.href='index.php?action=connection'>Connexion</button>
        <button class="bouton" height="100px" onclick=window.location.href='index.php?action=inscription'>Inscription</button>
        <button class="bouton" height="100px" onclick=window.location.href='index.php?action=creerListe'>Créer liste</button>
    </div>

    <?php
    require 'ConnectBDD/ConnectBDD.php';
    require 'Modele/TacheGateway.php';
    require 'Modele/ListeTacheGateway.php';

    $con = new ConnectBDD();
    $Tgateway = new TacheGateway($con->getConnect());
    $LTgateway = new ListeTacheGateway($con->getConnect());
    $tabFindListeTache[] = $LTgateway->findAll();

    ?>

    <div class="text-center" id="divLists">

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
                            <button type="button" class="btn" id="suppList" onclick=window.location='Modele/suppListe.php?action=<?php echo $liste->getIdL() ?>'> X
                            </button>
                        </div>

                        <div class="btn-group-vertical">
                            <?php

                            foreach ($tabFindTache as $tabT) {
                                foreach ($tabT as $tache) {

                            ?>
                                    <div id="containerTache">

                                        <?php if ($tache->getChecked()) { ?>
                                            <form class="checkbox" method="post" action="Modele/updateTache.php?action=<?php echo $tache->getIdT() ?>">
                                                <input class="form-check-input" checked="true" type="checkbox" id="checkboxNoLabel" onclick="this.form.submit()">

                                                <?php if ($tache->getDateFin() < date('Y-m-d')) { ?>
                                                    <button type="button" class="btn btn-secondary" onclick=window.location='Vues/gestionTache.php?action=<?php echo $tache->getIdT() ?>' id="BLate">
                                                        <label class="strikethrough"><?php echo $tache->getNom(); ?></label>
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-secondary" onclick=window.location='Vues/gestionTache.php?action=<?php echo $tache->getIdT() ?>' id="BOk">
                                                        <label class="strikethrough"><?php echo $tache->getNom(); ?></label>
                                                    </button>
                                                <?php } ?>
                                            </form>
                                        <?php } else { ?>
                                            <form class="checkbox" method="post" action="Modele/updateTache.php?action=<?php echo $tache->getIdT() ?>">

                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" onclick="this.form.submit()">

                                                <?php if ($tache->getDateFin() < date('Y-m-d')) { ?>
                                                    <button type="button" class="btn btn-secondary" onclick=window.location='Vues/gestionTache.php?action=<?php echo $tache->getIdT() ?>' id="BLate">
                                                        <label class="strikethrough"><?php echo $tache->getNom(); ?></label>
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-secondary" onclick=window.location='Vues/gestionTache.php?action=<?php echo $tache->getIdT() ?>' id="BOk">
                                                        <label class="strikethrough"><?php echo $tache->getNom(); ?></label>
                                                    </button>
                                            <?php }
                                            } ?>
                                            </form>
                                    </div>
                                <?php
                                }
                                ?>
                        </div>
                    <?php
                            }
                            $tabFindTache = array();
                    ?>
                    <button type="button" class="boutonAdd btn btn-success" onclick=window.location='Vues/creerTache.php?action=<?php echo $liste->getIdL() ?>'> Créer tâche
                    </button>
                    </div>

        <?php
                }
            }
        }
        ?>


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<style>
    body {
        background: #90cbff;
        display: flex;
        flex-direction: column;
        justify-content: center;

    }

    #container {
        margin-top: 5%;
        display: flex;
        justify-content: center;
    }

    .bouton {
        background-color: #EEB241;
        color: white;
        padding: 14px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        width: 15%;
        margin: 2px;
    }

    input[type=checkbox]:checked+label.strikethrough {
        text-decoration: line-through;
    }

    #titlePublic {
        text-align: center;
    }

    #containerTache {
        width: 100%;
    }

    #containerList {
        background-color: lightgray;
        border-radius: 10px;
        width: 40%;
        margin: 20px;
        margin-left: auto;
        margin-right: auto;

    }

    .btn-group-vertical {
        width: 100%;
    }

    .boutonAdd {
        margin: 5px;
    }

    #BLate {
        color: lightsalmon;
        width: 100%;
    }

    #BOk {
        color: white;
        width: 100%;
    }

    #headerlist {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #suppList {
        margin: 5px;
        background-color: firebrick;
    }
</style>


</html>