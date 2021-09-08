<?php
 // Connexion à la base de données sous forme d'objet
 $db = new PDO("mysql:host=localhost;dbname=gestion_librairie","root","");
 // Précision de l'encodage
 $db->query("SET NAMES 'utf8'");
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>