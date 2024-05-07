<?php
echo '
<!DOCTYPE html>
<html>
<head>
    <style>
        .header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        .header a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }

        .header a:hover {
            color: #ddd;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="index.php">Accueil</a>
        
        <a href="stat.php">Statistiques</a>
        <a href="suggest.php">Suggestions</a>
        <a href="contact.php">Contact</a>
    </div>
</body>
</html>';
?>