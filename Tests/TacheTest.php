<!DOCTYPE html>
    <body>
    <h1>Test pour les tâches</h1>
    <?php

        require_once "../Modele/Tache.php";
        require_once "../Modele/TacheGateway.php";

        //Test création tache en mémoire
        $pdoExcp=new Exception();
        $tacheTest = new Tache(007, 'testDesListes2', 'Pour tester les listes encore', NULL,001);
        $tacheTest->show();


        //Test création tache dans base de données
        $Tgateway=new TacheGateway("mysql:host=localhost;dbname=dbroot","root","");
        //$Tgateway->insertTache($tacheTest);

        //Test recherche d'une tache avec l'identifiant
        $tabFindTache[]=$Tgateway->findById(006);
        foreach ($tabFindTache as $tab){
            foreach ($tab as $tache){
                $tache->show();}
        } 
    ?>
    </body>
</html>

