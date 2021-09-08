<?php
    session_start();
    //Connexion à la base de données
    try{
        include_once('../connexiondb.php');
 
        //Si aucun champs n'est vide parmis les champs obligatoires, on récupère les données du formulaire
        if (!empty($_POST["codeInserFour"]) && !empty($_POST["raisonInserFour"]))
        {
            foreach ($_POST as $property => $value) {
                $tab[$property]=addslashes($value);
            }

   
            // Insertion des données
            
            $requete= $db->prepare("INSERT INTO `fournisseurs`(`Code_fournisseur`, `Raison_sociale`, `Rue_fournisseur`, `Code_postal`, `Localite`, `Pays`, `Tel_fournisseur`, `Url_fournisseur`, `Email_fournisseur`, `Fax_fournisseur`) VALUES (?,?,?,?,?,?,?,?,?,?);");
            $i=1;
            foreach ($tab as $key => $value) {
                $requete->bindValue($i++,$value);        
            }
        
            try {
            $requete->execute();
            }
            catch(PDOException $e){
                die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
            }
            header('Location: ../consultation/consultationFournisseurs.php'); 
        }
    }

        // Si erreur
        catch(PDOException $e){
            die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
        }
?>
        
    