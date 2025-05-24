<?php
include('inc/db.php');
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8" />
<title>Punët e Disponueshme | PunaPërTy</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="container">
  <h2>Punët e Disponueshme</h2>

  <?php
  $result = $conn->query("SELECT jobs.*, users.username FROM jobs JOIN users ON jobs.user_id = users.id ORDER BY jobs.created_at DESC");
  if ($result->num_rows > 0) {
      while ($job = $result->fetch_assoc()) {
          echo "<div class='job-post'>";
          echo "<h3>" . htmlspecialchars($job['title']) . "</h3>";
          echo "<p><strong>Postuar nga:</strong> " . htmlspecialchars($job['username']) . "</p>";
          echo "<p><strong>Vendndodhja:</strong> " . htmlspecialchars($job['location']) . "</p>";
          echo "<p>" . nl2br(htmlspecialchars($job['description'])) . "</p>";
          echo "<hr>";
          echo "</div>";
      }
  } else {
      echo "<p>Ende nuk ka punë të postuara.</p>";
  }
  ?>

  <p><a href="index.php">Kthehu te Faqja Kryesore</a></p>
</div>
</body>
</html>
  