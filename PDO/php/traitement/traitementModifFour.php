<?php
    session_start();
    try{
        include_once('../connexiondb.php');
        $id=$_SESSION['IdFournisseur'];
        echo $id;

        //Si aucun champs n'est vide parmis les champs obligatoires, on récupère les données du formulaire
        if ((!empty($_POST["codeModifFour"]))&&(!empty($_POST["raisonModifFour"])))
        {
            foreach ($_POST as $property => $value) {
                $tab[$property]=addslashes($value);
            }


            // Modification des données
            $requete=$db->prepare("UPDATE `fournisseurs` SET `Code_fournisseur`=?,`Raison_sociale`=?,`Rue_fournisseur`=?,`Code_postal`=?, `Localite`=?,`Pays`=?,`Tel_fournisseur`=?,`Url_fournisseur`=?,`Email_fournisseur`=?,`Fax_fournisseur`=? WHERE `Id_fournisseur`= ?");
            $i=1;
            foreach ($tab as $key => $value) {
                $requete->bindValue($i++,$value);        
            }
            $requete->bindValue($i,$id);
                try{
                    $requete->execute();
                }
                catch(PDOException $e){
                    die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
                }
                header('Location: ../consultation/consultationFournisseurs.php'); 
                

        } 
        
    }
    catch(PDOException $e){
        die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
    }