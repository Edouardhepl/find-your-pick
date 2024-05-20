<?php
try {
    $dsn = "mysql:host=$host;port=$port;dbname=$database";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activer les exceptions en cas d'erreur
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Mode de fetch par défaut
        PDO::ATTR_EMULATE_PREPARES => false, // Désactiver l'émulation des requêtes préparées
    ];

    $pdo = new PDO($dsn, $user, $password, $options);
    echo "Connexion réussie.";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Vous êtes maintenant connecté à la base de données !
