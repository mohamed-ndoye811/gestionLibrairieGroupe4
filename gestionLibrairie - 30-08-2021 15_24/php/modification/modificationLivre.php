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
    include_once('../header.php');
    include_once('../footer.php');
    ?>
    <main>
        <?php
        $livreID = $_POST["idLivreModif"];
        $_SESSION['idModifLivr'] = $livreID;

        // Connexion à la DB
        $DB = mysqli_connect('localhost', 'root', '', 'gestion_librairie');
        mysqli_set_charset($DB, 'UTF8');

        // Vérification si la connexion a réussi
        if (!$DB) {
            echo "<script type=text/javascript>alert('Connexion impossible à la base de données')</script>";
        } else {
            $livreInfosRequest = "SELECT * FROM livres WHERE Id_Livre = " . $livreID;

            $livreInfosRequest = mysqli_query($DB, $livreInfosRequest);

            echo "<form action='../traitement/traitementModifLivr.php' method='POST'>";

            while ($livreInfos = mysqli_fetch_assoc($livreInfosRequest)) {
                echo
                '
                <h3>Livre</h3>
                <label for="modifLivrTitre">Titre</label>
                <input type="text" name="modifLivrTitre" id="modifLivrTitre" value="' . $livreInfos['Titre_livre'] . '" required>
                
                <label for="modifLivrTheme">Theme</label>
                <input type="text" name="modifLivrTheme" id="modifLivrTheme" value="' . $livreInfos['Theme_livre'] . '" required>

                <label for="modifLivrPrix">Prix</label>
                <input type="text" name="modifLivrPrix" id="modifLivrPrix" value="' . $livreInfos['Prix_vente'] . '" required>
                
                <h3>Auteur</h3>
                <label for="modifLivrNomAuteur">Nom</label>
                <input type="text" name="modifLivrNomAuteur" id="modifLivrNomAuteur" value="' . $livreInfos['Nom_auteur'] . '" required>

                <label for="modifLivrPrenomAuteur">Prenom</label>
                <input type="text" name="modifLivrPrenomAuteur" id="modifLivrPrenomAuteur" value="' . $livreInfos['Prenom_auteur'] . '" required>

                <h3>Edition</h3>

                <label for="modifLivrISBN">ISBN</label>
                <input type="text" name="modifLivrISBN" id="modifLivrISBN" value="' . $livreInfos['ISBN'] . '" required>

                <label for="modifLivrEditeur">Editeur</label>
                <input type="text" name="modifLivrEditeur" id="modifLivrEditeur" value="' . $livreInfos['Editeur'] . '" required>

                <label for="modifLivrNbPages">Nb pages</label>
                <input type="text" name="modifLivrNbPages" id="modifLivrNbPages" value="' . $livreInfos['Nbr_pages_livre'] . '" required>

                <label for="modifLivrAnneeEdition">Année d\'édition</label>
                <input type="text" name="modifLivrAnneeEdition" id="modifLivrAnneeEdition" value="' . $livreInfos['Annee_edition'] . '" required>

                <label for="modifLivrLangue">Langue</label>
                <input type="text" name="modifLivrLangue" id="modifLivrLangue" value="' . $livreInfos['Langue_livre'] . '" required>

                <label for="modifLivrFormat">Format</label>
                <input type="text" name="modifLivrFormat" id="modifLivrFormat" value="' . $livreInfos['Format_livre'] . '" required>

                <br><br>
                <input type="submit" value="Modifier">
                ';
            }
            echo "</form>";
        }
        ?>
    </main>
</body>

</html>