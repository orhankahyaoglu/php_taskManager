<?php
class Task {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Kullanıcının tüm görevlerini getir
    public function getAllByUserId($user_id) {
        $sql = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY created_time DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll();
    }

    // Yeni görev ekle
    public function create($user_id, $title, $description, $priority, $due_date) {
        $sql = "INSERT INTO tasks (user_id, title, description, priority, due_date) 
                VALUES (:user_id, :title, :description, :priority, :due_date)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':user_id' => $user_id,
            ':title' => $title,
            ':description' => $description,
            ':priority' => $priority,
            ':due_date' => $due_date
        ]);
    }

    public function delete($id, $user_id) {
    $sql = "DELETE FROM tasks WHERE id = :id AND user_id = :user_id";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([':id' => $id, ':user_id' => $user_id]);
}
}