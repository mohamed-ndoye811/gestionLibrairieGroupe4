<main>
    <h1>Recherche de commandes par fournisseur</h1>
    <form action="?controller=commandes&action=commandes_fournisseur" method="post">
        <select name="fournisseur" id="fournisseur">
            <?php foreach ($commandes as $commande) : ?>
            <?= "<option value=\"" . addslashes($commande['Id_fournisseur']) . "\">" . stripslashes($commande['Raison_sociale']) . "</option>"; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Rechercher">
    </form>
</main>