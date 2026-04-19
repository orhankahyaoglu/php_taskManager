<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap - Task Manager</title>
    <link rel="stylesheet" href="/php_taskManager/assets/css/style.css">
    </head>
<body>
    <div class="auth-container">
        <h2>Giriş Yap</h2>
        <form action="/php_taskManager/login" method="POST">
            <div class="form-group">
                <label>E-posta:</label><br>
                <input type="email" name="email" placeholder="E-posta adresinizi girin" required>
            </div>
            <br>
            <div class="form-group">
                <label>Şifre:</label><br>
                <input type="password" name="password" placeholder="Şifrenizi girin" required>
            </div>
            <br>
            <button type="submit">Giriş Yap</button>
        </form>
        <p>Hesabın yok mu? <a href="/php_taskManager/register">Kayıt ol</a></p>
    </div>
</body>
</html>