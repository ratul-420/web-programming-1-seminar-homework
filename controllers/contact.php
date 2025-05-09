<?php
$dbh = new PDO($config['db']['dsn'], $config['db']['user'], $config['db']['pass'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]); 
 
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;
 
    // Server-side validation
    if (!$name || !$email || !filter_var($email, FILTER_VALIDATE_EMAIL) || !$message) {
        $msg = "Please fill all fields correctly!";
    } else {
        $stmt = $dbh->prepare("INSERT INTO messages (name, email, message, user_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $message, $user_id]);
        header("Location: index.php?menu=messages");
        exit;
    }
}
?>
<div>
<h2>Contact Us</h2>
<?php if ($msg) echo "<p>$msg</p>"; ?>
<form method="post" onsubmit="return validateContactForm();">
<input name="name" id="name" placeholder="Your Name" required>
<input name="email" id="email" placeholder="Your Email" required>
<textarea name="message" id="message" placeholder="Your Message" required></textarea>
<button>Send</button>
</form>
</div>
<script>
function validateContactForm() {
    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let message = document.getElementById('message').value.trim();
    if (!name || !email || !message) {
        alert('All fields are required!');
        return false;
    }
    if (!/^[^@]+@[^@]+\.[^@]+$/.test(email)) {
        alert('Invalid email!');
        return false;
    }
    return true;
}
</script>