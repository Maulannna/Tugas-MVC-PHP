<?php
require_once 'app/models/User.php';

class userController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new User($dbConnection);
    }

    public function show($id) {
        $user = $this->userModel->getUserById($id);
        require_once 'app/views/userView.php';
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require_once 'app/views/indexView.php';
    }

    public function detail($id) {
        $user = $this->userModel->getUserById($id);
        if (!$user) {
            echo "User not found.";
            return;
        }
        require_once 'app/views/userView.php';
    }

    public function edit($id) {
        $user = $this->userModel->getUserById($id);
        if (!$user) {
            echo "User not found.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->updateUser($id, $name, $email);
            header('Location: index.php');
            exit();
        }

        require_once 'app/views/editView.php';
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header('Location: index.php');
        exit();
    }

    
}
?>
