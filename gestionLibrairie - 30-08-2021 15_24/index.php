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
    <main id="loginPage">
        <h1>Connexion</h1>
        <form action="./php/traitement/traitementIndex.php" method="POST">
            <label for="loginNom">Nom</label>
            <input type="text" name="loginNom" id="loginNom" placeholder="Doe" required>

            <label for="loginPrenom">Prenom</label>
            <input type="text" name="loginPrenom" id="loginPrenom" placeholder="John">

            <label for="loginPassword">Mot de passe</label>
            <input type="password" name="loginPassword" id="loginPassword" required>

            <div class="buttons">
                <button><a href="./php/inscription.php" class="innerButtonLink">S'enregistrer</a></button>
                <button type="submit" class="button">Se connecter</button>
            </div>
        </form>
    </main>
</body>

</html>