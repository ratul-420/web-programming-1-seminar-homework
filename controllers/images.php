<?php
$dbh = new PDO($config['db']['dsn'], $config['db']['user'], $config['db']['pass'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

if (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $target = "uploads/" . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $stmt = $dbh->prepare("INSERT INTO images (filename, user_id) VALUES (?, ?)");
        $stmt->execute([basename($_FILES['image']['name']), $_SESSION['user']['id']]);
        $msg = "Image uploaded!";
    } else {
        $msg = "Upload failed!";
    }
}

$images = $dbh->query("SELECT * FROM images ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<div>
    <h2>Image Gallery</h2>
    <?php if (isset($_SESSION['user'])): ?>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="image" required>
            <button>Upload</button>
        </form>
    <?php else: ?>
        <p>Login to upload images.</p>
    <?php endif; ?>
    <?php if (!empty($msg)) echo "<p>$msg</p>"; ?>
    <div class="gallery">
        <?php foreach ($images as $img): ?>
            <img src="uploads/<?= htmlspecialchars($img['filename']) ?>" width="150">
        <?php endforeach; ?>
    </div>
</div>