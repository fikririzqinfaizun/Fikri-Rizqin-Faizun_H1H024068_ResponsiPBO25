<?php
session_start();
require_once 'Paras.php';

if (!isset($_SESSION['paras'])) {
    $_SESSION['paras'] = serialize(new Paras());
}
$paras = unserialize($_SESSION['paras']);

if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}

$message = null;
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trainingType = $_POST['trainingType'] ?? 'General';
    $intensity = (int)($_POST['intensity'] ?? 10);
    if ($intensity < 1) $intensity = 1;

    $result = $paras->train($trainingType, $intensity);

    $_SESSION['paras'] = serialize($paras);
    $_SESSION['history'][] = $result;

    $message = "Latihan selesai: {$result['description']}";
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Latihan - Paras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h2>Latihan untuk <?= htmlspecialchars($paras->getName()) ?></h2>

        <?php if ($message): ?>
            <div class="alert"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <form method="post" action="train.php">
            <label>Jenis latihan:
                <select name="trainingType">
                    <option value="Attack">Attack</option>
                    <option value="Defense">Defense</option>
                    <option value="Speed">Speed</option>
                    <option value="Stamina">Stamina</option>
                    <option value="General">General</option>
                </select>
            </label>

            <label>Intensitas (angka):
                <input type="number" name="intensity" value="10" min="1" max="1000">
            </label>

            <div class="buttons">
                <button type="submit" class="btn">Latih</button>
                <a class="btn" href="index.php">Kembali ke Beranda</a>
                <a class="btn" href="history.php">Riwayat Latihan</a>
            </div>
        </form>

        <?php if ($result): ?>
            <hr>
            <h3>Hasil Sesi</h3>
            <p><strong>Jenis:</strong> <?= htmlspecialchars($result['type']) ?></p>
            <p><strong>Intensitas:</strong> <?= htmlspecialchars($result['intensity']) ?></p>
            <p><strong>Level:</strong> <?= $result['level_before'] ?> → <?= $result['level_after'] ?></p>
            <p><strong>HP:</strong> <?= $result['hp_before'] ?> → <?= $result['hp_after'] ?></p>
            <p><strong>Waktu:</strong> <?= $result['time'] ?></p>
            <p><strong>Deskripsi jurus spesial:</strong> <?= htmlspecialchars($result['special_move_desc'] ?? '') ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
