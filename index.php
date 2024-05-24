<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Kısaltma</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .form-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>URL Kısaltma</h1>
        <form action="index.php" method="post">
            <input type="url" id="original_url" name="original_url" placeholder="URL yapıştırın" required>
            <input type="submit" value="Kısalt">
        </form>
    </div>
</body>
</html>
