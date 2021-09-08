<?php
session_start();

$commandeID = $_SESSION["idCommModif"];

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

        $updateCommRequest = "UPDATE commander 

        SET
        `Id_Livre` = '$modifCommIdLivre',
        `Id_fournisseur` = '$modifCommIdFour',
        `Date_achat` = '$modifCommDateAchat',
        `Prix_achat` = '$modifCommPrix',
        `Nbr_exemplaires` = '$modifCommNbExemplaires'
        
        WHERE `id_commande` = $commandeID;";

        $updateCommande = mysqli_query($DB, $updateCommRequest);

        unset($_SESSION['idCommModif']);

        mysqli_close($DB);

        if ($updateCommande) {
            header("Location:../consultation/consultationCommander.php");
        }
    }
}