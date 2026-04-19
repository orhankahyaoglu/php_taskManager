<?php
require_once 'models/User.php';

class AuthController {
    private $userModel;

    public function __construct($db) {
        // Veritabanı bağlantısını kullanarak User modelini başlatıyoruz
        $this->userModel = new User($db);
    }

    // KAYIT OLMA FONKSİYONU
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->register($username, $email, $password)) {
                header('Location: /php_taskManager/login');
            } else {
                echo "Kayıt sırasında hata oluştu!";
            }
        } else {
            require 'views/auth/register.php';
        }
    }

    // GİRİŞ YAPMA FONKSİYONU (Hatanın sebebi bu kısmın eksik olması)
    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $user = $this->userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                // Oturum bilgilerini kaydediyoruz
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                header('Location: /php_taskManager/dashboard');
                exit();
            } else {
                echo "E-posta veya şifre hatalı! <a href='/php_taskManager/login'>Tekrar dene</a>";
            }
        } else {
            require 'views/auth/login.php';
        }
    }
}