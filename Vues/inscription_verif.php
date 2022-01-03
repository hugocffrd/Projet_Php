<<?php
    require '../ConnectBDD/ConnectBDD.php';
    require_once "../Modele/Utilisateur.php";
    require_once "../Modele/UtilisateurGateway.php";

    if (isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['password_retype'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $pwd = htmlspecialchars($_POST['password']);
        $pwd_retype = htmlspecialchars($_POST['password_retype']);
        $mail = strtolower($mail); // on transforme toutes les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        $con = new ConnectBDD();
        $connect = $con->getConnect();


        $check = $connect->prepare('SELECT Mail,Nom ,Prenom, Pwd from utilisateur where Mail = ?');
        $check->execute(array($mail));
        $data = $check->fetch();
        $row = $check->rowCount();

        if ($row == 0) {
            if (strlen($nom) <= 100) {
                if (strlen($prenom) <= 100) {
                    if (strlen($mail) <= 100) {
                        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                            if ($pwd == $pwd_retype) {
                                // $password=hash('sha256',$password);
                                // $ip=$_SERVER['REMOTE_ADDR'];

                                $utilisateur = new Utilisateur($mail, $nom, $prenom, $pwd);
                                $Ugateway = new UtilisateurGateway($connect);
                                $Ugateway->insertUtilisateur($utilisateur);

                                // $insert = $connect->prepare('INSERT INTO utilisateur(Mail, Nom, Prenom,Pwd) VALUES(:mail, :nom, :prenom, :pwd)');
                                // $insert->execute(array(
                                //     'mail' => $mail,
                                //     'nom' => $nom,
                                //     'prenom' => $prenom,
                                //     'pwd' => $pwd
                                // ));

                                header('Location:connexion.php?login_err=sucess');
                            } else header('Location:creerUtilisateur.php?reg_err=password');
                        } else header('Location:creerUtilisateur.php?reg_err=mail');
                    } else header('Location:creerUtilisateur.php?reg_err=mail_lenght');
                } else header('Location:creerUtilisateur.php?reg_err=prenom_Lenght');
            } else header('Location:creerUtilisateur.php?reg_err=nom_Lenght');
        } else header('Location:creerUtilisateur.php?reg_err=already');
    }

    ?>