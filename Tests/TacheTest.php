<html lang="FR">
    <body>
    <h1>Test création tâche</h1>
    <?php

        require_once "../Php/Tache.php";
        require_once "../Php/TacheGateway.php";

        $pdoExcp=new Exception();
        $tacheTest = new Tache(004, 'Nourrir les hugo', 'Il faut les nourrir pour les manger après', '10 / 12 / 2021');
        $tacheTest->show();


        $Tgateway=new TacheGateway("mysql:host=localhost;dbname=dbroot","root","");
        //$Tgateway->insertTache($tacheTest);

        $findTache=$Tgateway->findById(004);
        $findTache->show();
    ?>
    </body>
</html>

