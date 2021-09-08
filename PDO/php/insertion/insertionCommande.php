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

            // Connexion à la DB
            try {
                include_once('../connexiondb.php');

                // Select pour le livre à commander
                $livresRequest = $db->prepare("SELECT Id_Livre, Titre_livre FROM livres");

                $livresRequest->execute();
                $livres = $livresRequest->fetchAll(PDO::FETCH_ASSOC);
                echo '<label for="inserCommIdLivre">Id Livre</label>';
                echo "<select name='inserCommIdLivre' required>";
                foreach ($livres as $livre) {
                    echo "<option value='" . $livre['Id_Livre'] . "'>" . $livre['Id_Livre'] . " - " . stripslashes($livre['Titre_livre']) . "</option>";
                }
                echo "</select>";

                // Select pour le fournisseur de la commande
                $fournisseursRequest =  $db->prepare("SELECT Id_fournisseur, Raison_sociale FROM fournisseurs");

                $fournisseursRequest->execute();
                $fournisseurs = $fournisseursRequest->fetchAll(PDO::FETCH_ASSOC);
                echo '<label for="inserCommIdFour">Id Fournisseur</label>';
                echo "<select name='inserCommIdFour' required>";
                foreach ($fournisseurs as $fournisseur) {
                    echo "<option value='" . $fournisseur['Id_fournisseur'] . "'>" . $fournisseur['Id_fournisseur'] . " - " . stripslashes($fournisseur['Raison_sociale']) . "</option>";
                }
                echo "</select>";
            } catch (PDOException $e) {
                die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
            }

            ?>

            <label for="inserCommDateAchat">Date achat</label>
            <input type="date" name="inserCommDateAchat" id="inserCommDateAchat">

            <label for="inserCommPrix">Prix</label>
            <input type="text" name="inserCommPrix" id="inserCommPrix" required>

            <label for="inserCommNbExemplaires">Nombre d'exemplaires </label>
            <input type="text" name="inserCommNbExemplaires" id="inserCommNbExemplaires" required>


            <div class="buttons">
                <button type="reset">Effacer</button>
                <button type="submit">Ajouter</button>
            </div>
    </main>

</body>

</html>