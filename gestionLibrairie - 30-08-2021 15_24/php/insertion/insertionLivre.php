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
    <main>
        <form action='../traitement/traitemenInserLivr.php' method='POST'>
            <h3>Livre</h3>
            <label for="insertLivrTitre">Titre</label>
            <input type="text" name="insertLivrTitre" id="insertLivrTitre" required>

            <label for="insertLivrTheme">Theme</label>
            <input type="text" name="insertLivrTheme" id="insertLivrTheme" required>

            <label for="insertLivrPrix">Prix</label>
            <input type="text" name="insertLivrPrix" id="insertLivrPrix" required>

            <h3>Auteur</h3>
            <label for="insertLivrNomAuteur">Nom</label>
            <input type="text" name="insertLivrNomAuteur" id="insertLivrNomAuteur" required>

            <label for="insertLivrPrenomAuteur">Prenom</label>
            <input type="text" name="insertLivrPrenomAuteur" id="insertLivrPrenomAuteur" required>

            <h3>Edition</h3>

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

            <br><br>

            <input type="reset" value="Effacer">
            <input type="submit" value="Ajouter">
        </form>
    </main>
</body>

</html>