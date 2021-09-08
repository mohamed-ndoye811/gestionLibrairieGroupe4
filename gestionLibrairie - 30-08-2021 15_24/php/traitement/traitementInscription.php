<?php
// Récupération des identifiants
$loginNom = strtoupper(trim($_POST['loginNom']));
$loginPrenom = ucfirst(strtolower(trim($_POST['loginPrenom'])));
$loginPassword = $_POST['loginPassword'];

// Connexion à la DB
$DB = mysqli_connect('localhost', 'root', '', 'gestion_librairie');

if (!$DB) {
    echo "<script type='text/javascript'>alert('Connexion impossible à la base de données');</script>";
} else {
    // Requête pour l'ajout d'un utilisateur
    $createUserRequest =
        sprintf(
            "INSERT INTO 
    `user`(`idUser`, `Nom`, `Prenom`, `MdP`, `Admin`) 
    VALUES 
    ('','%s','%s',MD5('%s'),'');",
            $loginNom,
            $loginPrenom,
            $loginPassword
        );

    // Lancement de la requête 
    $createUserRequestResult = mysqli_query($DB, $createUserRequest);

    mysqli_close($DB);

    // Alert si erreur
    if (!$createUserRequest) {
        echo "<script> alert('ERREUR - Inscription échouée'); <script>";
    } else {


        header("Location: ../../index.php");
        exit;
    }
}