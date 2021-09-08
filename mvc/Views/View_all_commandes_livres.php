<main>
    <h1>Recherche de commandes par livre</h1>
    <form action="?controller=commandes&action=commandes_livre" method="post">
        <select name="livre" id="livre">
            <?php foreach ($commandes as $commande) : ?>
            <?= "<option value=\"" . addslashes($commande['Id_Livre']) . "\">" . stripslashes($commande['Titre_livre']) . "</option>"; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Rechercher">
    </form>
</main>