<html>
<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="styleCo.css" media="screen" type="text/css" />
</head>
<body>
<div id="container">
    <!-- zone de connexion -->

    <form action="creerTache.php" method="POST">
        <center><h1>Tâche</h1></center>

        <label><b>Id</b></label>

        <input type="number" placeholder="id" name="id"/>

        <label><b>Nom de la Tâche</b></label>
        <input type="text" placeholder="Nom de votre tâche" name="nom"/>

        <label><b>Description</b></label>
        <input type="text" placeholder="Description" name="desc"/>

        <label><b>date de fin</b></label>
        <input type="date" placeholder="date de fin" name="date"/>

        <input type="submit" id='submit' value='LOGIN' >

    </form>
</div>
</body>
</html>
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