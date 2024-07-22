<?php
include 'config/db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // Mengambil nama gambar dari database
    $query = 'SELECT image FROM portfolio WHERE id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($project) {
        // Menghapus file gambar
        $image_path = 'uploads/' . $project['image'];
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Menghapus data dari database
        $query = 'DELETE FROM portfolio WHERE id = :id';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

header('Location: index.php');
