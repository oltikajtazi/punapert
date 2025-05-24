<?php include('inc/header.php'); ?>

<div class="container mt-5" style="max-width: 600px;">
  <h2 class="mb-4 text-center">📄 Apliko për Pozitën</h2>

  <?php
  $jobTitle = isset($_GET['title']) ? htmlspecialchars($_GET['title']) : 'Pozitë';
  ?>

  <div class="card shadow-sm rounded-4 p-4">
    <h4 class="mb-3">Pozita: <span class="text-primary"><?php echo $jobTitle; ?></span></h4>

    <form action="submit_application.php" method="POST">
      <input type="hidden" name="job_title" value="<?php echo $jobTitle; ?>">

      <div class="mb-3">
        <label class="form-label">Emri i Plotë</label>
        <input type="text" class="form-control" name="fullname" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Numri i Telefonit</label>
        <input type="text" class="form-control" name="phone" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Mesazh</label>
        <textarea class="form-control" name="message" rows="4" placeholder="Shkruani një mesazh ose letër motivimi..." required></textarea>
      </div>

      <button type="submit" class="btn btn-primary rounded-pill">Dërgo Aplikimin</button>
    </form>
  </div>
</div>

<?php include('inc/footer.php'); ?>
