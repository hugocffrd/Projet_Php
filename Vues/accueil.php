<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" media="screen" type="text/css" />
</head>

<body>
    <div id="container">
        <button class="bouton" height="100px" onclick=window.location.href='connexion.php'>Connexion</button>
        <button class="bouton" height="100px" onclick=window.location.href='creerUtilisateur.php'>Inscription</button>
        <button class="bouton" height="100px" onclick=window.location.href='creerListe.php'>Nouvelle liste</button>
        <div class="listBlock">



        </div>
    </div>
    <?php
    require_once '../ConnectBDD/ConnectBDD.php';
    require_once '../Modele/TacheGateway.php';
    require_once '../Modele/ListeTacheGateway.php';

    $con= new ConnectBDD();
    $Tgateway = new TacheGateway($con->getConnect());
    $LTgateway = new ListeTacheGateway($con->getConnect());
    $tabFindListeTache[] = $LTgateway->findAll();

    ?>
      <div class="text-center">
        <select class="form-select form-select-lg mb-3" id="listSelect">
            <option selected="selected">Selection Publiques</option>
            <?php


            // Parcourir le tableau des listes
            foreach ($tabFindListeTache as $tabL) {
                foreach ($tabL as $liste) {
                    if ($liste->getPrivee() == false) {

            ?>
    <option value="<?php echo $liste->getNom(); ?>">
        <?php echo $liste->getNom(); ?>
    </option>
    <?php
    }
    }
    }
    ?>

    </select>

          <select class="form-select" multiple aria-label="multiple select example" id="listSelect">
              <option selected="selected">Tâches</option>
              <?php

              $tabFindTache[] = $Tgateway->findByIdL($liste->getIdl());
              // Parcourir le tableau des taches
              foreach ($tabFindTache as $tabT) {
                  foreach ($tabT as $tache) {

                      ?>
                      <option value="<?php echo $tache->getNom(); ?>">
                          <?php echo $tache->getNom(); ?>
                      </option>
                      <?php
                  }

              }
              ?>
          </select>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<style>
    body {
        background: #90cbff;
    }
    #container {
        width: 1000px;
        margin: 0 auto;
        margin-top: 5%;
    }
    .bouton{
        background-color: #EEB241;
        color: white;
        padding: 14px 20px;
        margin-left: 10px;
        border: none;
        cursor: pointer;
        width: 15%;
    }
    #listSelect{
        border-radius: 10px;
        background-color: lightgray;
        margin-top: 20px;
        width: 15%;
    }
</style>


</html>