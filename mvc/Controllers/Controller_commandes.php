<?php
class Controller_commandes extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }

    public function action_all_commandes()
    {
        $m = Model::get_model();
        $data = ['commandes' => $m->get_all_commandes()];
        $this->render("all_commandes", $data);
    }

    /* -- Par livre */
    public function action_all_commandes_livres()
    {
        $m = Model::get_model();
        $data = ['commandes' => $m->get_all_commandes_livres()];
        $this->render("all_commandes_livres", $data);
    }

    public function action_commandes_livre()
    {

        if (isset($_POST['livre'])) {
            $livre = $_POST['livre'];
            $m = Model::get_model();
            $data = ['commandes' => $m->get_commandes_livre($livre)];
            $this->render("commandes_livre", $data);
        } else {
            $this->action_error("Impossible de retrouver le livre !");
        }
    }

    /* -- Par fournisseur */
    public function action_all_commandes_fournisseurs()
    {
        $m = Model::get_model();
        $data = ['commandes' => $m->get_all_commandes_fournisseurs()];
        $this->render("all_commandes_fournisseurs", $data);
    }

    public function action_commandes_fournisseur()
    {
        if (isset($_POST['fournisseur'])) {
            $fournisseur = $_POST['fournisseur'];
            $m = Model::get_model();
            $data = ['commandes' => $m->get_commandes_fournisseur($fournisseur)];
            $this->render("commandes_fournisseur", $data);
        } else {
            $this->action_error("Impossible de retrouver le fournisseur !");
        }
    }

    /* -- Par date */
    public function action_all_dates()
    {
        $m = Model::get_model();
        $data = ['commandes' => $m->get_all_dates()];
        $this->render("all_dates", $data);
    }

    public function action_commandes_date()
    {
        if (isset($_POST['date'])) {
            $date = $_POST['date'];
            $m = Model::get_model();
            $data = ['commandes' => $m->get_commandes_date($date)];
            $this->render("commandes_date", $data);
        } else {
            $this->action_error("Impossible de retrouver la date !");
        }
    }

    /* -- Delete -- */
    public function action_delete()
    {
        $idToDelete = isset($_POST['idCommSupprimer']) ? $_POST['idCommSupprimer'] : '';
        $m = Model::get_model();
        $m->commandes_delete($idToDelete);
        $this->action_all_commandes();
    }

    /* -- Edit -- */
    public function action_modif_commandes()
    {
        $idToEdit = isset($_POST['idCommModif']) ? $_POST['idCommModif'] : '';
        $_SESSION['modifidComm'] = $idToEdit;
        $m = Model::get_model();
        $data = ["commandeInfos" => $m->modif_commandes($idToEdit), "livres" => $m->get_select_livres(), "fournisseurs" => $m->get_select_fournisseurs()];
        $this->render("modif_commandes", $data);
    }

    public function action_confirmEdit()
    {
        $m = Model::get_model();

        foreach ($_POST as $property => $value) {
            $tab[$property] = addslashes($value);
        }

        $m->commandes_confirmEdit($tab, $_SESSION['modifidComm']);
        unset($_SESSION['modifidComm']);
        $this->action_all_commandes();
    }

    /*--Insert--*/

    /*--Pour aller vers la view--*/
    public function action_insert_commandes()
    {
        $m = Model::get_model();
        $data = ["livres" => $m->get_select_livres(), "fournisseurs" => $m->get_select_fournisseurs()];
        $this->render("insert_commandes", $data);
    }

    /*--Pour faire l'insertion--*/
    public function action_confirmInsert()
    {
        $m = Model::get_model();

        foreach ($_POST as $property => $value) {
            $tab[$property] = addslashes($value);
        }

        $m->commandes_confirmInsert($tab);
        $this->action_all_commandes();
    }
}