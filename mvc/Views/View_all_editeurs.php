<main>
    <h1>Recherche de livres par éditeur</h1>
    <form action="?controller=livres&action=livres_editeur" method="POST">
        <select name="editeur">
            <?php foreach ($editeurs as $editeur) : ?>
            <?= "<option value=\"" . addslashes($editeur['Editeur']) . "\">" . stripslashes($editeur['Editeur']) . "</option>"; ?>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Rechercher" />
    </form>
</main>