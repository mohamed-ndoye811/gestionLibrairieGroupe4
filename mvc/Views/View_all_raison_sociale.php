<main>
    <h1>Recherche de fournisseurs par raison sociale</h1>
    <form action="?controller=fournisseurs&action=fournisseur_raison_sociale" method="post">
        <select name="raisonSociale" id="raisonSociale">
            <?php foreach ($fournisseurs as $fournisseur) : ?>
            <?= "<option value=\"" . addslashes($fournisseur['Raison_sociale']) . "\">" . stripslashes($fournisseur['Raison_sociale']) . "</option>"; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Rechercher">
    </form>
</main>