<?php
class UrlController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function createShortUrl($originalUrl) {
        $shortCode = $this->model->getShortCode($originalUrl);
        if (!$shortCode) {
            $shortCode = $this->model->createShortUrl($originalUrl);
        }
        return $shortCode;
    }

    public function redirectToOriginalUrl($shortCode) {
        $originalUrl = $this->model->getOriginalUrl($shortCode);
        if ($originalUrl) {
            header("Location: " . $originalUrl);
            exit();
        } else {
            echo "URL not found.";
        }
    }
}
?>
