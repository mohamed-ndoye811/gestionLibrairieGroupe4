<main>
    <h1>Insertion de Commande</h1>
    <form action='?controller=commandes&action=confirmInsert' method='POST'>


        <div>
            <label for="insertCommIdLivre">Id Livre</label>
            <select name='insertCommIdLivre' required>
                <?php
                foreach ($livres as $livre) {
                    echo "<option value='" . $livre['Id_Livre'] . "'>" . $livre['Id_Livre'] . " - " . stripslashes($livre['Titre_livre']) . "</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label for="insertCommIdFour">Id Fournisseur</label>
            <select name='insertCommIdFour' required>
                <?php
                foreach ($fournisseurs as $fournisseur) {
                    echo "<option value='" . $fournisseur['Id_fournisseur'] . "'>" . $fournisseur['Id_fournisseur'] . " - " . stripslashes($fournisseur['Raison_sociale']) . "</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label for="inserCommPrix">Prix</label>
            <input type="text" name="inserCommPrix" id="inserCommPrix" required>
        </div>

        <div>
            <label for="inserCommNbExemplaires">Nombre d'exemplaires </label>
            <input type="text" name="inserCommNbExemplaires" id="inserCommNbExemplaires" required>
        </div>


        <div class="buttons">
            <button type="reset">Effacer</button>
            <button type="submit">Ajouter</button>
        </div>
</main>