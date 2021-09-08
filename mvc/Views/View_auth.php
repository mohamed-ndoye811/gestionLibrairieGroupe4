<main class="authPage">
    <h1>Connexion</h1>
    <form action="?controller=auth&action=auth" method="POST">
        <div class="nom">
            <label for="loginNom">Nom</label>
            <input type="text" name="loginNom" id="loginNom" placeholder="Doe" required>
        </div>

        <div class="prenom">
            <label for="loginPrenom">Prenom</label>
            <input type="text" name="loginPrenom" id="loginPrenom" placeholder="John">
        </div>

        <div class="password">
            <label for="loginPassword">Mot de passe</label>
            <input type="password" name="loginPassword" id="loginPassword" required>
        </div>

        <div class="buttons">
            <a href="?controller=auth&action=inscription" class="innerButtonLink button">S'enregistrer</a>
            <button type="submit" class="button">Se connecter</button>
        </div>

    </form>
</main>