<?php
class UrlModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createShortUrl($originalUrl) {
        $shortCode = $this->generateShortCode();
        $sql = "INSERT INTO urls (original_url, short_code) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $originalUrl, $shortCode);
        $stmt->execute();
        return $shortCode;
    }

    public function getOriginalUrl($shortCode) {
        $sql = "SELECT original_url FROM urls WHERE short_code = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $shortCode);
        $stmt->execute();
        $stmt->bind_result($originalUrl);
        $stmt->fetch();
        return $originalUrl;
    }

    public function getShortCode($originalUrl) {
        $sql = "SELECT short_code FROM urls WHERE original_url = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $originalUrl);
        $stmt->execute();
        $stmt->bind_result($shortCode);
        $stmt->fetch();
        return $shortCode;
    }

    private function generateShortCode() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
        $shortCode = '';
        for ($i = 0; $i < 12; $i++) {
            $shortCode .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $shortCode;
    }
}
?>
