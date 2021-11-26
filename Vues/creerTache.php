<!DOCTYPE html>
<html lang="FR" >
<head>
    <meta charset="UTF-8">
    <title>Creation Tache</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">
    <form action="creerTache.php" method="post">
        <div class="row">
            <h4>Tâche</h4>
            <div class="input-group input-group-icon" >
                <input type="number" placeholder="id" name="id"/>
                <div class="input-icon"><i class="fa fa-user"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input type="text" placeholder="Nom de votre tâche" name="nom"/>
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input type="text" placeholder="Description" name="desc"/>
                <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input type="date" placeholder="date de fin" name="date"/>
                <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>
            <div class="input-group input-group-icon">
                <input type="submit" value="Valider"/>
                <div class="input-icon"><i class="fa fa-key"></i></div>
            </div>


        </div>
    </form>
</div>
<?php
require_once "../Php/Tache.php";
require_once '../Php/TacheGateway.php';
$id = isset($_POST['id']) ? $_POST['id'] : "";
$nom =isset($_POST['nom']) ? $_POST['nom'] : "";
$desc =isset($_POST['desc']) ? $_POST['desc'] : "";
$date = isset($_POST['date']) ? $_POST['date'] : "";

$tacheCreer=new Tache($id,$nom,$desc,$date);
$Tgateway=new TacheGateway("mysql:host=localhost;dbname=dbroot","root","");
$Tgateway->insertTache($tacheCreer);

//$Tgateway=new TacheGateway("mysql:host=localhost;dbname=dbroot","root","");
//$Tgateway->insertTache($tacheCreer);
print("ID : $id <br>Nom : $nom <br>Description : $desc<br>Date : $date");


?>
</body>
</html>
