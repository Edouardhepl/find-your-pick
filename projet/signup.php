
FAIRE DU PDO


<?php
$servername = "localhost";
$username = "ton_nom_utilisateur"; // Remplace cela par ton nom d'utilisateur de base de données
$password = "ton_mot_de_passe"; // Remplace cela par ton mot de passe de base de données
$dbname = "ton_nom_de_base_de_donnees"; // Remplace cela par le nom de ta base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasher le mot de passe

// Préparer et lier
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)"); //PAS DE ??? METTRE DES LETTRES
$stmt->bind_param("sss", $username, $email, $password);

// Exécuter
if ($stmt->execute()) {
    echo "Compte créé avec succès";
} else {
    echo "Erreur : " . $stmt->error; //jamais d'echo qd ca parle de db, mettre la fonction header 
}

$stmt->close(); //CIAO ON FAIT PAS CA
$conn->close();
?> //jamais fermer securité
