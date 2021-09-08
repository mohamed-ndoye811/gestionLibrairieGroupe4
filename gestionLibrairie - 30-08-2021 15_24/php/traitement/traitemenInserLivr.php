<?php
session_start();

if (!isset($_POST)) {
    echo "Erreur - Des informations sont manquantes";
} else {
    // On créer des variables du nom des champs et en attribution direct leur valeurs correspondantes avec une boucle
    foreach ($_POST as $property => $value) {
        $$property = $value;
    }

    //Connexion à la base de données
    $DB = mysqli_connect('localhost', 'root', '', 'gestion_librairie');

    // Vérification si la connexion a réussi
    if (!$DB) {
        echo "<script type=text/javascript>alert('Connexion impossible à la base de données')</script>";
    } else {

        $insertLivreRequest =
            "INSERT INTO 
        `livres` (`Id_Livre`, `ISBN`, `Titre_livre`, `Theme_livre`, `Nbr_pages_livre`, `Format_livre`, `Nom_auteur`, `Prenom_auteur`, `Editeur`, `Annee_edition`, `Prix_vente`, `Langue_livre`) 
        VALUES 
        (NULL, 
        '$insertLivrISBN',
        '$insertLivrTitre',
        '$insertLivrTheme',
        '$insertLivrNbPages',
        '$insertLivrFormat',
        '$insertLivrNomAuteur',
        '$insertLivrPrenomAuteur',
        '$insertLivrEditeur',
        '$insertLivrAnneeEdition',
        '$insertLivrPrix',
        '$insertLivrLangue');";

        $addLivre = mysqli_query($DB, $insertLivreRequest);

        unset($_SESSION['idinsertLivre']);

        mysqli_close($DB);

        if ($addLivre) {
            header("Location:../consultation/consultationLivres.php");
        } else {
            echo "<script> alert('ERREUR - Modification échouée'); </script>";
        }
    }
}