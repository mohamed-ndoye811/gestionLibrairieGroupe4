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
        <h1>Consultation Livres</h1>
        <?php
        $userIsAdmin = ($_SESSION["Admin"] != "utilisateur");

        try {
            include_once('../connexiondb.php');
            // Préparation de la requête
            $requete = $db->prepare('SELECT * FROM livres');

            try {
                // Exécution de la requête
                $requete->execute();
                // Récupère toutes les données sous format de tableau associatif
                $allLivres = $requete->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die('<p> Echec de la connextion. <br> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . ' </p>');
            }

            if ($userIsAdmin) {
                echo "<button><a href='../insertion/insertionLivre.php'>Ajouter un livre</a></button>";
            }

            echo "<table style='font-size: 15px;'>";

            echo "<thead>";

            echo
            "<tr>
                <th>ISBN</th>
                <th>Titre du Livre</th>
                <th>Thème livre</th>
                <th>Nb pages</th>
                <th>Format</th>
                <th>Nom Auteur</th>
                <th>Prenom auteur</th>
                <th>Editeur</th>
                <th>Année d'édition</th>
                <th>Prix</th>
                <th>Langue</th>";
            echo $_SESSION['Admin'] != "utilisateur" ? "<th>Modifier</th><th>Supprimer</th>" : "";
            echo "</tr>";

            echo "</thead>";
            echo "<tbody>";

            foreach ($allLivres as $livre) {

                // Debut de la ligne contenant les informations
                $livreLine =  "<tr>";
                foreach ($livre as $livreProperty => $livrePropertyValue) {
                    if ($livreProperty != "Id_Livre") {
                        $livreLine .= "<td data-cellTitle= '$livreProperty'>" . stripslashes($livrePropertyValue) . "</td>";
                    }
                }

                if ($userIsAdmin) {
                    $_SESSION['table'] = "livres";
                    // On utilise des form pour envoyer l'id du livre à modifier ou supprimer en POST en non en GET pour plus de sécurité
                    $livreLine .= "
                <td>
                    <form action='../modification/modificationLivre.php' method='POST'>
                        <input type='number' style='display: none;' value='" . $livre['Id_Livre'] . "' name='idLivreModif'>
                        <button type='submit'>
                            <svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px' fill='#000000'><path d='M0 0h24v24H0V0z' fill='none'/><path d='M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z'/></svg>
                        </button>
                    </form>
                </td> 
                <td>
                    <form action='../confirmationSuppression.php' method='POST'>
                        <input type='number' style='display: none;' value='" . $livre['Id_Livre'] . "' name='idLivreSupprimer'>
                        <button type='submit'>
                            <svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 0 24 24' width='24px' fill='#000000'><path d='M0 0h24v24H0V0z' fill='none'/><path d='M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z'/></svg>
                        </button>
                    </form>
                </td> 
                </tr>";
                } else {
                    //Si l'utilisateur connecté n'est pas un utilisateur alors on affiche les boutons de modification et suppression 
                    $livreLine .= $userIsAdmin
                        ?: "</tr>";
                }

                echo $livreLine;
            }
            echo "</tbody>";
            echo "</table>";
        } catch (PDOException $e) {
            die('<p>Echec de connexion. Erreur [' . $e->getCode() . ']: ' . $e->getMessage() . '</p>');
        }

        ?>
    </main>
</body>

</html>