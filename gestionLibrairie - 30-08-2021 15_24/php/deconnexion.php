<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Déconnexion</title>
</head>

<body>
    <main class="deconnexion">
        <?php
        session_start();
        echo "<h1>Vous allez être déconnecté</h1>";
        $_SESSION = array();
        session_destroy();
        if (file_exists("../index.php")) {
            header("refresh:2;url= ../index.php");
        } else {
            header("refresh:2;url= ../../index.php");
        }
        ?>
    </main>
</body>

</html>