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
        // Connexion à la base de données
        $conn = new mysqli('localhost', 'fo79yd84ifno', 'd4nc2p|2pd', 'rnopounykp30');

        if ($conn->connect_error) {
            die("Erreur de connexion: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            header('Location: login.php');
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
?>