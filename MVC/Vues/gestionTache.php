<!DOCTYPE html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" media="screen" type="text/css" />

</head>

<body>

    <div id="container">
        <?php
        require_once '../ConnectBDD/ConnectBDD.php';
        require_once '../Modele/TacheGateway.php';
        $con = new ConnectBDD();
        $Tgateway = new TacheGateway($con->getConnect());

        if (isset($_GET['action'])) {
            $IdT = $_GET['action'];
        }

        if (isset($_GET['user'])) {
            $conected = 1;
        } else $conected = 0;

        $tabFindTache[] = $Tgateway->findById($IdT);
        foreach ($tabFindTache as $tab) {
            foreach ($tab as $tache) {
        ?>
                <div id="headertache">
                    <H1> <?php echo $tache->getNom(); ?></H1>
                    <button type="button" class="btn" id="suppTache" onclick=window.location='../Modele/suppTache.php?action=<?php echo $tache->getIdT() ?>&user=<?php echo $conected; ?>'> X </button>
                </div>
                <?php

                ?>
                <H2>Description</H2>
                <?php
                echo $tache->getTexte();


                if ($tache->getDateFin() != NULL) {
                ?>
                    <H2>Date de fin</H2>
        <?php
                    echo $tache->getDateFin();
                }
            }
        }


        ?>
    </div>
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

    H1 {
        text-align: center;
    }

    H2 {
        font-size: 20px;
        margin: 5px;
    }

    #container {
        background-color: lightgray;
        border-radius: 10px;
        width: 40%;
        margin: 20px;
        margin-left: auto;
        margin-right: auto;
        padding: 5px;
        text-align: center;
    }

    #suppTache {
        margin: 5px;
        background-color: firebrick;
    }

    #headertache {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

</html>