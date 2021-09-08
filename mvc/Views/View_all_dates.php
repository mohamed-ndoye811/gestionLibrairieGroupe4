<main>
    <h1>Recherche de commandes par date</h1>
    <form action="?controller=commandes&action=commandes_date" method="post">
        <select name="date" id="date">
            <?php foreach ($commandes as $commande) : ?>
            <?= "<option value=\"" . addslashes($commande['Date_achat']) . "\">" . $commande['Date_achat'] . "</option>"; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Rechercher">
    </form>
</main>