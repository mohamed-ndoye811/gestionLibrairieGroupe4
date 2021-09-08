<main>
    <h1>Recherche de fournisseurs par pays</h1>
    <form action="?controller=fournisseurs&action=fournisseurs_pays" method="post">
        <select name="pays" id="pays">
            <?php foreach ($fournisseurs as $fournisseur) : ?>
            <?= "<option value=\"" . addslashes($fournisseur['Pays']) . "\">" . $fournisseur['Pays'] . "</option>"; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Rechercher">
    </form>
</main>