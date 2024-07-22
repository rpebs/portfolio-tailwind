<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    
    // Proses upload gambar
    if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = basename($_FILES['image']['name']);
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . $image;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) {
            $query = 'INSERT INTO portfolio (title, url, image, description) VALUES (:title, :url, :image, :description)';
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':description', $description);
            $stmt->execute();

            header('Location: index.php');
        } else {
            echo 'Gagal mengupload gambar.';
        }
    } else {
        echo 'Gagal mengupload gambar.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Proyek</title>
</head>
<body>
    <h1>Tambah Proyek</h1>
    <form method="post" enctype="multipart/form-data" action="">
        <label for="title">Judul:</label>
        <input type="text" name="title" id="title" required><br>
        <label for="url">URL:</label>
        <input type="text" name="url" id="url" required><br>
        <label for="image">Gambar:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br>
        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description" required></textarea><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
