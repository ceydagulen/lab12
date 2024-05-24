<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kısaltılmış URL</title>
</head>
<body>
    <h1>Kısaltılmış URL'iniz</h1>
    <p>Orijinal URL: <?= htmlspecialchars($originalUrl) ?></p>
    <p>Kısaltılmış URL: <a href="<?= htmlspecialchars($shortUrl) ?>"><?= htmlspecialchars($shortUrl) ?></a></p>
</body>
</html>
