<!DOCTYPE html>
<html>
<head>
    <title>Page de Contact</title>
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

        .contact-form {
            width: 300px;
            padding: 30px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #aaa;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            outline: none;
        }

        .contact-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0099cc;
            border: none;
            color: white;
            cursor: pointer;
        }

        .contact-form input[type="submit"]:hover {
            background-color: #006699;
        }
    </style>
</head>
<body>
    <?php require_once(__DIR__ . '/src/partials/header.php'); ?>
    <div class="contact-form">
        <form method="post" action="contact.php">
            Nom: <input type="text" name="name" placeholder="Votre nom"><br>
            Email: <input type="email" name="email" placeholder="Votre email"><br>
            Message: <textarea name="message" placeholder="Votre message"></textarea><br>
            <input type="submit" name="submit" value="Envoyer">
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if (!empty($name) && !empty($email) && !empty($message)) {
            // Ici, vous pouvez ajouter le code pour envoyer le message
            // par exemple, enregistrer le message dans une base de données
            // ou l'envoyer par email
        } else {
            echo "Veuillez remplir tous les champs";
        }
    }
    ?>

    <?php require_once 'src/partials/footer.php'; ?>
</body>
</html>
