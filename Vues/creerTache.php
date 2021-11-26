<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="creerTache.php" method="post">
    <p>Id de la tache : <input type="text" name="id" /></p>
    <p>Nom de la tache : <input type="text" name="nom" /></p>
    <p>Description de la tache : <input type="text" name="desc" /></p>
    <p>date de création de la tache : <input type="date" name="date" /></p>
    <p><input type="submit" value="Valider"></p>
</form>

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
print("ID : $id <br>Nom : $nom <br>Description : $desc<br>Date : $date");


?>

</body>
</html>