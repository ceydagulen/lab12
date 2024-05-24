<?php
include 'config.php';
include 'models/UrlModel.php';
include 'controllers/UrlController.php';

$model = new UrlModel($conn);
$controller = new UrlController($model);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $originalUrl = $_POST['original_url'];
    if (filter_var($originalUrl, FILTER_VALIDATE_URL)) {
        $shortCode = $controller->createShortUrl($originalUrl);
        $shortUrl = "http://localhost/" . $shortCode;
        include 'views/result.php';
    } else {
        $error = "Geçersiz URL formatı.";
        include 'views/error.php';
    }
} elseif (isset($_GET['code'])) {
    $shortCode = $_GET['code'];
    $controller->redirectToOriginalUrl($shortCode);
} else {
    include 'views/index.php';
}
?>
