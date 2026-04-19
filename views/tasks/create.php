<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yeni Görev Ekle</title>
    <link rel="stylesheet" href="/php_taskManager/assets/css/style.css">
</head>
<body>
    <h2>Yeni Görev Oluştur</h2>
    <form action="/php_taskManager/tasks/create" method="POST">
        <div>
            <label>Görev Başlığı:</label><br>
            <input type="text" name="title" required placeholder="Örn: Ödevi bitir">
        </div><br>

        <div>
            <label>Açıklama:</label><br>
            <textarea name="description" rows="4" placeholder="Görev detayları..."></textarea>
        </div><br>

        <div>
            <label>Öncelik:</label><br>
            <select name="priority">
                <option value="low">Düşük</option>
                <option value="medium" selected>Orta</option>
                <option value="high">Yüksek</option>
            </select>
        </div><br>

        <div>
            <label>Bitiş Tarihi:</label><br>
            <input type="date" name="due_date">
        </div><br>

        <button type="submit">Görevi Kaydet</button>
        <a href="/php_taskManager/tasks">İptal</a>
    </form>
</body>
</html>