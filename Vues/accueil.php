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
        $Tgateway=new TacheGateway("mysql:host=localhost;dbname=dbroot","root","");

        $tabFindTache[]=$Tgateway->findAll();
        foreach ($tabFindTache as $tab){
            foreach ($tab as $tache){
                print ($tache->getNom().$tache->getTexte().$tache->getDateFin());}
}
    ?>

</body>
</html>


