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
        <button class="bouton" height="100px" onclick=window.location.href='creerListe.html'>Nouvelle liste</button>
        <div class="listBlock">

        <nav class="navbar navbar-light navbar-1 white">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">Navbar</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent15"
                    aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent15">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
                <!-- Links -->

            </div>
            <!-- Collapsible content -->

        </nav>
        <!--/.Navbar-->

            <select name="color" id="color">
                <option value="">--- Choose a color ---</option>
                <option value="red">✔️</option>
                <option value="green">Green</option>
                <option value="blue">Blue</option>
            </select>

        </div>
    </div>
    <?php
    require_once '../Connections/ConnectBDD.php';
    require_once '../Modele/TacheGateway.php';
    require_once '../Modele/ListeTacheGateway.php';

    $con= new ConnectBDD();
    $Tgateway = new TacheGateway($con->getConnect());
    $LTgateway = new ListeTacheGateway($con->getConnect());
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

    .navbar.navbar-1 .navbar-toggler-icon {
        background-image: url('https://mdbcdn.b-cdn.net/img/svg/hamburger6.svg?color=000');
    }
    .navbar{
        background-color: aliceblue;
        border-radius: 5px;
    }

    .listBlock{
        background-color: blueviolet;
        border-radius: 10px;
        width: 70%;
    }
</style>


</html>