<?php
include('inc/db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, title, location, created_at FROM jobs WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<?php include('inc/header.php'); ?>

<h2>Dashboard - Punët e tua</h2>

<a href="post-job.php" class="btn btn-success mb-3">Posto Punë të Re</a>

<?php if ($result->num_rows > 0): ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Titulli</th>
      <th>Lokacioni</th>
      <th>Data e Postimit</th>
      <th>Veprime</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['title']); ?></td>
      <td><?php echo htmlspecialchars($row['location']); ?></td>
      <td><?php echo date('d.m.Y H:i', strtotime($row['created_at'])); ?></td>
      <td>
        <!-- Mund të shtosh edit/delete këtu në të ardhmen -->
        <a href="jobs.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Shiko</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<?php else: ?>
<p>Nuk ke postuar asnjë punë ende.</p>
<?php endif; ?>

<?php include('inc/footer.php'); ?>
