<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-form {
            width: 300px;
            padding: 30px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #aaa;
        }

        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            outline: none;
        }

        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0099cc;
            border: none;
            color: white;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #006699;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <form method="post" action="login.php">
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Mot de passe"><br>
            <input type="submit" name="submit" value="Connexion">
        </form>
    </div>
</body>
</html>
<?php    
    require_once(__DIR__ . '/config/mysql.php');
    require_once(__DIR__ . '/config/connect.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (!empty($email) && !empty($password)) {
        try {
            $sql = 'SELECT * FROM users WHERE email = :email';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                header('Location: index.php');
                exit;
            } else {
                echo "Email ou mot de passe incorrect";
            }
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
?>
