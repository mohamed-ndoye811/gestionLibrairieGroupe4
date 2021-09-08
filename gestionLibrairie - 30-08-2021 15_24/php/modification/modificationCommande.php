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

        // Connexion à la DB
        $DB = mysqli_connect('localhost', 'root', '', 'gestion_librairie');
        mysqli_set_charset($DB, 'UTF8');

        // Vérification si la connexion a réussi
        if (!$DB) {
            echo "<script type=text/javascript>alert('Connexion impossible à la base de données')</script>";
        } else {
            $comandeInfosRequest = "SELECT * FROM commander WHERE id_commande = " . $commandeID;

            $comandeInfosRequest = mysqli_query($DB, $comandeInfosRequest);

            echo "<form action='../traitement/traitementModifComm.php' method='POST'>";

            while ($commandeInfos = mysqli_fetch_assoc($comandeInfosRequest)) {
                echo '<h3>Commande N°' . $commandeID . '</h3>';

                // Select pour le livre à commander
                $livresRequest = "SELECT Id_Livre, Titre_livre FROM livres";

                $livresRequest = mysqli_query($DB, $livresRequest);
                $livres = mysqli_fetch_all($livresRequest, MYSQLI_ASSOC);
                echo '<label for="modifCommIdLivre">Id Livre</label>';
                echo "<select name='modifCommIdLivre' required>";
                foreach ($livres as $livre) {
                    echo "<option value='" . $livre['Id_Livre'] . "'";

                    if ($livre['Id_Livre'] == $commandeInfos['Id_Livre']) {
                        echo "selected";
                    }
                    
                    echo ">" . $livre['Id_Livre'] . " - " . $livre['Titre_livre']  . "</option>";
                }
                echo "</select>";

                // Select pour le fournisseur de la commande
                $fournisseursRequest = "SELECT Id_fournisseur, Raison_sociale FROM fournisseurs "; 

                $fournisseursRequest = mysqli_query($DB, $fournisseursRequest);
                $fournisseurs = mysqli_fetch_all($fournisseursRequest, MYSQLI_ASSOC);
                echo '<label for="modifCommIdFour">Id Fournisseur</label>';
                echo "<select name='modifCommIdFour' required>";
                foreach ($fournisseurs as $fournisseur) {
                    echo "<option value='" . $fournisseur['Id_fournisseur'] . "'";

                    if ($fournisseur['Id_fournisseur'] == $commandeInfos['Id_fournisseur']) {
                        echo "selected";
                    }
                    
                    echo ">" . $fournisseur['Id_fournisseur'] . " - " . $fournisseur['Raison_sociale'] . "</option>";
                }
                echo "</select>";
                echo '

                <label for="modifCommDateAchat">Date achat</label>
                <input type="text" name="modifCommDateAchat" id="modifCommDateAchat" value="' . $commandeInfos['Date_achat'] . '" required>
                
                <label for="modifCommPrix">Prix</label>
                <input type="text" name="modifCommPrix" id="modifCommPrix" value="' . $commandeInfos['Prix_achat'] . '" required>

                <label for="modifCommNbExemplaires">Nombre d\'exemplaires </label>
                <input type="text" name="modifCommNbExemplaires" id="modifCommNbExemplaires" value="' . $commandeInfos['Nbr_exemplaires'] . '" required>

                <br><br>
                <input type="submit" value="Modifier">
                ';
            }
            echo "</form>";
            

            mysqli_close($DB);
        }
        ?>
    </main>
</body>

</html>