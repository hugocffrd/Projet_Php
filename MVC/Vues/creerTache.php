<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <?php
    if (isset($_GET['action'])) {
        $IdL = $_GET['action'];
    }
    if (isset($_GET['user'])) {
        $isconected = 1;
    } else $isconected = 0;


    ?>

    <div id="container">
        <?php
        if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch ($err) {
                case 'success':
        ?>
                    <div class="alert alert-success">
                        <strong>Succès </strong>Tâche créée !
                    </div>
                <?php
                    break;

                case 'nom':
                ?>
                    <div class="alert alert-danger">
                        <strong>Echec </strong>Le nom de votre tâche est trop long !
                    </div>
                <?php
                    break;
                case 'ErreurTache':
                ?>
                    <div class="alert alert-danger">
                        <strong>Echec </strong>Veuillez renseigner un nom de Tâche !
                    </div>
        <?php
            }
        }
        ?>
        <form action="../modele/creerTache_verif.php?action=<?php echo $IdL ?>" method="POST">
            <h1>Tâche</h1>

            <label><b>Nom de la Tâche</b></label>
            <input type="text" placeholder="Nom de votre tâche" name="Ntache" required="required" />

            <label><b>Description</b></label>
            <input type="text" placeholder="Description" name="Tdesc" />

            <label><b>date de fin</b></label>
            <input type="date" placeholder="date de fin" name="dateF" />
            <input type="hidden" name="user" value="<?php echo $isconected; ?>">

            <input type="submit" id='submit' value='Créer'>

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