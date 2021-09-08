<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionLibrairie</title>
    <link rel="stylesheet" type="text/css" href="Content/css/style.css">
    <script src="./Content/js/functions.js" defer></script>
</head>

<body>
    <?php

    session_start();
    require_once("Models/Model.php");
    require_once("Controllers/Controller.php");
    include("./Utils/Header.php");


    $controllers = ["home", "livres", "fournisseurs", "commandes", "auth"];
    $controller_default = "home";


    if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
        $nom_controller = empty($_SESSION['auth']) ? "auth" :  $_GET['controller'];
    } else {
        $nom_controller = $controller_default;
    }

    $nom_classe = 'Controller_' . $nom_controller;

    $nom_fichier = "Controllers/" . $nom_classe . ".php";

    if (file_exists($nom_fichier)) {
        require_once($nom_fichier);
        $controller = new $nom_classe();
    } else {

        exit("page not found !");
    }

    // Include du footer
    include("./Utils/Footer.php"); ?>
</body>

</html>