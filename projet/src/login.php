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
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        // Connexion à la base de données
        $conn = new mysqli('localhost', 'username', 'password', 'database');

        if ($conn->connect_error) {
            die("Erreur de connexion: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header('Location: index.php');
        } else {
            echo "Email ou mot de passe incorrect";
        }

        $conn->close();
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
?>