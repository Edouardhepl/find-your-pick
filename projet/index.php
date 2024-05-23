<?php
if (!empty($_SERVER['HTTPS'])) {
    header("Strict-Transport-Security: max-age=31536000");
}
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);

session_start();
require_once(__DIR__ . '/src/config/mysql.php');
require_once(__DIR__ . '/src/config/connect.php');

// Rediriger vers src/register.php si l'utilisateur n'est pas connecté
if (!isset($_SESSION['loggedUser'])) {
    header('Location: src/register.php');
    exit();
}

// Charger les données des champions, styles de jeu, types et lanes
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

$sql = "INSERT INTO users (id_champion, playstyle, type, lane) VALUES (:id_champion, :playstyle, :type, :lane)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id_champion' => $chapion,
    ':playstyle' => $playstyle,
    ':type' => $type,
    ':lane' => $lane,
]);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon site</title>
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
</head>

<body>
    <?php require_once(__DIR__ . '/src/partials/header.php'); ?>

    <div id="corps">
        <div class="login-page">
            <div class="form">
                <?php require_once(__DIR__ . '/src/register.php'); ?>
                <?php require_once(__DIR__ . '/src/login.php'); ?>
            </div>
        </div>
        <?php if (isset($_SESSION['loggedUser'])) : ?>
            <form method="POST" class="form-container" action="">
                <!-- Formulaire complet avec les champs Champion, Style de jeu, Type du champion et Lane -->
                <div class="form-group">
                    <label for="champion">Champion</label>
                    <select name="champion" id="champion" class="form-control">
                        <?php foreach ($champions as $champion) : ?>
                            <option value="<?php echo htmlspecialchars($champion['id_champion']); ?>">
                                <?php echo htmlspecialchars($champion['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="playstyle">Style de jeu</label>
                    <select name="playstyle" id="playstyle" class="form-control">
                        <?php foreach ($playstyles as $playstyle) : ?>
                            <option value="<?php echo htmlspecialchars($playstyle['playstyle']); ?>">
                                <?php echo htmlspecialchars($playstyle['playstyle']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="type">Type du champion</label>
                    <select name="type" id="type" class="form-control">
                        <?php foreach ($types as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type['type']); ?>">
                                <?php echo htmlspecialchars($type['type']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lane">Lane</label>
                    <select name="lane" id="lane" class="form-control">
                        <?php foreach ($lanes as $lane) : ?>
                            <option value="<?php echo htmlspecialchars($lane['lane']); ?>">
                                <?php echo htmlspecialchars($lane['lane']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <a href="suggest.php">
                    <button type="submit" class="btn-submit">Soumettre</button>
                </a>

            </form>
        <?php endif; ?>
    </div>
    <?php require_once(__DIR__ . '/src/partials/footer.php'); ?>
</body>

</html>