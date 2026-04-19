<link rel="stylesheet" href="/php_taskManager/assets/css/style.css">
<h2>Görevlerim</h2>
<a href="/php_taskManager/tasks/create">+ Yeni Görev Ekle</a>
<hr>
<table border="1" cellpadding="10">
    <tr>
        <th>Başlık</th>
        <th>Öncelik</th>
        <th>Durum</th>
        <th>Bitiş Tarihi</th>
    </tr>
    <?php foreach ($tasks as $task): ?>
    <tr>
        <td><?php echo htmlspecialchars($task['title']); ?></td>
        <td><?php echo $task['priority']; ?></td>
        <td><?php echo $task['status']; ?></td>
        <td><?php echo $task['due_date']; ?></td>
        <td>
            <a href="/php_taskManager/tasks/delete/<?php echo $task['id']; ?>" 
            onclick="return confirm('Bu görevi silmek istediğine emin misin?')">Sil</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<br>
<a href="/php_taskManager/dashboard">Panele Dön</a>