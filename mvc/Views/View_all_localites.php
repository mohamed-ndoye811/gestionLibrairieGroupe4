<main>
    <h1>Recherche de fournisseurs par localité</h1>
    <form action="?controller=fournisseurs&action=fournisseurs_localite" method="post">
        <select name="localite" id="localite">
            <?php foreach ($fournisseurs as $fournisseur) : ?>
            <?= "<option value=\"" . addslashes($fournisseur['Localite']) . "\">" . $fournisseur['Localite'] . "</option>"; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Rechercher">
    </form>
</main>