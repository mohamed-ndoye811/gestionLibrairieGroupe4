<?php
session_start();
//Vérification si les informations nécessaires sont bien là
if (isset($_SESSION['requete'])) {

    //Connexion à la base de données
    $connex = mysqli_connect('localhost', 'root', '', 'gestion_librairie');

    // Vérification si la connexion a réussi
    if (!$connex) {
        echo "<script type=text/javascript>alert('Connexion impossible à la base de données');</script>";
    } else {
        // Suppression des données
        $requete = $_SESSION['requete'];
        $result = mysqli_query($connex, $requete);
        mysqli_close($connex);
        if (!$result) {
            echo "
                <script>
                alert('ERREUR - Suppression échouée'); 
                </script>";
        } else {
            switch ($_SESSION['table']) {
                case 'commander':
                    header('Location: ../consultation/consultationCommander.php');
                    break;
                case 'fournisseurs':
                    header('Location: ../consultation/consultationFournisseurs.php');
                    break;
                case 'livres':
                    header('Location: ../consultation/consultationLivres.php');
                    break;
                default:
                    echo "<script>
                    alert('ERREUR - Impossible de reconnaitre la table demandée');
                    </script>";
            }
        }
    }
} else {
    echo "<script type=text/javascript>alert('Erreur - Des informations sont manquantes');</script>";
    header('Location: ../accueil.php');
}