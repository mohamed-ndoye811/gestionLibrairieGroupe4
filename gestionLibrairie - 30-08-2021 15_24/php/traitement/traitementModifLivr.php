<?php
session_start();
$livreID = $_SESSION["idModifLivr"];
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
        $updateLivrRequest = "UPDATE livres

        SET
        `Titre_livre` = '$modifLivrTitre',
        `Theme_livre` = '$modifLivrTheme',
        `Prix_vente` = $modifLivrPrix,
        `Nom_auteur` = '$modifLivrNomAuteur',
        `Prenom_auteur` = '$modifLivrPrenomAuteur',
        `ISBN` = '$modifLivrISBN',
        `Editeur` = '$modifLivrEditeur',
        `Nbr_pages_livre` = $modifLivrNbPages,
        `Annee_edition` = $modifLivrAnneeEdition,
        `Langue_livre` = '$modifLivrLangue',
        `Format_livre` = '$modifLivrFormat'
        
        WHERE `Id_Livre` = '$livreID';";

        $updateLivre = mysqli_query($DB, $updateLivrRequest);

        unset($_SESSION['idModifLivr']);

        mysqli_close($DB);

        if ($updateLivre) {
            header("Location:../consultation/consultationLivres.php");
            exit();
        } else {
            echo "Erreur";
        }
    }
}