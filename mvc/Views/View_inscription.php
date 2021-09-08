<main class="authPage">
    <h1>Inscription</h1>
    <form action="?controller=auth&action=sendInscript" method="POST">
        <div class="nom">
            <label for="inscNom">Nom</label>
            <input type="text" name="inscNom" id="inscNom" required>

        </div>

        <div class="prenom">
            <label for="inscPrenom">Prenom</label>
            <input type="text" name="inscPrenom" id="inscPrenom">
        </div>

        <div class="password">
            <label for="inscPassword">Mot de passe</label>
            <input type="password" name="inscPassword" id="inscPassword" required>
        </div>

        <div class="buttons">
            <a href="?controller=auth" class="button">Retour</a>
            <button type="submit" class="button">Créer compte</button>
        </div>
    </form>
</main>