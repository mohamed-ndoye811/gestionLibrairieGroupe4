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
        $commandeID = $_POST["idCommModif"];
        $_SESSION['idCommModif'] = $commandeID;

        try {
            include_once('../connexiondb.php');
            $comandeInfosRequest = $db->prepare("SELECT * FROM commander WHERE id_commande = :commande ");
            $comandeInfosRequest->bindValue(':commande', $commandeID);
            try {
                $comandeInfosRequest->execute();
            } catch (PDOException $e) {
                die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
            }

            echo '<h3>Commande N°' . $commandeID . '</h3>';

            echo "<form action='../traitement/traitementModifComm.php' method='POST'>";

            while ($commandeInfos = $comandeInfosRequest->fetch(PDO::FETCH_ASSOC)) {


                // Select pour le livre à commander
                $livresRequest = $db->prepare("SELECT Id_Livre, Titre_livre FROM livres");
                $livresRequest->execute();
                $livres = $livresRequest->fetchAll(PDO::FETCH_ASSOC);
                echo '<div><label for="modifCommIdLivre">Id Livre</label>';
                echo "<select name='modifCommIdLivre' required>";
                foreach ($livres as $livre) {
                    echo "<option value='" . $livre['Id_Livre'] . "'";

                    if ($livre['Id_Livre'] == $commandeInfos['Id_Livre']) {
                        echo 'selected';
                    }

                    echo ">" . $livre['Id_Livre'] . " - " . stripslashes($livre['Titre_livre']) . "</option>";
                }
                echo "</select></div>";

                // Select pour le fournisseur de la commande
                $fournisseursRequest = $db->prepare("SELECT Id_fournisseur, Raison_sociale FROM fournisseurs");
                $fournisseursRequest->execute();
                $fournisseurs = $fournisseursRequest->fetchAll(PDO::FETCH_ASSOC);
                echo '<div><label for="modifCommIdFour">Id Fournisseur</label>';
                echo "<select name='modifCommIdFour' required>";
                foreach ($fournisseurs as $fournisseur) {
                    echo "<option value='" . $fournisseur['Id_fournisseur'] . "'";

                    if ($fournisseur['Id_fournisseur'] == $commandeInfos['Id_fournisseur']) {
                        echo 'selected';
                    }

                    echo ">" . $fournisseur['Id_fournisseur'] . " - " . stripslashes($fournisseur['Raison_sociale']) . "</option>";
                }
                echo "</select></div>";
                echo '


                <div>
                <label for="modifCommDateAchat">Date achat</label>
                <input type="text" name="modifCommDateAchat" id="modifCommDateAchat" value="' . $commandeInfos['Date_achat'] . '" required>
                </div>
                
                <div>
                <label for="modifCommPrix">Prix</label>
                <input type="text" name="modifCommPrix" id="modifCommPrix" value="' . $commandeInfos['Prix_achat'] . '" required>
                </div>

                <div>
                <label for="modifCommNbExemplaires">Nombre d\'exemplaires </label>
                <input type="text" name="modifCommNbExemplaires" id="modifCommNbExemplaires" value="' . $commandeInfos['Nbr_exemplaires'] . '" required>
                </div>

                <br><br>
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