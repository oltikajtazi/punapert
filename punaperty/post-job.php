<?php
include('inc/db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $location = trim($_POST['location']);
    $user_id = $_SESSION['user_id'];

    if (!$title || !$description || !$location) {
        $message = "Ju lutem plotësoni të gjitha fushat.";
    } else {
        $stmt = $conn->prepare("INSERT INTO jobs (user_id, title, description, location) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("isss", $user_id, $title, $description, $location);
            if ($stmt->execute()) {
                $message = "✅ Puna u postua me sukses!";
            } else {
                $message = "❌ Gabim gjatë postimit të punës.";
            }
            $stmt->close();
        } else {
            $message = "❌ Gabim në përgatitjen e kërkesës: " . $conn->error;
        }
    }
}
?>

<?php include('inc/header.php'); ?>

<div class="container mt-5">
    <h2>Posto një Vend Pune të Ri</h2>

    <?php if ($message): ?>
        <div class="alert alert-<?php echo strpos($message, '✅') !== false ? 'success' : 'danger'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="post-job.php" class="mt-4">
        <div class="mb-3">
            <label for="title" class="form-label">Titulli i Punës</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokacioni</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Përshkrimi</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Posto Punën</button>
    </form>
</div>

<?php include('inc/footer.php'); ?>
