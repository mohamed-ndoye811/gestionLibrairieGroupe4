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
    <h1>Insertion de Commande</h1>
        <form action='../traitement/traitementInserComm.php' method='POST'>
            

            <?php

            //Connexion à la base de données
            $DB = mysqli_connect('localhost', 'root', '', 'gestion_librairie');
            mysqli_set_charset($DB, 'UTF8');

            // Vérification si la connexion a réussi
            if (!$DB) {
                echo "<script type=text/javascript>alert('Connexion impossible à la base de données')</script>";
            } else {
                // Select pour le livre à commander
                $livresRequest = "SELECT Id_Livre, Titre_livre FROM livres";

                $livresRequest = mysqli_query($DB, $livresRequest);
                $livres = mysqli_fetch_all($livresRequest, MYSQLI_ASSOC);
                echo '<div><label for="inserCommIdLivre">Id Livre</label>';
                echo "<select name='inserCommIdLivre' required>";
                foreach ($livres as $livre) {
                    echo "<option value='" . $livre['Id_Livre'] . "'>" . $livre['Id_Livre'] . " - " . $livre['Titre_livre'] . "</option>";
                }
                echo "</select></div>";

                // Select pour le fournisseur de la commande
                $fournisseursRequest = "SELECT Id_fournisseur, Raison_sociale FROM fournisseurs";

                $fournisseursRequest = mysqli_query($DB, $fournisseursRequest);
                $fournisseurs = mysqli_fetch_all($fournisseursRequest, MYSQLI_ASSOC);
                echo '<div><label for="inserCommIdFour">Id Fournisseur</label>';
                echo "<select name='inserCommIdFour' required>";
                foreach ($fournisseurs as $fournisseur) {
                    echo "<option value='" . $fournisseur['Id_fournisseur'] . "'>" . $fournisseur['Id_fournisseur'] . " - " . $fournisseur['Raison_sociale'] . "</option>";
                }
                echo "</select></div>";

                mysqli_close($DB);
            }

            ?>

            <div>
                <label for="inserCommDateAchat">Date achat</label>
                <input type="date" name="inserCommDateAchat" id="inserCommDateAchat">
            </div>

            <div>
                <label for="inserCommPrix">Prix</label>
                <input type="text" name="inserCommPrix" id="inserCommPrix" required>
            </div>

            <div>
                <label for="inserCommNbExemplaires">Nombre d'exemplaires </label>
                <input type="text" name="inserCommNbExemplaires" id="inserCommNbExemplaires" required>
            </div>

            <br><br>
            <input type="submit">
    </main>

</body>

</html>