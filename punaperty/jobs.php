<?php
session_start();
include('inc/db.php');
include('inc/header.php');

$trending_jobs = [
    ['title' => 'Inxhinier i Inteligjencës Artificiale', 'description' => 'Zhvillon dhe implementon sisteme AI për automatizim dhe analitikë.'],
    ['title' => 'Analist i Sigurisë Kibernetike', 'description' => 'Mbron sistemet dhe të dhënat nga kërcënimet kibernetike.'],
    ['title' => 'Konsulent i Energjisë së Rinovueshme', 'description' => 'Konsulton për implementimin e burimeve të energjisë së pastër.'],
    ['title' => 'Krijues i Përmbajtjes Digjitale', 'description' => 'Krijon përmbajtje për platformat digjitale dhe mediat sociale.'],
    ['title' => 'Specialist i Shërbimeve Shëndetësore Virtuale', 'description' => 'Ofron konsulta mjekësore përmes platformave online.']
];

$sql = "SELECT title, location, created_at FROM jobs ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);
?>

<div class="container mt-5" style="max-width: 900px;">

  <div class="mb-5">
    <h2 class="mb-4 text-center">🚀 Punët më të kërkuara për 2025</h2>
    <div class="row g-4">
      <?php foreach ($trending_jobs as $job): ?>
        <div class="col-md-6">
          <div class="card shadow-sm rounded-4 h-100">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?php echo htmlspecialchars($job['title']); ?></h5>
              <p class="card-text text-muted flex-grow-1"><?php echo htmlspecialchars($job['description']); ?></p>

              <?php if (isset($_SESSION['user_id'])): ?>
                <a href="apply.php?title=<?php echo urlencode($job['title']); ?>" class="btn btn-success rounded-pill mt-3 align-self-start">Apliko</a>
              <?php else: ?>
                <a href="login.php" class="btn btn-outline-secondary rounded-pill mt-3 align-self-start">Kyçu për të aplikuar</a>
              <?php endif; ?>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div>
    <h2 class="mb-4 text-center">🧑‍💼 Punët e postuara nga përdoruesit</h2>
    <?php if ($result->num_rows > 0): ?>
      <div class="list-group shadow rounded-4">
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="list-group-item p-3 d-flex justify-content-between align-items-center">
            <div>
              <h5 class="mb-1"><?php echo htmlspecialchars($row['title']); ?></h5>
              <p class="mb-1 text-muted"><?php echo htmlspecialchars($row['location']); ?></p>
              <small class="text-secondary">Postuar më <?php echo date('d.m.Y', strtotime($row['created_at'])); ?></small>
            </div>

            <?php if (isset($_SESSION['user_id'])): ?>
              <a href="apply.php?title=<?php echo urlencode($row['title']); ?>" class="btn btn-success rounded-pill">Apliko</a>
            <?php else: ?>
              <a href="login.php" class="btn btn-outline-secondary rounded-pill">Kyçu për të aplikuar</a>
            <?php endif; ?>

          </div>
        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-warning">Nuk ka punë të postuara ende.</div>
    <?php endif; ?>
  </div>

</div>

<?php include('inc/footer.php'); ?>
