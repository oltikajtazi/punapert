<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8" />
<title>Dashboard | PunaPërTy</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
  <h2>Miresevini, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
  <p>Këtu do të mund të menaxhoni punët dhe profilin tuaj.</p>
  <a href="logout.php">Dil</a>
</div>
</body>
</html>
