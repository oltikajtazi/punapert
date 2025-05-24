<?php
include('inc/db.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        $message = "Ky email tashmë është përdorur.";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql)) {
            header('Location: login.php');
            exit;
        } else {
            $message = "Gabim gjatë regjistrimit.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8" />
<title>Regjistrohu | PunaPërTy</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
  <h2>Regjistrohu</h2>
  <?php if ($message) echo "<p class='error'>$message</p>"; ?>
  <form method="post" action="">
    <label>Emri i përdoruesit</label><br />
    <input type="text" name="username" required /><br />
    <label>Email</label><br />
    <input type="email" name="email" required /><br />
    <label>Fjalëkalimi</label><br />
    <input type="password" name="password" required /><br /><br />
    <button type="submit">Regjistrohu</button>
  </form>
  <p>Ke llogari? <a href="login.php">Hyr këtu</a></p>
</div>
</body>
</html>
