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
            <label for="codeInserFour">Code Fournisseur</label>
            <input type="text" name="codeInserFour" id="codevFour" required>

            <label for="raisonInserFour">Raison sociale</label>
            <input type="text" name="raisonInserFour" id="raisonInserFour" required>

            <label for="rueInserFour">Rue</label>
            <input type="text" name="rueInserFour" id="rueInserFour">

            <label for="cpInserFour">Code Postal</label>
            <input type="text" name="cpInserFour" id="cpInserFour">

            <label for="villeInserFour">Ville</label>
            <input type="text" name="villeInserFour" id="villeInserFour">

            <label for="paysInserFour">Pays</label>
            <input type="text" name="paysInserFour" id="paysInserFour">

            <label for="telInserFour">Téléphone</label>
            <input type="text" name="telInserFour" id="telInserFour">

            <label for="urlInserFour">Site internet</label>
            <input type="text" name="urlInserFour" id="urlInserFour">

            <label for="mailInserFour">E-mail</label>
            <input type="text" name="mailInserFour" id="mailInserFour">

            <label for="faxInserFour">Fax</label>
            <input type="text" name="faxInserFour" id="faxInserFour">

            <div class="buttons">
                <button type="submit" class="button">Envoyer</button>
            </div>
        </form>
    </main>
</body>
</html>