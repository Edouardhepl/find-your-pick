<?php
session_start();
require_once(__DIR__ . '/../config/mysql.php');
require_once(__DIR__ . '/../config/connect.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['loggedUser'] = true;
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['id_user'] = $user['id'];
            header('Location: ../index.php');
            exit();
        } else {
            $error = 'Mauvais login/password';
        }
    } else {
        $error = 'Veuillez remplir tous les champs';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Connexion</title>
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
    <div class="login-form">
        <form method="post" action="login.php">
            Email: <input type="email" name="email" placeholder="Email" required><br>
            Mot de passe: <input type="password" name="password" placeholder="Mot de passe" required><br>
            <input type="submit" name="submit" value="Connexion">
        </form>
        <?php
        if (isset($error)) {
            echo '<p style="color: red;">' . htmlspecialchars($error) . '</p>';
        }
        ?>
    </div>
</body>
</html>
