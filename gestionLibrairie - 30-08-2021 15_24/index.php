<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta description="blablabla" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>Gestion Librairie</title>
</head>

<body>
    <main class="authPage">
        <h1>Connexion</h1>
        <form action="./php/traitement/traitementIndex.php" method="POST">
            <div>
                <label for="loginNom">Nom</label>
                <input type="text" name="loginNom" id="loginNom" placeholder="Doe" required>
            </div>

            <div>
                <label for="loginPrenom">Prenom</label>
                <input type="text" name="loginPrenom" id="loginPrenom" placeholder="John">
            </div>

            <div class="password">
                <label for="loginPassword">Mot de passe</label>
                <input type="password" name="loginPassword" id="loginPassword" required>
            </div>

            <div class="buttons">
                <a href="./php/inscription.php" class="button">S'enregistrer</a>
                <button type="submit" class="button">Se connecter</button>
            </div>
        </form>
    </main>
</body>

</html>