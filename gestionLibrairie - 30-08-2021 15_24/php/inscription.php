<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta description="blablabla" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Mohamed HTML Boilerplate</title>
</head>

<body>
    <main>
    <h1>Inscription</h1>
        <form action="./traitement/traitementInscription.php" method="POST">
            <div>
            <label for="loginNom">Nom</label>
            <input type="text" name="loginNom" id="loginNom" required>
            </div>

            <div>
            <label for="loginPrenom">Prenom</label>
            <input type="text" name="loginPrenom" id="loginPrenom">
            </div>

            <div>
            <label for="loginPassword">Mot de passe</label>
            <input type="password" name="loginPassword" id="loginPassword" required>
            </div>

            <div class="buttons">
                <button type="submit">Créer compte</button>
            </div>
        </form>
    </main>
</body>

</html>