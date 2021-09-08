<main>
    <h1>Recherche de livres par auteur</h1>
    <form action="?controller=livres&action=livres_auteur" method="POST">
        <select name="Nom_auteur">
            <?php foreach ($auteurs as $auteur) : ?>
            <?= "<option value=\"" . addslashes($auteur['Nom_auteur']) . "\">" . $auteur['Nom_auteur'] . "</option>"; ?>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Rechercher" />
    </form>
</main>