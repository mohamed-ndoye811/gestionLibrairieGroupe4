<main class="deconnexion">
    <?php
    $_SESSION = array();
    session_destroy();
    ?>
    <h1>Vous allez être déconnecté</h1>
    <a href="?controller=auth&action=default" class="button">Continuer</a>
</main>