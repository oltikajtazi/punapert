<?php include('inc/header.php'); ?>

<div class="container mt-5" style="max-width: 600px;">
  <div class="card shadow p-4 rounded-4">
    <h2 class="text-center mb-4">Job Fit Quiz</h2>

    <form method="POST" action="process-quiz.php" novalidate>
      <div class="mb-3">
        <label for="skill" class="form-label">Cila është aftësia juaj kryesore?</label>
        <select class="form-select" id="skill" name="skill" required>
          <option value="php">PHP</option>
          <option value="design">Dizajn</option>
          <option value="marketing">Marketing</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="experience" class="form-label">Sa vite përvojë keni?</label>
        <input type="number" class="form-control" id="experience" name="experience" min="0" required>
      </div>

      <div class="mb-4">
        <label class="form-label">Lloji i preferuar i punës:</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type" id="remote" value="remote" checked>
          <label class="form-check-label" for="remote">
            Remote
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type" id="on-site" value="on-site">
          <label class="form-check-label" for="on-site">
            Në zyrë
          </label>
        </div>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary rounded-pill">Gjej Punën Time</button>
      </div>
    </form>
  </div>
</div>

<?php include('inc/footer.php'); ?>
