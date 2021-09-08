<?php
class Controller_fournisseurs extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }

    public function action_all_fournisseurs()
    {
        $m = Model::get_model();
        $data = ['fournisseurs' => $m->get_all_fournisseurs()];
        $this->render("all_fournisseurs", $data);
    }

    public function action_all_raison_sociale()
    {
        $m = Model::get_model();
        $data = ['fournisseurs' => $m->get_all_raison_sociale()];
        $this->render("all_raison_sociale", $data);
    }

    public function action_all_localites()
    {
        $m = Model::get_model();
        $data = ['fournisseurs' => $m->get_all_localites()];
        $this->render("all_localites", $data);
    }

    public function action_all_pays()
    {
        $m = Model::get_model();
        $data = ['fournisseurs' => $m->get_all_pays()];
        $this->render("all_pays", $data);
    }

    public function action_fournisseur_raison_sociale()
    {
        if (isset($_POST['raisonSociale'])) {
            $nom = $_POST['raisonSociale'];
            $m = Model::get_model();
            $data = ['fournisseurs' => $m->get_fournisseur_raison_sociale($nom)];
            $this->render("fournisseur_raison_sociale", $data);
        } else {
            $this->action_error("Impossible de retrouver la raison sociale !");
        }
    }

    public function action_fournisseurs_localite()
    {
        if (isset($_POST['localite'])) {
            $localite = $_POST['localite'];
            $m = Model::get_model();
            $data = ['fournisseurs' => $m->get_fournisseurs_localite($localite)];
            $this->render("fournisseurs_localite", $data);
        } else {
            $this->action_error("Impossible de retrouver la localité !");
        }
    }

    public function action_fournisseurs_pays()
    {

        if (isset($_POST['pays'])) {
            $pays = $_POST['pays'];
            $m = Model::get_model();
            $data = ['fournisseurs' => $m->get_fournisseurs_pays($pays)];
            $this->render("fournisseurs_pays", $data);
        } else {
            $this->action_error("Impossible de retrouver le pays !");
        }
    }


    /* -- Delete -- */
    public function action_delete()
    {
        $idToDelete = isset($_POST['suppFournisseur']) ? $_POST['suppFournisseur'] : '';
        $m = Model::get_model();
        $m->fournisseurs_delete($idToDelete);
        $this->action_all_fournisseurs();
    }

    /* -- Edit -- */
    public function action_modif_fournisseurs()
    {
        $idToEdit = isset($_POST['modifFournisseur']) ? $_POST['modifFournisseur'] : '';
        $_SESSION['modifFournisseur'] = $idToEdit;
        $m = Model::get_model();
        $data = ["fournisseur" => $m->modif_fournisseurs($idToEdit)];
        $this->render("modif_fournisseurs", $data);
    }

    public function action_confirmEdit()
    {
        $m = Model::get_model();

        foreach ($_POST as $property => $value) {
            $tab[$property] = addslashes($value);
        }

        $m->fournisseurs_confirmEdit($tab, $_SESSION['modifFournisseur']);
        unset($_SESSION['modifFournisseur']);
        $this->action_all_fournisseurs();
    }

    /*--Insert--*/

    /*--Pour aller vers la view--*/
    public function action_insert_fournisseurs()
    {
        $this->render("insert_fournisseurs");
    }

    /*--Pour faire l'insertion--*/
    public function action_confirmInsert()
    {
        $m = Model::get_model();

        foreach ($_POST as $property => $value) {
            $tab[$property] = addslashes($value);
        }

        $m->fournisseurs_confirmInsert($tab);
        $this->action_all_fournisseurs();
    }
}