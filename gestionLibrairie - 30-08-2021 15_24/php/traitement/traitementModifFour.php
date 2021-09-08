<?php
    session_start();
    //Connexion à la base de données
    $connex = mysqli_connect('localhost','root','','gestion_librairie');

    // Vérification si la connexion a réussi
    if(!$connex)
    {
        echo "<script type=text/javascript>alert('Connexion impossible à la base de données')</script>";
    } 
    else 
    {
        $id=$_SESSION['IdFournisseur'];
        echo $id;

        //Si aucun champs n'est vide parmis les champs obligatoires, on récupère les données du formulaire
        if ((!empty($_POST["codeModifFour"]))&&(!empty($_POST["raisonModifFour"])))
        {
            foreach ($_POST as $property => $value) {
                $$property = $value;
            }


            // Modification des données
            $requete="UPDATE `fournisseurs` SET `Code_fournisseur`='$codeModifFour',`Raison_sociale`='$raisonModifFour',`Rue_fournisseur`='$rueModifFour',`Code_postal`='$cpModifFour', `Localite`='$villeModifFour',`Pays`='$paysModifFour',`Tel_fournisseur`='$telModifFour',`Url_fournisseur`='$urlModifFour',`Email_fournisseur`='$mailModifFour',`Fax_fournisseur`='$faxModifFour' WHERE `Id_fournisseur`= '$id'";
                $result = mysqli_query($connex, $requete);
                if(!$result)
                    { 
                        echo "
                        <script>
                        alert('ERREUR - Modification échouée'); 
                        </script>";
                           
                    } else {
                        header('Location: ../consultation/consultationFournisseurs.php'); 
                    }

        } 

        //Fermeture de la base de données
        mysqli_close($connex);
        
    }
 ?>
