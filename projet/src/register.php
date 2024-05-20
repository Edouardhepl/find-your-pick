<!DOCTYPE html>
<html>
<head>
    <title>Page d'inscription</title>
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

        .register-form {
            width: 300px;
            padding: 30px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #aaa;
        }

        .register-form input[type="text"],
        .register-form input[type="email"],
        .register-form input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            outline: none;
        }

        .register-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0099cc;
            border: none;
            color: white;
            cursor: pointer;
        }

        .register-form input[type="submit"]:hover {
            background-color: #006699;
        }
    </style>
</head>
<body>
    <div class="register-form">
        <form method="post" action="register.php">
            Pseudo: <input type="text" name="username" placeholder="Pseudo"><br>
            Email: <input type="email" name="email" placeholder="Email"><br>
            Mot de passe: <input type="password" name="password" placeholder="Mot de passe"><br>
            <input type="submit" name="submit" value="Inscription">
        </form>
        <a href="login.php">Déjà inscrit ? Connectez-vous ici.</a>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
         require_once(__DIR__ . '/config/mysql.php');
             require_once(__DIR__ . '/config/connect.php'); 
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
        header('Location: login.php');
        exit();
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
?>
