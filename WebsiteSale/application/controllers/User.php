<?php

include 'application\core\My_controller.php';
include 'application\models\User_model.php';

class User extends My_controller {

    function __construct() {

        parent::__construct();
    }

    function CheckLogin($email,$password) {
        $password = hash('sha512', $password);
        $user_model = new User_model();
        $user_list = $user_model->buldQueryParams([
                    "select" => "*",
                    "where" => "email = '" . $email . "' and password = '" . $password . "'"
                ])->select()->loadRow();
        if (!empty($user_list)) {
            $_SESSION['id_user'] = $user_list->id;
            return true;
        }

//      $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công ');
        return FALSE;
    }

    function Login() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $data = array();
            if ($this->CheckLogin($_POST['email'],$_POST['password'])) {
                $data['status'] = 'ok';
            } else {
                $data['status'] = 'err';
            }
            echo json_encode($data);
        }
    }

    function Logout() {
        unset($_SESSION['id_user']);
        header('Location: http://localhost/websitesale/home/index');
        die();
    }

}

$user = new User();
if (get_rgetment(2) == 'user') {
    if (get_rgetment(3) == 'login') {
        $user->Login();
    } else if (get_rgetment(3) == 'logout') {
        $user->Logout();
    }
}
?>