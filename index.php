<?php
session_start();
require_once 'Paras.php';

if (!isset($_SESSION['paras'])) {
    $paras = new Paras();
    $_SESSION['paras'] = serialize($paras);
} else {
    $paras = unserialize($_SESSION['paras']);
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>PokéCare - Paras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
         <div class="pokemon-image">
            <img src="https://img.pokemondb.net/artwork/paras.jpg" alt="Paras">
        <div class="pokemon-info"></div>
            <h1><?= htmlspecialchars($paras->getName()) ?></h1>
            <p><strong>Tipe:</strong> <?= implode(' / ', $paras->getTypes()) ?></p>
            <p><strong>Level awal:</strong> <?= $paras->getLevel() ?></p>
            <p><strong>HP saat ini:</strong> <?= $paras->getHp() ?></p>
            <p><strong>HP dasar:</strong> <?= $paras->getBaseHp() ?></p>
            <p><strong>Jurus spesial:</strong> <?= htmlspecialchars($paras->getSpecialMove()) ?></p>
            <p><strong>Abilities:</strong> <?= implode(', ', $paras->getAbilities()) ?></p>
        </div>

        <div class="buttons">
            <a class="btn" href="train.php">Mulai Latihan</a>
            <a class="btn" href="history.php">Riwayat Latihan</a>
        </div>
        <footer class="note">
            Data Paras: tipe Bug/Grass, base HP 35 (sumber: pokemondb.net). :contentReference[oaicite:2]{index=2}
        </footer>
    </div>
</body>
</html>
