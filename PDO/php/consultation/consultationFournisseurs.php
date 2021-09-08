<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css" />
    <script src="../../js/functions.js" defer></script>
    <title>Consultation des fournisseurs</title>
</head>

<body>
    <?php
    include_once('../header.php');
    include_once('../footer.php');
    ?>

    <main>
        <h1>Consultation des fournisseurs</h1>
        <?php

        try {
            include_once('../connexiondb.php');
            // Préparation de la requête
            $requete = $db->prepare('SELECT * FROM fournisseurs');
            // Exécution de la requête
            try {
                $requete->execute();
            }
            // Si erreur
            catch (PDOException $e) {
                die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
            }

            // Bouton insertion
            if ($_SESSION['Admin'] != "utilisateur") {
                echo "<button><a href='../insertion/insertionFournisseurs.php'>Insertion d'un fournisseur</a></button>";
            }

            echo "<table>
            <thead>
            <tr>
            <th>Code fournisseur</th>
            <th>Raison sociale</th>
            <th>Rue</th>
            <th>Code postal</th>
            <th>Ville</th>
            <th>Pays</th>
            <th>Téléphone</th>
            <th>Site internet</th>
            <th>E-mail</th>
            <th>Fax</th>";
            echo $_SESSION['Admin'] != "utilisateur" ? "<th>Modifier</th><th>Supprimer</th>" : "";
            echo "</tr></thead>";

            // Récupère les données sous format de tableau associatif et les affiche
            while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {

                echo "<tr>";
                foreach ($donnees as $key => $value) {
                    if ($key != "Id_fournisseur")
                        echo "<td data-cellTitle='$key'>" . stripslashes($value) . "</td>";
                }

                if ($_SESSION['Admin'] != "utilisateur") {
                    $_SESSION['table'] = "fournisseurs";

                    // Bouton modification
                    echo "<td>
                    <form action='../modification/modificationFournisseurs.php' method='POST'>
                    <input type='number' style='display:none;' value='" . $donnees['Id_fournisseur'] . "' name='modifFournisseur'>
                    <button type='submit'>
                    <svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px' fill='#000000'><path d='M0 0h24v24H0V0z' fill='none'/><path d='M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z'/></svg>
                    </button>
                    </form>
                    </td>";

                    // Bouton Supprimer
                    echo "<td>
                    <form action='../confirmationSuppression.php' method='POST'>
                    <input type='number' style='display:none;' value='" . $donnees['Id_fournisseur'] . "' name='suppFournisseur'>
                    <button type='submit'>
                    <svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px' fill='#000000'><path d='M0 0h24v24H0V0z' fill='none'/><path d='M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z'/></svg>
                    </button>
                    </form>
                    </td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        // Si erreur
        catch (PDOException $e) {
            die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
        }

        ?>

    </main>


</body>

</html>