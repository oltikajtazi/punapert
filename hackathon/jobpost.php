<?php
session_start();
include('inc/db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $location = $conn->real_escape_string($_POST['location']);
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO jobs (user_id, title, description, location) VALUES ('$user_id', '$title', '$description', '$location')";
    if ($conn->query($sql)) {
        $message = "Puna u postua me sukses!";
    } else {
        $message = "Gabim gjatë postimit të punës.";
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8" />
<title>Posto Punë | PunaPërTy</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
  <h2>Posto Punë</h2>
  <?php if ($message) echo "<p>$message</p>"; ?>
  <form method="post" action="">
    <label>Titulli i Punës</label><br />
    <input type="text" name="title" required /><br />
    <label>Përshkrimi</label><br />
    <textarea name="description" required></textarea><br />
    <label>Vendndodhja</label><br />
    <input type="text" name="location" required /><br /><br />
    <button type="submit">Posto</button>
  </form>
  <p><a href="dashboard.php">Kthehu te Dashboard</a></p>
</div>
</body>
</html>
