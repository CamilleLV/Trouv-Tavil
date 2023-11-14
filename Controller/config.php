<?php
$host = 'localhost';
$username = 'p2105353';
$password = '618165';
$database = 'p2105353';

// Connexion à la base de données
try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Activer les erreurs PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
