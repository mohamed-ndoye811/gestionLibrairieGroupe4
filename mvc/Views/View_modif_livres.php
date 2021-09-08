<main>
    <form action='?controller=livres&action=confirmEdit' method='POST'>

        <h3>Livre</h3>
        <div>
            <label for="modifLivrTitre">Titre</label>
            <input type="text" name="modifLivrTitre" id="modifLivrTitre"
                value="<?= stripslashes($livreInfos['Titre_livre']) ?> " required>
        </div>

        <div>
            <label for="modifLivrTheme">Theme</label>
            <input type="text" name="modifLivrTheme" id="modifLivrTheme"
                value="<?= stripslashes($livreInfos['Theme_livre']) ?>" required>
        </div>

        <div>
            <label for="modifLivrPrix">Prix</label>
            <input type="text" name="modifLivrPrix" id="modifLivrPrix" value="<?= $livreInfos['Prix_vente'] ?>"
                required>
        </div>

        <h3>Auteur</h3>
        <div>
            <label for="modifLivrNomAuteur">Nom</label>
            <input type="text" name="modifLivrNomAuteur" id="modifLivrNomAuteur"
                value="<?= stripslashes($livreInfos['Nom_auteur']) ?>" required>
        </div>

        <div>
            <label for="modifLivrPrenomAuteur">Prenom</label>
            <input type="text" name="modifLivrPrenomAuteur" id="modifLivrPrenomAuteur"
                value="<?= stripslashes($livreInfos['Prenom_auteur']) ?>" required>
        </div>

        <h3>Edition</h3>

        <div>
            <label for="modifLivrISBN">ISBN</label>
            <input type="text" name="modifLivrISBN" id="modifLivrISBN" value="<?= $livreInfos['ISBN'] ?>" required>
        </div>

        <div>
            <label for="modifLivrEditeur">Editeur</label>
            <input type="text" name="modifLivrEditeur" id="modifLivrEditeur"
                value="<?= stripslashes($livreInfos['Editeur']) ?>" required>
        </div>

        <div>
            <label for="modifLivrNbPages">Nb pages</label>
            <input type="text" name="modifLivrNbPages" id="modifLivrNbPages"
                value="<?= $livreInfos['Nbr_pages_livre'] ?>" required>
        </div>

        <div>
            <label for="modifLivrAnneeEdition">Année d\'édition</label>
            <input type="text" name="modifLivrAnneeEdition" id="modifLivrAnneeEdition"
                value="<?= $livreInfos['Annee_edition'] ?>" required>
        </div>

        <div>
            <label for="modifLivrLangue">Langue</label>
            <input type="text" name="modifLivrLangue" id="modifLivrLangue" value="<?= $livreInfos['Langue_livre'] ?>"
                required>
        </div>

        <div>
            <label for="modifLivrFormat">Format</label>
            <input type="text" name="modifLivrFormat" id="modifLivrFormat" value="<?= $livreInfos['Format_livre'] ?>"
                required>
        </div>


        <div class="buttons">
            <button type="reset">Effacer</button>
            <button type="submit" class="button">Modifier</button>
        </div>
    </form>
</main>