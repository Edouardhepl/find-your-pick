<?php
session_start();
require_once(__DIR__ . '/src/config/mysql.php');
require_once(__DIR__ . '/src/config/connect.php');
?>
<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8" />
        <title>Mon site</title>
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="scripts/script.js"></script>
    </head>
</head>

<body>
    <header><?php require_once(__DIR__ . '/src/partials/header.php'); ?></header>

    <div class="login-page">
        <div class="form">
            <?php
            require_once(__DIR__ . '/src/register.php');
            require_once(__DIR__ . '/src/login.php');
            ?>
        </div>
    </div>

    <?php if (isset($_SESSION['loggedUser'])) : ?>

        <form method="POST" class="form-container" action="">
            <div class="form-group">
                <label for="champions">Champions</label>
                <select name="id_champion" class="form-control">
                    <!-- Options for champions -->
                </select>
            </div>
            <div class="form-group">
                <label for="playstyle">Style de jeu</label>
                <select name="playstyle" class="form-control">
                    <!-- Options for playstyle -->
                </select>
            </div>
            <div class="form-group">
                <label for="type">Type du champion</label>
                <select name="type" class="form-control">
                    <!-- Options for type -->
                </select>
            </div>
            <div class="form-group">
                <label for="lane">Lane</label>
                <select name="lane" class="form-control">
                    <!-- Options for lane -->
                </select>
            </div>
            <button type="submit" class="btn-submit">Soumettre</button>
        </form>
    <?php endif; ?>

    <footer>
        <?php require_once(__DIR__ . '/src/partials/footer.php'); ?>
    </footer>
</body>

</html>