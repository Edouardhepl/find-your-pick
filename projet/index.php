page formulaire des préférences :

html : formulaire avec les champs qu'on veut, boutton submit qui redirige vers suggest.php

php : mettre un session start au début, isset pour vérifier que tt les champs sont rempli,
des require once pour le header.php et footer.php.
ensuite require once de register et login et si connecté alors afficher le formulaire
-> en premier on affiche les forms d inscription ou de connexion et si c'est ok on affiche le forms des préférences 


sql : requêtes pour les listes déroulantes (moodle)
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon site</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header><?php require_once(__DIR__ . '/src/partials/header.php'); ?></header>
    <form method="POST" class="form-container">
        <div class="form-group">
            <label for="champions">Champions</label>
            <select name="id_champion" class="form-control">
            </select>
        </div>
        <div class="form-group">
            <label for="playstyle">Style de jeu</label>
            <select name="playstyle" class="form-control">
            </select>
        </div>
        <div class="form-group">
            <label for="type">Type du champion</label>
            <select name="type" class="form-control"> 
            </select>
        </div>
        <div class="form-group">
            <label for="lane">Lane</label>
            <select name="lane" class="form-control">
            </select>
        </div>
        <button type="submit" class="btn-submit">Soumettre</button>
    </form>
    <footer>
        <?php require_once(__DIR__ . '/src/partials/footer.php'); ?>
    </footer>
</body>
</html>