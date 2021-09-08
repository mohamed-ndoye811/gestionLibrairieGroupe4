<?php
// Récupération des identifiants
$loginNom = strtoupper(trim($_POST['loginNom']));
$loginPrenom = ucfirst(strtolower(trim($_POST['loginPrenom'])));
$loginPassword = $_POST['loginPassword'];

// Connexion à la DB
try{
    include_once('../connexiondb.php');
    // Requête pour l'ajout d'un utilisateur
    $createUserRequest = $db->prepare("INSERT INTO 
    `user`(`Nom`, `Prenom`, `MdP`, `Admin`) 
    VALUES(?,?,?,'utilisateur');" );
    $createUserRequest->bindValue(1,$loginNom);
    $createUserRequest->bindValue(2,$loginPrenom);
    $createUserRequest->bindValue(3,MD5($loginPassword));

    // Lancement de la requête 
    try{
    $createUserRequest->execute();
    }
    catch(PDOException $e){
        die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
    }

        header("Location: ../../index.php");
    }
    catch(PDOException $e){
        die('<p>Echec de connexion. Erreur ['.$e->getCode().']: '.$e->getMessage().'</p>');
    }