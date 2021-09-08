<?php
session_start();
$livreID = $_SESSION["idModifLivr"];
if (!isset($_POST)) {
    echo "Erreur - Des informations sont manquantes";
} else {
    // On créer des variables du nom des champs et en attribution direct leur valeurs correspondantes avec une boucle
    foreach ($_POST as $property => $value) {
        $tab[$property] = addslashes($value);
    }

    try {
        include_once('../connexiondb.php');

        // Insertion des données
        $updateLivrRequest = $db->prepare(
            "UPDATE livres
        SET
        `Titre_livre` = ?,
        `Theme_livre` = ?,
        `Prix_vente` = ?,
        `Nom_auteur` = ?,
        `Prenom_auteur` = ?,
        `ISBN` = ?,
        `Editeur` = ?,
        `Nbr_pages_livre` = ?,
        `Annee_edition` = ?,
        `Langue_livre` = ?,
        `Format_livre` = ?
        
        WHERE `Id_Livre` = ?;"
        );

        $i = 1;
        foreach ($tab as $key => $value) {
            $updateLivrRequest->bindValue($i++, $value);
        }

        $updateLivrRequest->bindValue($i, $livreID);

        try {
            $updateLivrRequest->execute();
        } catch (PDOException $e) {
            die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
        }

        unset($_SESSION['idModifLivr']);
        header("Location:../consultation/consultationLivres.php");
        exit();
    } catch (PDOException $e) {
        die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
    }
}