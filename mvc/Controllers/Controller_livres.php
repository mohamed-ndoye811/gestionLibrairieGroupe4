<?php
class Controller_livres extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }

    public function action_all_livres()
    {
        $m = Model::get_model();
        $data = ['livres' => $m->get_all_livres()];
        $this->render("all_livres", $data);
    }

    /* -- Par titre */
    public function action_all_titres()
    {
        $m = Model::get_model();
        $data = ['titres' => $m->get_all_titres()];
        $this->render("all_titres", $data);
    }

    public function action_livre_titre()
    {
        $m = Model::get_model();

        if (isset($_POST['titre'])) {
            $titre = $_POST['titre'];
            $data = ["livreFound" => $m->get_livre_titre($titre)];
            $this->render("livre_titre", $data);
        } else {
            $this->action_error("Aucun titre n'a été sélectionné");
        }
    }

    /* -- par auteur */
    public function action_all_auteurs()
    {
        $m = Model::get_model();
        $data = ['auteurs' => $m->get_all_auteurs()];
        $this->render("all_auteurs", $data);
    }

    public function action_livres_auteur()
    {
        $m = Model::get_model();

        if (isset($_POST['Nom_auteur'])) {
            $auteur = $_POST['Nom_auteur'];
            $data = ["livresFound" => $m->get_livres_auteur($auteur)];
            $this->render("livres_auteur", $data);
        } else {
            $this->action_error("Aucun auteur n'a été sélectionné");
        }
    }

    /* -- Par editeur */
    public function action_all_editeurs()
    {
        $m = Model::get_model();
        $data = ['editeurs' => $m->get_all_editeurs()];
        $this->render("all_editeurs", $data);
    }

    public function action_livres_editeur()
    {
        $m = Model::get_model();

        if (isset($_POST['editeur'])) {
            $editeur = $_POST['editeur'];
            $data = ["livresFound" => $m->get_livres_editeur($editeur)];
            $this->render("livres_editeur", $data);
        } else {
            $this->action_error("Aucun éditeur n'a été sélectionné");
        }
    }

    /* -- Delete -- */
    public function action_delete()
    {
        $idToDelete = isset($_POST['idLivrSupprimer']) ? $_POST['idLivrSupprimer'] : '';

        $m = Model::get_model();
        $m->livres_delete($idToDelete);
        $this->action_all_livres();
    }

    /* -- Edit -- */
    public function action_modif_livres()
    {
        $idToEdit = isset($_POST['idLivrModif']) ? $_POST['idLivrModif'] : '';
        $_SESSION['modifIdLivr'] = $idToEdit;
        $m = Model::get_model();
        $data = ["livreInfos" => $m->modif_livres($idToEdit)];
        $this->render("modif_livres", $data);
    }

    public function action_confirmEdit()
    {
        $m = Model::get_model();

        foreach ($_POST as $property => $value) {
            $tab[$property] = addslashes($value);
        }

        $m->livres_confirmEdit($tab, $_SESSION['modifIdLivr']);
        unset($_SESSION['modifIdLivr']);
        $this->action_all_livres();
    }

    /*--Insert--*/

    /*--Pour aller vers la view--*/
    public function action_insert_livres()
    {
        $this->render("insert_livres");
    }

    /*--Pour faire l'insertion--*/
    public function action_confirmInsert()
    {
        $m = Model::get_model();

        foreach ($_POST as $property => $value) {
            $tab[$property] = addslashes($value);
        }

        $m->livres_confirmInsert($tab);;
        $this->action_all_livres();
    }
}