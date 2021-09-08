<?php
session_start();
// Connexion à la DB
try{
    include_once('../connexiondb.php');
    //Si aucun champs n'est vide, on récupère les données du formulaire
    if ((!empty($_POST["loginNom"])) && (!empty($_POST["loginPassword"]))) {
        $nom = $_POST["loginNom"];
        $nom = strtoupper(trim($nom));
        $mdp = $_POST["loginPassword"];
        $mdp = md5($mdp);


        // Vérification des données
        $requete = $db->prepare( "SELECT * FROM user WHERE Nom=? AND MdP=?");
        $requete->bindValue(1,$nom);
        $requete->bindValue(2,$mdp);

        $requete->execute();
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);
        if ($nom == $donnees['Nom'] && $mdp == $donnees['MdP']) {
            //Initialisation de la variable $_SESSION
            $_SESSION['Nom'] = $donnees['Nom'];
            $_SESSION['Prenom'] = $donnees['Prenom'];
            $_SESSION['Admin'] = $donnees['Admin'];

            // On passe à l'accueil
            header("Location: ../accueil.php");
        } else {
            // On passe à la page d'erreur d'authentification
            header("Location:../erreurAuth.php");
        }
    }
}
catch(PDOException $e){
    die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
}