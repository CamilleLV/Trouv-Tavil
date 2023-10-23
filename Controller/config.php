<?php
$host = 'localhost';
$username = 'votre_utilisateur';
$password = 'votre_mot_de_passe';
$database = 'votre_base_de_donnees';

// Connexion à la base de données
try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Activer les erreurs PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
