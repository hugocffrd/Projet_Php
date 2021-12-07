<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" media="screen" type="text/css" />
</head>

<body>

<?php
require_once '../Modele/TacheGateway.php';
require_once '../Modele/ListeTacheGateway.php';
$Tgateway = new TacheGateway("mysql:host=localhost;dbname=dbroot", "root", "");
$LTgateway = new ListeTacheGateway("mysql:host=localhost;dbname=dbroot", "root", "");

$tabFindListeTache[] = $LTgateway->findAll();
foreach ($tabFindListeTache as $tabL) {
    foreach ($tabL as $liste) {
        $tabFindTache=array();
        if ($liste->getPrivee() == false) {
            $tabFindTache[] = $Tgateway->findbyIdL($liste->getIdL());
            print("<br>".$liste->getNom().":<br>");
            foreach ($tabFindTache as $tabT) {
                foreach ($tabT as $tache) {
                    print($tache->getNom() . " " . $tache->getTexte() . " " . $tache->getDateFin() . "<br>");
                }
            }
        }
    }
}
?>
    <div id="container">
        <button class="bouton" height="100px" onclick=window.location.href='connexion.php'>Connexion</button>
        <button class="bouton" height="100px" onclick=window.location.href='creerUtilisateur.php'>Inscription</button>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button">Action</button>
                <button class="dropdown-item" type="button">Another action</button>
                <button class="dropdown-item" type="button">Something else here</button>
            </div>
        </div>


    </div>


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

    .dropdown{
        background-color: aliceblue;
        margin-top: 20px;
        width: 50%;
        padding: 14px 20px ;
        border-radius: 5px;
        horiz-align: center;
    }
</style>

</html>