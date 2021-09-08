<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <script src="../js/functions.js" defer></script>
    <title>Confirmation de Suppression</title>
</head>

<body>
    <?php
    include_once('header.php');
    include_once('footer.php');
    ?>

    <main>
        <h1>Confimation de suppression</h1>
        <?php
        if (isset($_SESSION['table'])) {
            $table = $_SESSION['table'];
            switch ($table) {
                case 'commander':
                    if (isset($_POST['idCommSupprimer'])) {
                        $idSupprimer = $_POST['idCommSupprimer'];
                        $_SESSION['requete'] = "DELETE FROM `commander` WHERE `id_commande`= '$idSupprimer';";
                    } else {
                        echo "<script>
                alert('ERREUR - Impossible de supprimer la commande);
                </script>";
                    }
                    break;

                case 'fournisseurs':
                    if (isset($_POST['suppFournisseur'])) {
                        $idSupprimer = $_POST['suppFournisseur'];
                        $_SESSION['requete'] = "DELETE FROM `fournisseurs` WHERE `Id_fournisseur`= '$idSupprimer';";
                    } else {
                        echo "<script>
                alert('ERREUR - Impossible de supprimer la commande);
                </script>";
                    }
                    break;

                case 'livres':
                    if (isset($_POST['idLivreSupprimer'])) {
                        $idSupprimer = $_POST['idLivreSupprimer'];
                        $_SESSION['requete'] = "DELETE FROM `livres` WHERE `Id_Livre`='$idSupprimer';";
                    } else {
                        echo "<script>
                alert('ERREUR - Impossible de supprimer la commande);
                </script>";
                    }

                    break;

                default:
                    echo "<script>
        alert('ERREUR - Impossible de reconnaitre la table demandée');
        </script>";
                    break;
            }
            echo "<h2>Êtes-vous sûr de vouloir supprimer cet élément ?</h2>
        <button><a href='./traitement/traitementSuppression.php'>Oui</a></button>
        <button><a href='./accueil.php'>Non</a></button>";
        }
        ?>
    </main>

</body>

</html>