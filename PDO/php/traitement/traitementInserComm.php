<?php
session_start();
  // Connexion à la DB
  try{
    include_once('../connexiondb.php');

    //Si aucun champs n'est vide parmis les champs obligatoires, on récupère les données du formulaire
    if (!empty($_POST["inserCommIdLivre"]) && !empty($_POST["inserCommIdFour"]) && !empty($_POST["inserCommPrix"]) && !empty($_POST["inserCommNbExemplaires"])) {
        foreach ($_POST as $property => $value) {
            // $$property = addslashes($value);
            $tab[$property]=addslashes($value);
        }

        // SiinserCommDateAchat est vide (qu'aucune date n'a été entrée), alors il prendra la valeur CURRENT_TIMESTAMP
        $inserCommDateAchat = empty($inserCommDateAchat) ? 'CURRENT_TIMESTAMP' : "'$inserCommDateAchat'";

        echo $inserCommDateAchat;

        // Insertion des données
        $requete = $db->prepare("INSERT INTO 
            `commander`(`id_commande`, `Id_Livre`, `Id_fournisseur`, `Date_achat`, `Prix_achat`, `Nbr_exemplaires`) 
            VALUES 
            (NULL,?,?,?,?,?);");
        $i=1;
        foreach ($tab as $key => $value) {
            $requete->bindValue($i++,$value);        
        }

        try{
        $requete->execute();
        }
        catch(PDOException $e){
            die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
        }

            header('Location: ../consultation/consultationCommander.php');
    } else {
        echo "
                        <script>
                        alert('ERREUR - Des données obligatoires ne sont pas remplies'); 
                        </script>";
    }
}
    catch(PDOException $e){
        die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
    }
