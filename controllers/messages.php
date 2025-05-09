<?php
if (!isset($_SESSION['user'])) {
    header("Location: index.php?menu=login");
    exit;
}
$dbh = new PDO($config['db']['dsn'], $config['db']['user'], $config['db']['pass'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$messages = $dbh->query("SELECT * FROM messages ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?> 
<div>
<h2>Messages</h2>
<table border="1">
<tr>
<th>Time</th>
<th>Name</th>
<th>Email</th>
<th>Message</th>
</tr>
<?php foreach ($messages as $msg): ?>
<tr>
<td><?= htmlspecialchars($msg['created_at']) ?></td>
<td><?= $msg['user_id'] ? htmlspecialchars($msg['name']) : 'Guest' ?></td>
<td><?= htmlspecialchars($msg['email']) ?></td>
<td><?= htmlspecialchars($msg['message']) ?></td>
</tr>
<?php endforeach; ?>
</table>
</div>