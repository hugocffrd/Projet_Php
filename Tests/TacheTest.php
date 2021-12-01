<html lang="FR">
    <body>
    <h1>Test pour les tâches</h1>
    <?php

        require_once "../Php/Tache.php";
        require_once "../Php/TacheGateway.php";

        //Test création tache en mémoire
        $pdoExcp=new Exception();
        $tacheTest = new Tache(004, 'Nourrir les hugo', 'Il faut les nourrir pour les manger après', '10 / 12 / 2021');
        $tacheTest->show();

        
    

        //Test création tache dans base de données
        $Tgateway=new TacheGateway("mysql:host=localhost;dbname=dbroot","root","");
        //$Tgateway->insertTache($tacheTest);
        //Test recherche d'une tache avec l'identifiant
        $tabFindTache[]=$Tgateway->findById(005);
        foreach ($tabFindTache as $tab){
            foreach ($tab as $tache){
                $tache->show();}
        } 
    ?>
    </body>
</html>

