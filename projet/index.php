page formulaire des préférences :

html : formulaire avec les champs qu'on veut, boutton submit qui redirige vers suggest

php : mettre un session start au début, isset pour vérifier que tt les champs sont rempli,
des require once pour le header et footer.
ensuite require once de register et login et si connecté alors afficher le formulaire
-> en premier on affiche les forms d inscription ou de connexion et si c'est ok on affiche le forms des préférences 


sql : requêtes pour les listes déroulantes (moodle)
<?php
require_once(__DIR__ . '/src/config/connect.php');
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>Mon site</title>
            <link href="css/style.css" rel="stylesheet" />
        </head>
        <body>
            <?php require_once(__DIR__ . '/src/partials/header.php'); ?>

            <form method="POST">
                <div>
                    <label for="champions">Champions</label>
                    <select name="id_champion">
                        <?php $query = $pdo->query("SELECT name FROM DISTINCT champion ORDER BY name ASC"); ?>
                        <option value="<?php echo $row['idattributevalue']; ?>"><?php echo $row['attributevalueEN']; ?></option>

                    </select>
                </div>
                <div>
                    <label for="playstyle">Style de jeu</label>
                    <select name="playstyle">
                    <?php $query = $pdo->query("SELECT playstyle FROM DISTINCT champion ORDER BY playstyle ASC "); ?> 
                    </select>
                </div>
                <div>
                    <label for="type">Type du champion</label>
                    <select name="type">
                        // requête sql 
                    </select>
                </div>
                <div>
                    <label for="lane">Lane</label>
                    <select name="lane">
                        // requête sql 
                    </select>
                </div>
                <button type="submit">Soumettre</button>
            </form>
        </body>
    </html>