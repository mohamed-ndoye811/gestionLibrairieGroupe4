<?php
session_start();
//Connexion à la base de données
$connex = mysqli_connect('localhost', 'root', '', 'gestion_librairie');

// Vérification si la connexion a réussi
if (!$connex) {
    echo "<script type='text/javascript'>alert('Connexion impossible à la base de données');</script>";
} else {

    //Si aucun champs n'est vide parmis les champs obligatoires, on récupère les données du formulaire
    if (!empty($_POST["inserCommIdLivre"]) && !empty($_POST["inserCommIdFour"]) && !empty($_POST["inserCommPrix"]) && !empty($_POST["inserCommNbExemplaires"])) {
        foreach ($_POST as $property => $value) {
            $$property = $value;
        }

        // SiinserCommDateAchat est vide (qu'aucune date n'a été entrée), alors il prendra la valeur CURRENT_TIMESTAMP
        $inserCommDateAchat = empty($inserCommDateAchat) ? 'CURRENT_TIMESTAMP' : "'$inserCommDateAchat'";

        echo $inserCommDateAchat;

        // Insertion des données
        $requete = "INSERT INTO 
            `commander`(`id_commande`, `Id_Livre`, `Id_fournisseur`, `Date_achat`, `Prix_achat`, `Nbr_exemplaires`) 
            VALUES 
            (NULL,
            '$inserCommIdLivre',
            '$inserCommIdFour',
            $inserCommDateAchat,
            '$inserCommPrix',
            '$inserCommNbExemplaires');";

        echo $requete;

        $result = mysqli_query($connex, $requete);

        if (!$result) {
            echo "
                    <script>
                    alert('ERREUR - Modification échouée'); 
                    </script>";
        } else {
            header('Location: ../consultation/consultationCommander.php');
        }
    } else {
        echo "
                        <script>
                        alert('ERREUR - Des données obligatoires ne sont pas remplies'); 
                        </script>";
    }

    //Fermeture de la base de données
    mysqli_close($connex);
}