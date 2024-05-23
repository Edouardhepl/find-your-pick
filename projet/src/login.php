<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/config/connect.php');

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
        }        
            header('Location: index.php');
            exit();
        } else {
            $error = 'Mauvais login/password';
        }
    } else {
        $error = 'Veuillez remplir tous les champs';
    }
?>
<body>
    <h1>Connexion</h1>
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
    <a href="index.php">Si le boutton connexion ne marche pas</a>
</body>
