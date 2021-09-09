<main>
    <h3>Commande N°$commandeID</h3>

    <form action='?controller=commandes&action=confirmEdit' method='POST'>
        <div>
            <label for="modifCommIdLivre">Id Livre</label>
            <select name='modifCommIdLivre' required>
                <?php
                foreach ($livres as $livre) {
                    echo "<option value='" . $livre['Id_Livre'] . "'";

                    if ($livre['Id_Livre'] == $commandeInfos['Id_Livre']) {
                        echo 'selected';
                    }

                    echo ">" . $livre['Id_Livre'] . " - " . stripslashes($livre['Titre_livre']) . "</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label for="modifCommIdFour">Id Fournisseur</label>
            <select name='modifCommIdFour' required>
                <?php
                foreach ($fournisseurs as $fournisseur) {
                    echo "<option value='" . $fournisseur['Id_fournisseur'] . "'";

                    if ($fournisseur['Id_fournisseur'] == $commandeInfos['Id_fournisseur']) {
                        echo 'selected';
                    }

                    echo ">" . $fournisseur['Id_fournisseur'] . " - " . stripslashes($fournisseur['Raison_sociale']) . "</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label for="modifCommDateAchat">Date achat</label>
            <input type="text" name="modifCommDateAchat" id="modifCommDateAchat"
                value="<?= $commandeInfos['Date_achat'] ?>" required>
        </div>

        <div>
            <label for="modifCommPrix">Prix</label>
            <input type="text" name="modifCommPrix" id="modifCommPrix" value="<?= $commandeInfos['Prix_achat'] ?>"
                required>
        </div>

        <div>
            <label for="modifCommNbExemplaires">Nombre d'exemplaires </label>
            <input type="text" name="modifCommNbExemplaires" id="modifCommNbExemplaires"
                value="<?= $commandeInfos['Nbr_exemplaires'] ?>" required>
        </div>


        <div class="buttons">
            <button type="reset">Effacer</button>
            <button type="submit" class="button">Modifier</button>
        </div>
    </form>
</main>