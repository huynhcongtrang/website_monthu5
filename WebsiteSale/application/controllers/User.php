<?php

include 'application\core\My_controller.php';
include 'application\models\User_model.php';

class User extends My_controller {

    function __construct() {

        parent::__construct();
    }

    function CheckLogin($email, $password) {
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
            if ($this->CheckLogin($_POST['email'], $_POST['password'])) {
                $data['status'] = 'ok';
            } else {
                $data['status'] = 'err';
            }
            echo json_encode($data);
        }
    }

    function CheckExitsEmail($email,$phone) {
        $user_model = new User_model();
        $s = 0;
        $user_list = $user_model->buldQueryParams([
                    "select" => "*",
                    "where" => "email = '" . $email."'"
                ])->select()->loadRow();
        if(!empty($user_list)){
            $s += 1;
        }
        $user_list = $user_model->buldQueryParams([
                    "select" => "*",
                    "where" => "phone = '" . $phone."'"
                ])->select()->loadRow();
         if(!empty($user_list)){
            $s += 2;
        }
        return $s;
    }

    function Register() {
        if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $data = array();
            $check = $this->CheckExitsEmail($_POST['email'],$_POST['phone']);
            if ($check == 0) {
                $data['status'] = 'ok';
                 $user_model = new User_model();
                 $user_model->buldQueryParams([
                    "params" => "(name,email,phone,address,password,created)",
                    "values" => "('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."','".hash('sha512', $_POST['password'])."','".date('Y-m-d H:i:s')."')"
                ])->insert()->execute();
            } else {
                $data['status'] = 'err';
                $data['check'] = $check;
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
    } else if (get_rgetment(3) == 'register') {
        $user->Register();
    }
}
?>