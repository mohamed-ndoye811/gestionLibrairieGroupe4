<?php
session_start();

if (!isset($_POST)) {
    echo "Erreur - Des informations sont manquantes";
} else {
    // // On créer des variables du nom des champs et en attribution direct leur valeurs correspondantes avec une boucle
    // foreach ($_POST as $property => $value) {
    //     $$property = addslashes($value);
    // } 
    foreach ($_POST as $property => $value) {
        // $$property = addslashes($value);
        $tab[$property] = addslashes($value);
    }

    try {
        include_once('../connexiondb.php');

        // Insertion des données
        $insertLivreRequest = $db->prepare("INSERT INTO 
            `livres` (`Id_Livre`, `ISBN`, `Titre_livre`, `Theme_livre`, `Editeur` , `Format_livre`, `Nom_auteur`, `Prenom_auteur`, `Nbr_pages_livre`, `Annee_edition`, `Prix_vente`, `Langue_livre`) 
            VALUES 
            (NULL,?,?,?,?,?,?,?,?,?,?,?);");
        $i = 1;
        foreach ($tab as $key => $value) {
            $insertLivreRequest->bindValue($i++, $value);
        }

        try {
            $insertLivreRequest->execute();
        } catch (PDOException $e) {
            die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
        }
        unset($_SESSION['idinsertLivre']);

        header("Location:../consultation/consultationLivres.php");
    } catch (PDOException $e) {
        die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
    }
}