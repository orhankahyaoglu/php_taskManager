<link rel="stylesheet" href="/php_taskManager/assets/css/style.css">
<h2>Kayıt Ol</h2>
<form action="/php_taskManager/register" method="POST">
    <input type="text" name="username" placeholder="Kullanıcı Adı" required><br>
    <input type="email" name="email" placeholder="E-posta" required><br>
    <input type="password" name="password" placeholder="Şifre" required><br>
    <button type="submit">Kayıt Ol</button>
</form>
<a href="/php_taskManager/login">Zaten hesabın var mı? Giriş yap.</a>