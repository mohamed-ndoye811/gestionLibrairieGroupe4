<?php
    session_start();
    //Connexion à la base de données
    $connex = mysqli_connect('localhost','root','','gestion_librairie');

    // Vérification si la connexion a réussi
    if(!$connex)
    {
        echo "<script type='text/javascript'>alert('Connexion impossible à la base de données');</script>";
    } 
    else 
    {
 
        //Si aucun champs n'est vide parmis les champs obligatoires, on récupère les données du formulaire
        if (!empty($_POST["codeInserFour"]) && !empty($_POST["raisonInserFour"]))
        {
            foreach ($_POST as $property => $value) {
                $$property = $value;
                echo $value;
            }

   
            // Insertion des données
            $requete="INSERT INTO `fournisseurs`(`Code_fournisseur`, `Raison_sociale`, `Rue_fournisseur`, `Code_postal`, `Localite`, `Pays`, `Tel_fournisseur`, `Url_fournisseur`, `Email_fournisseur`, `Fax_fournisseur`) VALUES ('$codeInserFour','$raisonInserFour','$rueInserFour','$cpInserFour','$villeInserFour','$paysInserFour','$telInserFour','$urlInserFour','$mailInserFour','$faxInserFour');";
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
        else 
        {
            echo "
                        <script>
                        alert('ERREUR - Des données obligatoires ne sont pas remplies'); 
                        </script>";
        }

        //Fermeture de la base de données
        mysqli_close($connex);
        
    }