<?php
include('inc/db.php');
session_start();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email' LIMIT 1");
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: dashboard.php');
            exit;
        } else {
            $message = "Fjalëkalimi është gabim.";
        }
    } else {
        $message = "Email-i nuk ekziston.";
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8" />
<title>Hyr | PunaPërTy</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
  <h2>Hyr</h2>
  <?php if ($message) echo "<p class='error'>$message</p>"; ?>
  <form method="post" action="">
    <label>Email</label><br />
    <input type="email" name="email" required /><br />
    <label>Fjalëkalimi</label><br />
    <input type="password" name="password" required /><br /><br />
    <button type="submit">Hyr</button>
  </form>
  <p>Nuk ke llogari? <a href="register.php">Regjistrohu</a></p>
</div>
</body>
</html>
