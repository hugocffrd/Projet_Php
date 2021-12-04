<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="styleCo.css" media="screen" type="text/css" />
    </head>

    <body>
        <button height="100px" onclick=window.location.href='connexion.php'>Connexion</button>
        <button height="100px" onclick=window.location.href='creerUtilisateur.php'>Inscription</button>
    </body>
</html>

    <?php
        require_once '../Modele/TacheGateway.php';
        require_once '../Modele/ListeTacheGateway.php';
        $Tgateway=new TacheGateway("mysql:host=localhost;dbname=dbroot","root","");
        $LTgateway=new ListeTacheGateway("mysql:host=localhost;dbname=dbroot","root","");

        $tabFindListeTache[]=$LTgateway->findAll();
        foreach ($tabFindListeTache as $tabL){
            foreach ($tabL as $liste){
                if ($liste->getPrivee()==false){
                    $tabFindTache[]=$Tgateway->findbyIdL($liste->getIdL());
                    print("<br>Liste ".$liste->getIdL().":<br>");
                    foreach ($tabFindTache as $tabT) {
                        foreach ($tabT as $tache) {
                            print ($tache->getNom() . " " . $tache->getTexte() . " " . $tache->getDateFin()."<br>");
                        }
                    }
                }
            }
        }
    ?>

</body>
</html>


