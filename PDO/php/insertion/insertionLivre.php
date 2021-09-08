<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta description="blablabla" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/style.css" />
    <script src="../../js/functions.js" defer></script>
    <title>Mohamed HTML Boilerplate</title>
</head>

<body>
    <?php
    // import du header et du footer
    require_once("../header.php");
    require_once("../footer.php");
    ?>
    <main>
        <h1>Insertion Livre</h1>
        <form action='../traitement/traitemenInserLivr.php' method='POST'>
            <div class="fieldset">
                <legend>Livre</legend>
                <label for="insertLivrTitre">Titre</label>
                <input type="text" name="insertLivrTitre" id="insertLivrTitre" required>

                <label for="insertLivrTheme">Theme</label>
                <input type="text" name="insertLivrTheme" id="insertLivrTheme" required>

                <label for="insertLivrPrix">Prix</label>
                <input type="text" name="insertLivrPrix" id="insertLivrPrix" required>
            </div class="fieldset">

            <div class="fieldset">
                <legend>Auteur</legend>
                <label for="insertLivrNomAuteur">Nom</label>
                <input type="text" name="insertLivrNomAuteur" id="insertLivrNomAuteur" required>

                <label for="insertLivrPrenomAuteur">Prenom</label>
                <input type="text" name="insertLivrPrenomAuteur" id="insertLivrPrenomAuteur" required>
            </div class="fieldset">

            <div class="fieldset">
                <legend>Edition</legend>

                <label for="insertLivrISBN">ISBN</label>
                <input type="text" name="insertLivrISBN" id="insertLivrISBN" required>

                <label for="insertLivrEditeur">Editeur</label>
                <input type="text" name="insertLivrEditeur" id="insertLivrEditeur" required>

                <label for="insertLivrNbPages">Nb pages</label>
                <input type="text" name="insertLivrNbPages" id="insertLivrNbPages" required>

                <label for="insertLivrAnneeEdition">Année d'édition</label>
                <input type="text" name="insertLivrAnneeEdition" id="insertLivrAnneeEdition" required>

                <label for="insertLivrLangue">Langue</label>
                <input type="text" name="insertLivrLangue" id="insertLivrLangue" required>

                <label for="insertLivrFormat">Format</label>
                <input type="text" name="insertLivrFormat" id="insertLivrFormat" required>
            </div class="fieldset">


            <br><br>

            <div class="buttons">
                <button type="reset">Effacer</button>
                <button type="submit">Ajouter</button>
            </div>
        </form>
    </main>
    </main>
</body>

</html>