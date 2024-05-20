<?php
session_start();
require_once(__DIR__ . '/src/config/mysql.php');
require_once(__DIR__ . '/src/config/connect.php');

$sql = "SELECT id_champion, name FROM champions ORDER BY name ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$champions = $stmt->fetchAll();

$sql = "SELECT DISTINCT playstyle FROM champions ORDER BY playstyle ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$playstyles = $stmt->fetchAll();

$sql = "SELECT DISTINCT type FROM champions WHERE type IN ('cac', 'distance') ORDER BY type ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$types = $stmt->fetchAll();

$sql = "SELECT DISTINCT lane FROM champions ORDER BY lane ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$lanes = $stmt->fetchAll();
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

            ?>
        </div>
    </div>



    <form method="POST" class="form-container" action="">
        <?php
        // Formulaire complet avec les champs Champion, Style de jeu, Type du champion et Lane

        // Champ Champion
        echo '<form>';
        echo '<div class="form-group">';
        echo '<label for="champion">Champion</label>';
        echo '<select name="champion" id="champion" class="form-control">';
        foreach ($champions as $champion) {
            echo '<option value="' . htmlspecialchars($champion['id_champion']) . '">' . htmlspecialchars($champion['name']) . '</option>';
        }
        echo '</select>';
        echo '</div>';

        // Champ Style de jeu
        echo '<div class="form-group">';
        echo '<label for="playstyle">Style de jeu</label>';
        echo '<select name="playstyle" id="playstyle" class="form-control">';
        foreach ($playstyles as $playstyle) {
            echo '<option value="' . htmlspecialchars($playstyle['id_playstyle']) . '">' . htmlspecialchars($playstyle['name']) . '</option>';
        }
        echo '</select>';
        echo '</div>';

        // Champ Type du champion
        echo '<div class="form-group">';
        echo '<label for="type">Type du champion</label>';
        echo '<select name="type" id="type" class="form-control">';
        foreach ($types as $type) {
            echo '<option value="' . htmlspecialchars($type['id_type']) . '">' . htmlspecialchars($type['name']) . '</option>';
        }
        echo '</select>';
        echo '</div>';

        // Champ Lane
        echo '<div class="form-group">';
        echo '<label for="lane">Lane</label>';
        echo '<select name="lane" id="lane" class="form-control">';
        foreach ($lanes as $lane) {
            echo '<option value="' . htmlspecialchars($lane['id_lane']) . '">' . htmlspecialchars($lane['name']) . '</option>';
        }
        echo '</select>';
        echo '</div>';

        echo '</form>';
        ?>

        <button type="submit" class="btn-submit">Soumettre</button>
    </form>

    <footer>
        <?php require_once(__DIR__ . '/src/partials/footer.php'); ?>
    </footer>
</body>

</html>