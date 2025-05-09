
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Exchange</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>Currency Exchange</h1>
    <?php if (isset($_SESSION['user'])): ?>
        <div>
            Logged-in: <?= htmlspecialchars($_SESSION['user']['family_name']) ?>
            <?= htmlspecialchars($_SESSION['user']['surname']) ?>
            (<?= htmlspecialchars($_SESSION['user']['login_name']) ?>)
        </div>
    <?php endif; ?>
</header>