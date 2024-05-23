<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
        require_once(__DIR__ . '/../config/mysql.php');
        require_once(__DIR__ . '/../config/connect.php');
        // Hachage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Requête d'insertion sécurisée avec requêtes préparées
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashed_password,
        ]);

        // Redirection après succès de l'inscription
        header('Location: ../login.php');
        exit();
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
?>

<div class="register-form">
    <form method="post" action="register.php">
        Pseudo: <input type="text" name="username" placeholder="Pseudo"><br>
        Email: <input type="email" name="email" placeholder="Email"><br>
        Mot de passe: <input type="password" name="password" placeholder="Mot de passe"><br>
        <input type="submit" name="submit" value="Inscription">
    </form>
    <a href="login.php">Déjà inscrit ? Connectez-vous ici.</a>
</div>
