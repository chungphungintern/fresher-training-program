<?php
ob_start();
require_once 'models/UserModel.php';
require_once 'views/UserView.php';

class UserController
{
    private $modelUser;
    private $viewUser;

    public function __construct()
    {
        $this->modelUser = new UserModel();
        $this->viewUser = new UserView();
    }

    public function getAllUsers()
    {
        // Models
        $listUsers = $this->modelUser->loadAllUsers();

        // Views
        $this->viewUser->showAllUser($listUsers);
    }

    public function addUser()
    {
        // Views
        $this->viewUser->addUser();

        if (isset($_POST['submit'])) {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $pass = isset($_POST['pass']) ? MD5($_POST['pass']) : '';
            $avatar = '';
            if ($_FILES['file']['type'] == "image/jpeg"
                || $_FILES['file']['type'] == "image/png"
                || $_FILES['file']['type'] == "image/gif"
            ) {
                $path = "templates/img/users/";
                $tmp_name = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                // Upload file
                move_uploaded_file($tmp_name, $path . $name);
                $avatar = $name;

            }

        $status = isset($_POST['status']) ? $_POST['status'] : '';

        // Models
        $result = $this->modelUser->addUser($username, $pass, $status, $email, $avatar);
        if ($result) {
            header("Location:?controller=UserController&action=getAllUsers");
        }
    }
}

public
function editUser()
{
    if (isset($_GET['id'])) {
        $idUser = $_GET['id'];
        $detailUser = $this->modelUser->getDetailUser($idUser);
        // Views
        $this->viewUser->editUser($detailUser);
    }

    if (isset($_POST['submit'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $pass = isset($_POST['pass']) ? MD5($_POST['pass']) : '';
        $avatarCurrent = isset($_POST['fileCurrent']) ? $_POST['fileCurrent'] : '';
        $avatar = isset($_FILE['file']['name']) ? $_FILE['file']['name'] : $avatarCurrent;

        if ($_FILES['file']['type'] == "image/jpeg"
            || $_FILES['file']['type'] == "image/png"
            || $_FILES['file']['type'] == "image/gif"
        ) {
            $path = "templates/img/users/";
            $tmp_name = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            // Upload file
            move_uploaded_file($tmp_name, $path . $name);
            $avatar = $name;

        }

        $status = isset($_POST['status']) ? $_POST['status'] : '';

        $result = $this->modelUser->updateUser($username, $pass, $status, $email, $avatar, $id);
        if ($result) {
            header("Location:?controller=UserController&action=getAllUsers");
        }
    }
}

public function deleteUser()
{
    if (isset($_GET['delid'])) {
        $n_id = $_GET['delid'];
        $del = $this->modelUser->deleteUser($n_id);
        if ($del) {
            header("Location:?controller=UserController&action=getAllUsers");
        }
    }
}

public
function logoutUser()
{
    session_destroy();
    header("Location:login.php");
}

}

?>
