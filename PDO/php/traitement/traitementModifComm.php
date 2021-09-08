<?php
session_start();

$commandeID = $_SESSION["idCommModif"];

if (!isset($_POST)) {
    echo "Erreur - Des informations sont manquantes";
} else {
    // On créer des variables du nom des champs et en attribution direct leur valeurs correspondantes avec une boucle
    foreach ($_POST as $property => $value) {
        $tab[$property]=addslashes($value);
    }

    try{
        include_once('../connexiondb.php');
        $updateCommRequest = $db->prepare("UPDATE commander 
        SET
        `Id_Livre` = ?,
        `Id_fournisseur` = ?,
        `Date_achat` = ?,
        `Prix_achat` = ?,
        `Nbr_exemplaires` = ?
        
        WHERE `id_commande` = ?;");
        $i=1;
        foreach ($tab as $key => $value) {
            $updateCommRequest->bindValue($i++,$value);        
        }
        $updateCommRequest->bindValue($i,$commandeID);
        try{
        $updateCommRequest->execute();
        }
        catch(PDOException $e){
            die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
        }

        unset($_SESSION['idCommModif']);
        header("Location:../consultation/consultationCommander.php");
    }
        catch(PDOException $e){
            die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
        }
    }
