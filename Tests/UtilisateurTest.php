<!DOCTYPE html lang="FR">
    <body>
        <h1>Test pour les utilisateurs</h1>

        <?php
        require_once "../Php/Utilisateur.php";
        require_once "../Php/UtilisateurGateway.php";

        //Test création utilisateur en mémoire
        $pdoExcp=new Exception();
        $utilTest = new Utilisateur('jack@gmail.com', 'Dupont', 'Jack', 'password');

        
        //Test création utilisateur dans base de données
        $Ugateway=new UtilisateurGateway("mysql:host=localhost;dbname=dbroot","root","");
        //$Ugateway->insertUtilisateur($utilTest);

        //Test recherche d'un utilisateur avec le mail
        $tabFindUser[]=$Ugateway->findByMail("jack@gmail.com");
        foreach ($tabFindUser as $tab){
            foreach ($tab as $user){
                print ($user->get_Nom());}

}