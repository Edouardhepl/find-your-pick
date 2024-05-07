<?php
$conn = new mysqli($host, $user, $password, $database, $port);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
// Vous êtes maintenant connecté à la base de données !
