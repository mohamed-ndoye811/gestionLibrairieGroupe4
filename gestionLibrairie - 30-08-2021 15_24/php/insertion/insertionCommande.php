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
    <header></header>

    <main>
        <form action='../traitement/traitementInserComm.php' method='POST'>
            <h1>Insertion de Commande</h1>

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
                echo '<label for="inserCommIdLivre">Id Livre</label>';
                echo "<select name='inserCommIdLivre' required>";
                foreach ($livres as $livre) {
                    echo "<option value='" . $livre['Id_Livre'] . "'>" . $livre['Id_Livre'] . " - " . $livre['Titre_livre'] . "</option>";
                }
                echo "</select>";

                // Select pour le fournisseur de la commande
                $fournisseursRequest = "SELECT Id_fournisseur, Raison_sociale FROM fournisseurs";

                $fournisseursRequest = mysqli_query($DB, $fournisseursRequest);
                $fournisseurs = mysqli_fetch_all($fournisseursRequest, MYSQLI_ASSOC);
                echo '<label for="inserCommIdFour">Id Fournisseur</label>';
                echo "<select name='inserCommIdFour' required>";
                foreach ($fournisseurs as $fournisseur) {
                    echo "<option value='" . $fournisseur['Id_fournisseur'] . "'>" . $fournisseur['Id_fournisseur'] . " - " . $fournisseur['Raison_sociale'] . "</option>";
                }
                echo "</select>";

                mysqli_close($DB);
            }

            ?>

            <label for="inserCommDateAchat">Date achat</label>
            <input type="date" name="inserCommDateAchat" id="inserCommDateAchat">

            <label for="inserCommPrix">Prix</label>
            <input type="text" name="inserCommPrix" id="inserCommPrix" required>

            <label for="inserCommNbExemplaires">Nombre d'exemplaires </label>
            <input type="text" name="inserCommNbExemplaires" id="inserCommNbExemplaires" required>

            <br><br>
            <input type="submit">
    </main>

    <footer></footer>
</body>

</html>