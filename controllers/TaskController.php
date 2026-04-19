<?php
require_once 'models/Task.php';

class TaskController {
    private $taskModel;

    public function __construct($db) {
        $this->taskModel = new Task($db);
    }

    public function index() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /php_taskManager/login');
            exit();
        }

        $tasks = $this->taskModel->getAllByUserId($_SESSION['user_id']);
        require 'views/tasks/index.php';
    }

    public function create() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->taskModel->create(
                $_SESSION['user_id'],
                $_POST['title'],
                $_POST['description'],
                $_POST['priority'],
                $_POST['due_date']
            );
            header('Location: /php_taskManager/tasks');
        } else {
            require 'views/tasks/create.php';
        }
    }

    public function delete($id) {
    if (session_status() === PHP_SESSION_NONE) session_start();
    $this->taskModel->delete($id, $_SESSION['user_id']);
    header('Location: /php_taskManager/tasks');
}
}