<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div id="container">
        <!-- zone de connexion -->

        <form action="creerTache.php" method="POST">
            <h1>Tâche</h1>

            <label><b>Id</b></label>

            <input type="number" placeholder="id" name="id" />

            <label><b>Nom de la Tâche</b></label>
            <input type="text" placeholder="Nom de votre tâche" name="nom" />

            <label><b>Description</b></label>
            <input type="text" placeholder="Description" name="desc" />

            <label><b>date de fin</b></label>
            <input type="date" placeholder="date de fin" name="date" />

            <input type="submit" id='submit' value='LOGIN'>

        </form>
    </div>
</body>

<style>
    body {
        background: #90cbff;
    }

    #container {
        width: 400px;
        margin: 0 auto;
        margin-top: 10%;
    }

    form {
        width: 100%;
        padding: 30px;
        border: 1px solid #f1f1f1;
        background: #fff;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    #container h1 {
        align-self: center;
        width: fit-content;
        margin: 0 auto;
        padding-bottom: 10px;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type=mail],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type=number],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type=submit] {
        background-color: #fea347;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    input[type=submit]:hover {
        background-color: white;
        color: #fea347;
        border: 1px solid #fea347;
    }
</style>

</html>
<?php
require_once "../Modele/Tache.php";
require_once '../Modele/TacheGateway.php';
$id = isset($_POST['id']);
$nom = isset($_POST['nom']);
$desc = isset($_POST['desc']);
$date = isset($_POST['date']);

//$idl = isset($_POST['idl']); à coder !!!

$tacheCreer = new Tache($id, $nom, $desc, $date, $idl);
$Tgateway = new TacheGateway("mysql:host=localhost;dbname=dbroot", "root", "");
$Tgateway->insertTache($tacheCreer);

print("ID : $id <br>Nom : $nom <br>Description : $desc<br>Date : $date");
?>