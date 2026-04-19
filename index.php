<?php
// 1. Hata Raporlama
//ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Gerekli Dosyaları İçe Aktar
require_once 'config/database.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/TaskController.php';

// 3. Değişkenleri Tanımla (BU SIRALAMA ÇOK ÖNEMLİ)
$base_url = '/php_taskManager';
$url = $_SERVER['REQUEST_URI'];

// URL'den olası sorgu parametrelerini temizleyelim (Örn: ?id=1 gibi)
$url = parse_url($url, PHP_URL_PATH);
// En sondaki slash / işaretini silelim (Hata payını düşürür)
$url = rtrim($url, '/');

// 4. Kontrolcüleri Başlat
$authController = new AuthController($pdo);
$taskController = new TaskController($pdo);

// 5. Rotalar (Routes)
// Dashboard ve Ana Sayfa
if ($url == $base_url || $url == $base_url . '/dashboard') {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (isset($_SESSION['user_id'])) {
        echo '<link rel="stylesheet" href="/php_taskManager/assets/css/style.css">';
        echo "<h1>Dashboard</h1>";
        echo "Hoş geldin, <b>" . $_SESSION['username'] . "</b>!<br><br>";
        echo "<a href='$base_url/tasks'>Görevlerimi Listele</a> | ";
        echo "<a href='$base_url/tasks/create'>Yeni Görev Ekle</a> | ";
        echo "<a href='$base_url/logout'>Çıkış Yap</a>";
    } else {
        header('Location: ' . $base_url . '/login');
        exit();
    }
} 
// Kayıt Ol
elseif ($url == $base_url . '/register') {
    $authController->register();
} 
// Giriş Yap
elseif ($url == $base_url . '/login') {
    $authController->login();
} 
// Görev Listesi
elseif ($url == $base_url . '/tasks') {
    $taskController->index();
} 
// Yeni Görev Ekleme
elseif ($url == $base_url . '/tasks/create') {
    $taskController->create();
}
// Çıkış Yap
elseif ($url == $base_url . '/logout') {
    if (session_status() === PHP_SESSION_NONE) session_start();
    session_destroy();
    header('Location: ' . $base_url . '/login');
    exit();
}
elseif (strpos($url, $base_url . '/tasks/delete/') === 0) {
    $id = str_replace($base_url . '/tasks/delete/', '', $url);
    $taskController->delete($id);
} 
// Hiçbiri değilse 404
else {
    echo "<h1>404 - Sayfa Bulunamadı</h1>";
    echo "Gelen URL: " . $url . "<br>";
    echo "Beklenen Örnek: " . $base_url . "/tasks";
}