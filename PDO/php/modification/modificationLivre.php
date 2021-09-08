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

        try {
            include_once('../connexiondb.php');
            $livreInfosRequest = $db->prepare("SELECT * FROM livres WHERE Id_Livre = ?");
            $livreInfosRequest->bindValue(1, $livreID);

            try {
                $livreInfosRequest->execute();
            } catch (PDOException $e) {
                die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
            }

            echo "<form action='../traitement/traitementModifLivr.php' method='POST'>";

            while ($livreInfos = $livreInfosRequest->fetch(PDO::FETCH_ASSOC)) {
                echo
                '
                <h3>Livre</h3>
                <div>
                <label for="modifLivrTitre">Titre</label>
                <input type="text" name="modifLivrTitre" id="modifLivrTitre" value="' . stripslashes($livreInfos['Titre_livre'])  . '" required>
                </div>

                <div>
                <label for="modifLivrTheme">Theme</label>
                <input type="text" name="modifLivrTheme" id="modifLivrTheme" value="' . stripslashes($livreInfos['Theme_livre']) . '" required>
                </div>

                <div>
                <label for="modifLivrPrix">Prix</label>
                <input type="text" name="modifLivrPrix" id="modifLivrPrix" value="' . $livreInfos['Prix_vente'] . '" required>
                </div>
                
                <h3>Auteur</h3>
                <div>
                <label for="modifLivrNomAuteur">Nom</label>
                <input type="text" name="modifLivrNomAuteur" id="modifLivrNomAuteur" value="' . stripslashes($livreInfos['Nom_auteur']) . '" required>
                </div>

                <div>
                <label for="modifLivrPrenomAuteur">Prenom</label>
                <input type="text" name="modifLivrPrenomAuteur" id="modifLivrPrenomAuteur" value="' . stripslashes($livreInfos['Prenom_auteur']) . '" required>
                </div>

                <h3>Edition</h3>

                <div>
                <label for="modifLivrISBN">ISBN</label>
                <input type="text" name="modifLivrISBN" id="modifLivrISBN" value="' . $livreInfos['ISBN'] . '" required>
                </div>

                <div>
                <label for="modifLivrEditeur">Editeur</label>
                <input type="text" name="modifLivrEditeur" id="modifLivrEditeur" value="' . stripslashes($livreInfos['Editeur']) . '" required>
                </div>

                <div>
                <label for="modifLivrNbPages">Nb pages</label>
                <input type="text" name="modifLivrNbPages" id="modifLivrNbPages" value="' . $livreInfos['Nbr_pages_livre'] . '" required>
                </div>

                <div>
                <label for="modifLivrAnneeEdition">Année d\'édition</label>
                <input type="text" name="modifLivrAnneeEdition" id="modifLivrAnneeEdition" value="' . $livreInfos['Annee_edition'] . '" required>
                </div>

                <div>
                <label for="modifLivrLangue">Langue</label>
                <input type="text" name="modifLivrLangue" id="modifLivrLangue" value="' . $livreInfos['Langue_livre'] . '" required>
                </div>

                <div>
                <label for="modifLivrFormat">Format</label>
                <input type="text" name="modifLivrFormat" id="modifLivrFormat" value="' . $livreInfos['Format_livre'] . '" required>
                </div>

                
                <div class="buttons">
                    <button type="reset">Effacer</button>
                    <button type="submit" class="button">Modifier</button>
                </div>
                ';
            }
            echo "</form>";
        } catch (PDOException $e) {
            die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
        }
        ?>
    </main>
</body>

</html>