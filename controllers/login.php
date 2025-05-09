<?php
$dbh = new PDO($config['db']['dsn'], $config['db']['user'], $config['db']['pass'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $family = $_POST['family_name'];
        $surname = $_POST['surname'];
        $login = $_POST['login_name'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $dbh->prepare("INSERT INTO users (family_name, surname, login_name, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$family, $surname, $login, $pass]);
        $msg = "Registration successful! Please log in.";
    } elseif (isset($_POST['login'])) {
        $login = $_POST['login_name'];
        $stmt = $dbh->prepare("SELECT * FROM users WHERE login_name = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
            exit;
        } else {
            $msg = "Invalid login!";
        }
    }
}
?>
<div>
    <h2>Login</h2>
    <?php if (!empty($msg)) echo "<p>$msg</p>"; ?>
    <form method="post">
        <input name="login_name" placeholder="Login Name" required>
        <input name="password" type="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>
    <h2>Register</h2>
    <form method="post">
        <input name="family_name" placeholder="Family Name" required>
        <input name="surname" placeholder="Surname" required>
        <input name="login_name" placeholder="Login Name" required>
        <input name="password" type="password" placeholder="Password" required>
        <button name="register">Register</button>
    </form>
</div>