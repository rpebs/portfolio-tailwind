<?php
$host = '185.237.145.72';
$dbname = 'u1488987_port';
$username = 'u1488987';
$password = 'masmunir001';

// Buat koneksi
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Koneksi gagal: ' . $e->getMessage();
}
