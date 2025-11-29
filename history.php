<?php
session_start();
require_once 'Paras.php';

if (!isset($_SESSION['paras'])) {
    $_SESSION['paras'] = serialize(new Paras());
}
$paras = unserialize($_SESSION['paras']);

$history = $_SESSION['history'] ?? [];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Riwayat Latihan - Paras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h2>Riwayat Latihan <?= htmlspecialchars($paras->getName()) ?></h2>

        <?php if (count($history) === 0): ?>
            <p>Tidak ada sesi latihan. Silakan mulai latihan di halaman <a href="train.php">Latihan</a>.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis</th>
                        <th>Intensitas</th>
                        <th>Level (sebelum → sesudah)</th>
                        <th>HP (sebelum → sesudah)</th>
                        <th>Waktu</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_reverse($history) as $i => $h): ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= htmlspecialchars($h['type']) ?></td>
                            <td><?= htmlspecialchars($h['intensity']) ?></td>
                            <td><?= $h['level_before'] ?> → <?= $h['level_after'] ?></td>
                            <td><?= $h['hp_before'] ?> → <?= $h['hp_after'] ?></td>
                            <td><?= htmlspecialchars($h['time']) ?></td>
                            <td><?= htmlspecialchars($h['description']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <form method="post" action="history.php">
                <button type="submit" name="clear" class="btn danger">Hapus Riwayat</button>
                <a class="btn" href="index.php">Kembali</a>
            </form>
        <?php endif; ?>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear'])) {
            $_SESSION['history'] = [];
            // Refresh
            header("Location: history.php");
            exit;
        }
        ?>
    </div>
</body>
</html>
