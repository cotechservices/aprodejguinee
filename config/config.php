
<?php
$host = "localhost";   // Hôte (souvent localhost)
$dbname = "aprodej";   // Nom de la base de données
$username = "root";    // Ton utilisateur MySQL
$password = "";        // Ton mot de passe (vide sous XAMPP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
