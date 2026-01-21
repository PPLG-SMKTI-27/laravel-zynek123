<?php
<title>Project | {{ $nama }}</title>
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Project | <?= $nama ?></title>

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background: #f5f7fa;
    color: #333;
    margin: 0;
}

header {
    background: #0f172a;
    color: white;
    padding: 60px 20px;
    text-align: center;
}

section {
    max-width: 900px;
    margin: auto;
    padding: 50px 20px;
}

.card {
    background: white;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.back {
    display: inline-block;
    margin-top: 30px;
    padding: 12px 25px;
    background: #0f172a;
    color: white;
    text-decoration: none;
}
</style>
</head>

<body>

<header>
    <h1>Project Saya</h1>
    <p>Kumpulan latihan & project pembelajaran</p>
</header>

<section>
    <div class="card">
        <h3>Website Portfolio</h3>
        <p>Website portfolio pribadi menggunakan PHP dan CSS.</p>
    </div>

    <div class="card">
        <h3>Landing Page</h3>
        <p>Landing page sederhana dan responsif.</p>
    </div>

    <a href="index.php" class="back">⬅ Kembali ke Portfolio</a>
</section>

</body>
</html>

