<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css" />
    <script src="../../js/functions.js" defer></script>
    <title>Insertion de Fournisseurs</title>
</head>
<body>
<?php
     include_once('../header.php');
     include_once('../footer.php');

?>
    <main>
        <h1>Insertion de Fournisseurs</h1>
    <form action="../traitement/traitementInserFour.php" method="POST">

        <div>
            <label for="codeInserFour">Code Fournisseur</label>
            <input type="text" name="codeInserFour" id="codevFour" required>
        </div>

        <div>
            <label for="raisonInserFour">Raison sociale</label>
            <input type="text" name="raisonInserFour" id="raisonInserFour" required>
        </div>

        <div>
            <label for="rueInserFour">Rue</label>
            <input type="text" name="rueInserFour" id="rueInserFour">
        </div>

        <div>
            <label for="cpInserFour">Code Postal</label>
            <input type="text" name="cpInserFour" id="cpInserFour">
        </div>

        <div>
            <label for="villeInserFour">Ville</label>
            <input type="text" name="villeInserFour" id="villeInserFour">
        </div>

        <div>
            <label for="paysInserFour">Pays</label>
            <input type="text" name="paysInserFour" id="paysInserFour">
        </div>

        <div>
            <label for="telInserFour">Téléphone</label>
            <input type="text" name="telInserFour" id="telInserFour">
        </div>

        <div>
            <label for="urlInserFour">Site internet</label>
            <input type="text" name="urlInserFour" id="urlInserFour">
        </div>

        <div>
            <label for="mailInserFour">E-mail</label>
            <input type="text" name="mailInserFour" id="mailInserFour">
        </div>

        <div>
            <label for="faxInserFour">Fax</label>
            <input type="text" name="faxInserFour" id="faxInserFour">
        </div>
        
        <br><br>

        <input type="reset" value="Effacer">
        <input type="submit" value="Ajouter">
        </form>
    </main>
</body>
</html>