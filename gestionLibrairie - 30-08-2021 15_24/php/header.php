<?php
session_start();
?>
<header>
    <div class='flex'>
        <?php
        if ((isset($_SESSION['Prenom'])) && (isset($_SESSION['Nom']))) {
            echo '<p>Bienvenue ' . $_SESSION['Prenom'] . ' ' . $_SESSION['Nom'] . '</p>';

            $deconnexion = file_exists("./deconnexion.php") ?
                "./deconnexion.php" :
                "../deconnexion.php";

            $consultation = file_exists("./consultation/") ?
                "./consultation/" :
                "../consultation/";
        } else {
            // Si le fichier est dans un dossier enfant direct
            if (file_exists("../index.php")) {
                header("Location: ../index.php");
            } else {
                header("Location: ../../index.php");
            }
        }
        ?>
        <a href='<?= $deconnexion ?>'>
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                width="24px" fill="#FFFFFF">
                <g>
                    <path d="M0,0h24v24H0V0z" fill="none" />
                </g>
                <g>
                    <path
                        d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z" />
                </g>
            </svg>
        </a>
    </div>
    <div id='burgerButton'>
        <svg id='burger' xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
            <path d="M0 0h24v24H0V0z" fill="none"/>
            <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
        </svg>
        <svg id='cross' xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
            <path d="M0 0h24v24H0V0z" fill="none"/>
            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
        </svg>
    </div>
    <nav>
        <li><a href="<?= $consultation ?>consultationLivres.php">Livres</a></li>
        <li><a href="<?= $consultation ?>consultationFournisseurs.php">Fournisseurs</a></li>
        <li><a href="<?= $consultation ?>consultationCommander.php">Commandes</a></li>
    </nav>
</header>