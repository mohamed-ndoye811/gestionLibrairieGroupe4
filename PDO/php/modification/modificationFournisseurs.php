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

    try {
        include_once('../connexiondb.php');
        $id = $_POST['modifFournisseur'];
        $_SESSION['IdFournisseur'] = $id;


        // Requetes
        $requete = $db->prepare("SELECT * FROM `fournisseurs` WHERE `Id_fournisseur`= ?");
        $requete->bindValue(1, $id);
        $requete->execute();
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
    }
    ?>
    <main>
        <h1>Modification de Fournisseurs</h1>
        <form action="../traitement/traitementModifFour.php" method="POST">
            <label for="codeModifFour">Code Fournisseur</label>
            <input type="text" name="codeModifFour" id="codeModifFour" value="<?= $donnees['Code_fournisseur'] ?>"
                required>

            <label for="raisonModifFour">Raison sociale</label>
            <input type="text" name="raisonModifFour" id="raisonModifFour"
                value="<?= stripslashes($donnees['Raison_sociale']) ?>" required>

            <label for="rueModifFour">Rue</label>
            <input type="text" name="rueModifFour" id="rueModifFour"
                value="<?= stripslashes($donnees['Rue_fournisseur']) ?>">

            <label for="cpModifFour">Code Postal</label>
            <input type="text" name="cpModifFour" id="cpModifFour" value="<?= $donnees['Code_postal'] ?>">

            <label for="villeModifFour">Ville</label>
            <input type="text" name="villeModifFour" id="villeModifFour"
                value="<?= stripslashes($donnees['Localite']) ?>">

            <label for="paysModifFour">Pays</label>
            <input type="text" name="paysModifFour" id="paysModifFour" value="<?= $donnees['Pays'] ?>">

            <label for="telModifFour">Téléphone</label>
            <input type="text" name="telModifFour" id="telModifFour" value="<?= $donnees['Tel_fournisseur'] ?>">

            <label for="urlModifFour">Site internet</label>
            <input type="text" name="urlModifFour" id="urlModifFour" value="<?= $donnees['Url_fournisseur'] ?>">

            <label for="mailModifFour">E-mail</label>
            <input type="text" name="mailModifFour" id="mailModifFour" value="<?= $donnees['Email_fournisseur'] ?>">

            <label for="faxModifFour">Fax</label>
            <input type="text" name="faxModifFour" id="faxModifFour" value="<?= $donnees['Fax_fournisseur'] ?>">

            <div class="buttons">
                <button type="reset">Effacer</button>
                <button type="submit" class="button">Modifier</button>
            </div>
        </form>
    </main>
    < </body>

</html>