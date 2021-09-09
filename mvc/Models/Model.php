<?php
class Model
{
    private $db; // variable contenant la base de données

    private static $instance = null; //Nombre d'instance créées

    private function __construct()
    {
        try {
            require_once("./Utils/DB_Connex.php");
            $this->db = new PDO("mysql:host={$dbInfos['host']};dbname={$dbInfos['dbName']}", $dbInfos['username'], $dbInfos['password']);
            $this->db->query("SET NAMES 'utf8'");
        } catch (PDOException $e) {
            die('<p> Echec de la connextion. <br> Erreur[' . $e->getCode() . '] : ' . $e->getMessage() . ' </p>');
        }
    }

    public static function get_model()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }

        return self::$instance;
    }

    // ==== LIVRES ==== 
    public function get_all_livres()
    {
        $result = $this->db->prepare("SELECT * FROM livres order by Titre_livre");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* -- Par titre */
    public function get_all_titres()
    {
        $result = $this->db->prepare("SELECT Titre_livre from livres");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_livre_titre($titre)
    {
        $request = "SELECT * from livres WHERE Titre_livre = '$titre'";
        $result = $this->db->prepare($request);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_select_livres()
    {
        $result = $this->db->prepare("SELECT Id_Livre, Titre_livre FROM `livres`");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* -- Par auteur */
    public function get_all_auteurs()
    {
        $result = $this->db->prepare("SELECT Nom_auteur, Prenom_auteur from livres");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_livres_auteur($auteur)
    {
        $request = "SELECT * from livres WHERE Nom_auteur = '$auteur'";
        $result = $this->db->prepare($request);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* -- Editeur */
    public function get_all_editeurs()
    {
        $result = $this->db->prepare("SELECT Editeur from livres");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_livres_editeur($editeur)
    {
        $request = "SELECT * from livres WHERE Editeur = '$editeur'";
        $result = $this->db->prepare($request);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* ==== Delete ==== */
    public function livres_delete($idToDelete)
    {
        $result = $this->db->prepare(
            "DELETE FROM `livres` WHERE `Id_Livre`=?;"
        );

        $result->bindValue(1, strtoupper(trim($idToDelete)));

        $result->execute();
    }

    /* ==== Edit ==== */
    public function modif_livres($idToEdit)
    {
        $result = $this->db->prepare(
            "SELECT * FROM `livres` WHERE `Id_Livre`=?;"
        );

        $result->bindValue(1, strtoupper(trim($idToEdit)));

        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function livres_confirmEdit($tab, $livreID)
    {
        $result = $this->db->prepare(
            "UPDATE livres
            
            SET
            `Titre_livre` = ?,
            `Theme_livre` = ?,
            `Prix_vente` = ?,
            `Nom_auteur` = ?,
            `Prenom_auteur` = ?,
            `ISBN` = ?,
            `Editeur` = ?,
            `Nbr_pages_livre` = ?,
            `Annee_edition` = ?,
            `Langue_livre` = ?,
            `Format_livre` = ?
            
            WHERE `Id_Livre` = ?;"
        );


        $i = 1;
        foreach ($tab as $key => $value) {
            $result->bindValue($i++, $value);
        }

        $result->bindValue($i, $livreID);

        $result->execute();
    }

    /* ==== Insert ==== */

    public function livres_confirmInsert($tab)
    {
        // Insertion des données
        $result = $this->db->prepare(
            "INSERT INTO 
            `livres` (`Id_Livre`, `ISBN`, `Titre_livre`, `Theme_livre`, `Editeur` , `Format_livre`, `Nom_auteur`, `Prenom_auteur`, `Nbr_pages_livre`, `Annee_edition`, `Prix_vente`, `Langue_livre`) 
            VALUES 
            (NULL,?,?,?,?,?,?,?,?,?,?,?);"
        );

        $i = 1;
        foreach ($tab as $key => $value) {
            $result->bindValue($i++, $value);
        }

        $result->execute();
    }

    // ==== FOURNISSEURS ==== 
    public function get_all_fournisseurs()
    {
        $result = $this->db->prepare("SELECT * FROM fournisseurs order by Raison_Sociale");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    /* -- Par raison sociale */
    public function get_all_raison_sociale()
    {
        $result = $this->db->prepare("SELECT `Raison_sociale` FROM `fournisseurs` order by Raison_Sociale");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_fournisseur_raison_sociale($nom)
    {
        $result = $this->db->prepare("SELECT * FROM `fournisseurs` WHERE `Raison_sociale`= ?");
        $result->bindValue(1, $nom);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* -- Par localités */
    public function get_all_localites()
    {
        $result = $this->db->prepare("SELECT distinct `Localite` FROM `fournisseurs` order by Localite");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_fournisseurs_localite($localite)
    {
        $result = $this->db->prepare("SELECT * FROM `fournisseurs` WHERE `Localite`= ?");
        $result->bindValue(1, $localite);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* -- Par pays */
    public function get_all_pays()
    {
        $result = $this->db->prepare("SELECT DISTINCT `Pays` FROM `fournisseurs` order by Pays");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_fournisseurs_pays($pays)
    {
        $result = $this->db->prepare("SELECT * FROM `fournisseurs` WHERE `Pays`= ?");
        $result->bindValue(1, $pays);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_select_fournisseurs()
    {
        $result = $this->db->prepare("SELECT Id_fournisseur, Raison_sociale FROM `fournisseurs`");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* ==== Delete ==== */
    public function fournisseurs_delete($idToDelete)
    {
        $result = $this->db->prepare("DELETE FROM `fournisseurs` WHERE `Id_fournisseur`=?;");
        $result->bindValue(1, strtoupper(trim($idToDelete)));

        $result->execute();
    }

    /* ==== Edit ==== */
    public function modif_fournisseurs($idToEdit)
    {
        $result = $this->db->prepare(
            "SELECT * FROM `fournisseurs` WHERE `Id_fournisseur`=?;"
        );

        $result->bindValue(1, $idToEdit);

        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function fournisseurs_confirmEdit($tab, $fournisseurID)
    {
        $result = $this->db->prepare(
            "UPDATE `fournisseurs` 
            SET `Code_fournisseur`=?,
            `Raison_sociale`=?,
            `Rue_fournisseur`=?,
            `Code_postal`=?,
            `Localite`=?,
            `Pays`=?,
            `Tel_fournisseur`=?,
            `Url_fournisseur`=?,
            `Email_fournisseur`=?,
            `Fax_fournisseur`=? 
            WHERE `Id_fournisseur`=?;"
        );


        $i = 1;
        foreach ($tab as $key => $value) {
            $result->bindValue($i++, $value);
        }

        $result->bindValue($i, $fournisseurID);

        $result->execute();
    }

    /* ==== Insert ==== */

    public function fournisseurs_confirmInsert($tab)
    {
        $result = $this->db->prepare(
            "INSERT INTO `fournisseurs` (`Code_fournisseur`, `Raison_sociale`, `Rue_fournisseur`, `Code_postal`, `Localite`, `Pays`, `Tel_fournisseur`, `Url_fournisseur`, `Email_fournisseur`, `Fax_fournisseur`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"
        );

        print_r($tab);

        $i = 1;
        foreach ($tab as $key => $value) {
            $result->bindValue($i++, $value);
        }

        $result->execute();
    }


    // ==== COMMANDES ==== 
    public function get_all_commandes()
    {
        $result = $this->db->prepare("SELECT L.`Titre_livre`,F.`Raison_sociale`,C.* 
        FROM commander AS C 
        INNER JOIN livres AS L ON C.Id_Livre = L.Id_Livre 
        INNER JOIN fournisseurs AS F ON C.Id_fournisseur = F.Id_fournisseur
        ORDER BY Date_achat");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* -- Par fournisseur */
    public function get_all_commandes_fournisseurs()
    {
        $result = $this->db->prepare(
            "SELECT F.`Raison_sociale`, C.* 
            FROM `fournisseurs` AS F, commander AS C
            WHERE C.Id_fournisseur = F.Id_fournisseur
            order by Raison_Sociale"
        );
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_commandes_fournisseur($fournisseur)
    {
        $result = $this->db->prepare(
            "SELECT L.`Titre_livre`,F.`Raison_sociale`,C.* 
            FROM commander AS C
            INNER JOIN livres AS L ON C.Id_Livre=L.Id_Livre
            INNER JOIN fournisseurs AS F ON C.Id_fournisseur=F.Id_fournisseur
            WHERE C.Id_fournisseur = $fournisseur;"
        );
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* -- Par Livre */
    public function get_all_commandes_livres()
    {
        $result = $this->db->prepare(
            "SELECT L.`Titre_livre`, C.* 
            FROM `livres` AS L, commander AS C
            WHERE C.Id_Livre = L.Id_Livre 
            order by Titre_livre"
        );
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_commandes_livre($livre)
    {
        $result = $this->db->prepare(
            "SELECT L.`Titre_livre`,F.`Raison_sociale`,C.* 
            FROM commander AS C
            INNER JOIN livres AS L ON C.Id_Livre=L.Id_Livre
            INNER JOIN fournisseurs AS F ON C.Id_fournisseur=F.Id_fournisseur
            WHERE C.Id_Livre = $livre "
        );
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* -- Par date */
    public function get_all_dates()
    {
        $result = $this->db->prepare("SELECT `Date_achat` FROM `commander` order by Date_achat");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_commandes_date($date)
    {
        $result = $this->db->prepare(
            "SELECT L.`Titre_livre`,F.`Raison_sociale`,C.* 
            FROM commander AS C
            INNER JOIN livres AS L ON C.Id_Livre = L.Id_Livre 
            INNER JOIN fournisseurs AS F ON C.Id_fournisseur = F.Id_fournisseur
            WHERE C.Date_achat = '$date'"
        );
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* ==== Delete ==== */
    public function commandes_delete($idToDelete)
    {
        $result = $this->db->prepare(
            "DELETE FROM `commander` WHERE `id_commande`=?;"
        );

        $result->bindValue(1, strtoupper(trim($idToDelete)));

        $result->execute();
    }

    /* ==== Edit ==== */
    public function modif_commandes($idToEdit)
    {
        $result = $this->db->prepare(
            "SELECT * FROM `commander` WHERE `id_commande`=?;"
        );

        $result->bindValue(1, strtoupper(trim($idToEdit)));

        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function commandes_confirmEdit($tab, $commandeID)
    {
        $result = $this->db->prepare("UPDATE commander 
        SET
        `Id_Livre` = ?,
        `Id_fournisseur` = ?,
        `Date_achat` = ?,
        `Prix_achat` = ?,
        `Nbr_exemplaires` = ?
            
        WHERE `id_commande` = ?;");
        $i = 1;
        foreach ($tab as $key => $value) {
            $result->bindValue($i++, $value);
        }
        $result->bindValue($i, $commandeID);

        $result->execute();
    }

    /* ==== Insert ==== */

    public function commandes_confirmInsert($tab)
    {
        // Insertion des données
        $result = $this->db->prepare("INSERT INTO 
        `commander`(`id_commande`, `Id_Livre`, `Id_fournisseur`, `Date_achat`, `Prix_achat`, `Nbr_exemplaires`) 
        VALUES 
        (NULL,?,?,CURRENT_TIMESTAMP,?,?);");
        $i = 1;

        foreach ($tab as $key => $value) {
            if ($key == 'inserCommDateAchat') {
                continue;
            }
            $result->bindValue($i++, $value);
        }

        $result->execute();
    }

    /* ==== AUTH ==== */
    public function inscription($inscNom, $inscPrenom, $inscMDP)
    {
        $result = $this->db->prepare(
            "INSERT INTO 
            `user`(`idUser`, `Nom`, `Prenom`, `MdP`) 
            VALUES 
            ('',?,?,MD5(?));"
        );

        $result->bindValue(1, $inscNom);
        $result->bindValue(2, $inscPrenom);
        $result->bindValue(3, $inscMDP);

        $result->execute();
    }

    public function auth($nom, $mdp)
    {
        $result = $this->db->prepare(
            "SELECT * FROM user WHERE Nom=? AND MdP=MD5(?)"
        );

        $result->bindValue(1, strtoupper(trim($nom)));
        $result->bindValue(2, $mdp);

        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }
}