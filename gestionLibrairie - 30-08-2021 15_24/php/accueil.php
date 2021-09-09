<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta description="blablabla" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="../js/functions.js" defer></script>
    <title>Gestion Librairie - Accueil</title>
</head>

<body>
    <?php
    require_once("./header.php");
    ?>

    <main id="accueil">
        <?php
        echo sprintf(
            "<h1>Bienvenue %s %s</h1>",
            $_SESSION['Prenom'],
            $_SESSION['Nom']
        );
        ?>

        <nav class="homeNav">
            <li><a href="./consultation/consultationLivres.php" class="button">Livres</a></li>
            <li><a href="./consultation/consultationFournisseurs.php" class="button">Fournisseurs</a></li>
            <li><a href="./consultation/consultationCommander.php" class="button">Commandes</a></li>
        </nav>
    </main>

    <?php
    require_once("./footer.php");
    ?>
</body>

</html>