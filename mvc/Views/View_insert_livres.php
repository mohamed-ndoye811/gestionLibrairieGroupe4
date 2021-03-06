<main>
    <form action='?controller=livres&action=confirmInsert' method='POST'>
        <h3>Livre</h3>

        <div>
            <label for="insertLivrTitre">Titre</label>
            <input type="text" name="insertLivrTitre" id="insertLivrTitre" required>
        </div>

        <div>
            <label for="insertLivrTheme">Theme</label>
            <input type="text" name="insertLivrTheme" id="insertLivrTheme" required>
        </div>

        <div>
            <label for="insertLivrPrix">Prix</label>
            <input type="text" name="insertLivrPrix" id="insertLivrPrix" required>
        </div>

        <h3>Auteur</h3>
        <div>
            <label for="insertLivrNomAuteur">Nom</label>
            <input type="text" name="insertLivrNomAuteur" id="insertLivrNomAuteur" required>
        </div>

        <div>
            <label for="insertLivrPrenomAuteur">Prenom</label>
            <input type="text" name="insertLivrPrenomAuteur" id="insertLivrPrenomAuteur" required>
        </div>

        <h3>Edition</h3>

        <div>
            <label for="insertLivrISBN">ISBN</label>
            <input type="text" name="insertLivrISBN" id="insertLivrISBN" required>
        </div>

        <div>
            <label for="insertLivrEditeur">Editeur</label>
            <input type="text" name="insertLivrEditeur" id="insertLivrEditeur" required>
        </div>

        <div>
            <label for="insertLivrNbPages">Nb pages</label>
            <input type="text" name="insertLivrNbPages" id="insertLivrNbPages" required>
        </div>

        <div>
            <label for="insertLivrAnneeEdition">Année d'édition</label>
            <input type="text" name="insertLivrAnneeEdition" id="insertLivrAnneeEdition" required>
        </div>

        <div>
            <label for="insertLivrLangue">Langue</label>
            <input type="text" name="insertLivrLangue" id="insertLivrLangue" required>
        </div>

        <div>
            <label for="insertLivrFormat">Format</label>
            <input type="text" name="insertLivrFormat" id="insertLivrFormat" required>
        </div>

        <div class="buttons">
            <button type="reset">Effacer</button>
            <button type="submit">Ajouter</button>
        </div>
    </form>
</main>