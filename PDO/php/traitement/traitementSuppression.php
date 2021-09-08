<?php
session_start();
//Vérification si les informations nécessaires sont bien là
if (isset($_SESSION['requete'])) {

    try{
        include_once('../connexiondb.php');
        // Suppression des données
        $requete= $db->prepare($_SESSION['requete']);
        try {
            $requete->execute();
            }
            catch(PDOException $e){
                die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
            }
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
        catch(PDOException $e){
            die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
        }
    } else {
    echo "<script type=text/javascript>alert('Erreur - Des informations sont manquantes');</script>";
    header('Location: ../accueil.php');
}
?>