<?php
$servername = "localhost";
$username = "ton_nom_utilisateur";
$password = "ton_mot_de_passe";
$dbname = "ton_nom_de_base_de_donnees";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

// Préparer et lier
$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
        echo "Connexion réussie";
        // Redirection ou gestion de session ici
    } else {
        echo "Mot de passe incorrect";
    }
} else {
    echo "Aucun utilisateur trouvé avec cet email";
}

$stmt->close();
$conn->close();
?>
