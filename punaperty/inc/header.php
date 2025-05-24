<?php

?>
<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>dboltii - Puna për Kosovë</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">dboltii</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Kreu</a></li>
        <li class="nav-item"><a class="nav-link" href="jobs.php">Punët</a></li>
        <li class="nav-item"><a class="nav-link" href="quiz.php">Take Quiz</a></li>
         <li class="nav-item"><a class="nav-link" href="courses.php">Free Courses</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item"><a class="nav-link" href="post-job.php">Posto Punë</a></li>
          <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Dil</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="login.php">Hyr</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Regjistrohu</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<div class="container my-4">
