<main>
    <h1>Recherche de livres par titre</h1>
    <form action="?controller=livres&action=livre_titre" method="POST">
        <select name="titre">
            <?php foreach ($titres as $titre) : ?>
            <?= "<option value=\"" . addslashes($titre['Titre_livre']) . "\">" . stripslashes($titre['Titre_livre']) . "</option>"; ?>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Rechercher" />
    </form>
</main>