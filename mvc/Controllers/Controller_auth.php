<?php class Controller_auth extends Controller
{
    public function action_default()
    {
        $this->render('auth');
    }

    public function action_home()
    {
        $this->render('home');
    }

    public function action_inscription()
    {
        $m = Model::get_model();
        $this->render('inscription');
    }

    public function action_sendInscript()
    {
        $m = Model::get_model();
        $m->inscription(addslashes($_POST['inscNom']), addslashes($_POST['inscPrenom']), addslashes($_POST['inscPassword']));
        $this->render('auth');
    }

    public function action_auth()
    {
        $m = Model::get_model();
        $data = $m->auth(addslashes($_POST['loginNom']), addslashes($_POST['loginPassword']));

        if ($data) {
            $_SESSION['Nom'] = $data['Nom'];
            $_SESSION['Prenom'] = $data['Prenom'];
            $_SESSION['Admin'] = $data['Admin'];
            $_SESSION['auth'] = true;
            // Ligne de redirection pour avoir le bouton de deconnexion et le nom d'auth sans délai
            echo '<meta http-equiv="refresh" content="0;url=?controller=home&action=home" />';
        } else {
            $this->action_default();
        }
    }

    public function action_deconnect()
    {
        $_SESSION['auth'] = false;
        $_SESSION = [];
        $this->render("deconnect");
        // Ligne de redirection pour avoir le bouton de deconnexion et le nom d'auth sans délai
        echo '<meta http-equiv="refresh" content="2;url=?controller=auth&action=default" />';
    }
}