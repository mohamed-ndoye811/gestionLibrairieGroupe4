<?php
session_start();
//Connexion à la base de données
$connex = mysqli_connect('localhost', 'root', '', 'gestion_librairie');

// Vérification si la connexion a réussi
if (!$connex) {
    echo "<script type=text/javascript>alert('Connexion impossible à la base de données')</script>";
} else {

    //Si aucun champs n'est vide, on récupère les données du formulaire
    if ((!empty($_POST["loginNom"])) && (!empty($_POST["loginPassword"]))) {
        $nom = $_POST["loginNom"];
        $nom = strtoupper(trim($nom));
        $mdp = $_POST["loginPassword"];
        $mdp = md5($mdp);


        // Vérification des données
        $requete = "SELECT * FROM user WHERE Nom='$nom' AND MdP='$mdp'";
        $result = mysqli_query($connex, $requete);
        $donnees = mysqli_fetch_assoc($result);
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

    //Fermeture de la base de données
    mysqli_close($connex);
}