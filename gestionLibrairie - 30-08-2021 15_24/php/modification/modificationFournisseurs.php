<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css" />
    <script src="../../js/functions.js" defer></script>
    <title>Modification des Fournisseurs</title>
</head>
<body>
    <?php
     include_once('../header.php');
     include_once('../footer.php');

     //Connexion à la base de données
     $connex = mysqli_connect('localhost','root','','gestion_librairie');
     mysqli_set_charset($connex, 'UTF8');

     // Vérification si la connexion a réussi
     if(!$connex){
         echo "<script type=text/javascript>alert('Connexion impossible à la base de données')</script>";
     } else {
         $id=$_POST['modifFournisseur'];
         $_SESSION['IdFournisseur']=$id;
         

         // Requetes
         $requete = "SELECT * FROM `fournisseurs` WHERE `Id_fournisseur`= '$id'";
         $resultat = mysqli_query($connex,$requete);
         $donnees = mysqli_fetch_assoc($resultat);
     }
    ?>
    <main>
        <h1>Modification de Fournisseurs</h1>
    <form action="../traitement/traitementModifFour.php" method="POST">
        <div>
            <label for="codeModifFour">Code Fournisseur</label>
            <input type="text" name="codeModifFour" id="codeModifFour" value="<?=$donnees['Code_fournisseur']?>" required>
        </div>

        <div>
            <label for="raisonModifFour">Raison sociale</label>
            <input type="text" name="raisonModifFour" id="raisonModifFour" value="<?=$donnees['Raison_sociale']?>" required>
        </div>

        <div>
            <label for="rueModifFour">Rue</label>
            <input type="text" name="rueModifFour" id="rueModifFour" value="<?=$donnees['Rue_fournisseur']?>">
        </div>

        <div>
            <label for="cpModifFour">Code Postal</label>
            <input type="text" name="cpModifFour" id="cpModifFour" value="<?=$donnees['Code_postal']?>">
        </div>

        <div>
            <label for="villeModifFour">Ville</label>
            <input type="text" name="villeModifFour" id="villeModifFour" value="<?=$donnees['Localite']?>">
        </div>

        <div>
            <label for="paysModifFour">Pays</label>
            <input type="text" name="paysModifFour" id="paysModifFour" value="<?=$donnees['Pays']?>">
        </div>

        <div>
            <label for="telModifFour">Téléphone</label>
            <input type="text" name="telModifFour" id="telModifFour" value="<?=$donnees['Tel_fournisseur']?>">
        </div>


        <div>
            <label for="urlModifFour">Site internet</label>
            <input type="text" name="urlModifFour" id="urlModifFour" value="<?=$donnees['Url_fournisseur']?>">
        </div>

        <div>
            <label for="mailModifFour">E-mail</label>
            <input type="text" name="mailModifFour" id="mailModifFour" value="<?=$donnees['Email_fournisseur']?>">
        </div>

        <div>
            <label for="faxModifFour">Fax</label>
            <input type="text" name="faxModifFour" id="faxModifFour" value="<?=$donnees['Fax_fournisseur']?>">
        </div>

        <input type="submit" value="Modifier">
        </form>
    </main>
</body>
</html>