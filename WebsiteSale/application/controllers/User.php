<?php

include 'application\core\My_controller.php';
include 'application\models\User_model.php';
include 'application\models\Transaction_model.php';

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

    function CheckExitsEmail($email, $phone) {
        $user_model = new User_model();
        $s = 0;
        $user_list = $user_model->buldQueryParams([
                    "select" => "*",
                    "where" => "email = '" . $email . "'"
                ])->select()->loadRow();
        if (!empty($user_list)) {
            $s += 1;
        }
        $user_list = $user_model->buldQueryParams([
                    "select" => "*",
                    "where" => "phone = '" . $phone . "'"
                ])->select()->loadRow();
        if (!empty($user_list)) {
            $s += 2;
        }
        return $s;
    }

    function Register() {
        if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $data = array();
            $check = $this->CheckExitsEmail($_POST['email'], $_POST['phone']);
            if ($check == 0) {
                $data['status'] = 'ok';
                $user_model = new User_model();
                $user_model->buldQueryParams([
                    "params" => "(name,email,phone,address,password,created)",
                    "values" => "('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . $_POST['address'] . "','" . hash('sha512', $_POST['password']) . "','" . date('Y-m-d H:i:s') . "')"
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

    function CheckExitEmail($email) {
        $user_model = new User_model();
        $user_list = $user_model->buldQueryParams([
                    "select" => "*",
                    "where" => "email = '" . $email . "'"
                ])->select()->loadRow();
        if (!empty($user_list)) {
            return true;
        } else {
            return false;
        }
    }

    function SendCode() {
        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
            if ($this->CheckExitEmail($email)) {
                $md5_hash = md5(rand(0, 999));
                $security_code = substr($md5_hash, 15, 6);
                mail($email, "Send Code", $security_code);
                // set timer sendcode
                $newtimestamp = (new DateTime());
                date_add($newtimestamp, date_interval_create_from_date_string('1 minutes'));
                $_SESSION['time_sendcode'] = $newtimestamp->format('Y-m-d H:i:s');

                $_SESSION['email_forgot'] = $email;
                $_SESSION['code'] = $security_code;
                $data['status'] = 'ok';
            } else {
                $data['status'] = 'err';
            }
        } else {
            if (!isset($_SESSION['email_forgot']) && !isset($_SESSION['code']) && !isset($_SESSION['time_sendcode'])) {
                header('Location: http://localhost/websitesale/home/index');
            }
            if (strtotime($_SESSION['time_sendcode']) < strtotime((new DateTime())->format('Y-m-d H:i:s'))) {
                header('Location: http://localhost/websitesale/home/index');
            }

            $this->data['active_navigation'] = "home";
            $this->data['path'] = view_site('/site/user/sendcode');
            render1('site/layout.php', $this->data);
        }
        echo json_encode($data);
    }

    function GetTimeSendCode() {
        $data = array();
        if (isset($_SESSION['time_sendcode'])) {
            $data['status'] = 'ok';
            $data['time'] = $_SESSION['time_sendcode'];
        } else {
            $data['status'] = 'err';
        }
        echo json_encode($data);
    }

    function Cancel() {
        unset($_SESSION['status_confirm']);
        unset($_SESSION['email_forgot']);
        unset($_SESSION['code']);
        unset($_SESSION['time_sendcode']);
        header('Location: http://localhost/websitesale/home/index');
    }

    function ConformCode() {
        $data = array();
        if (!empty($_POST['confirm']) && isset($_SESSION['code'])) {
            if ($_POST['confirm'] == $_SESSION['code']) {
                $data['status'] = 'ok';
                $_SESSION['status_confirm'] = 'true';
            } else {
                $data['mess'] = 'Mã xác nhận không đúng !';
                $data['status'] = 'err';
            }
        } else {
            $data['mess'] = 'Không tồn tại yêu cầu đổi mật khẩu !';
            $data['status'] = 'err';
        }
        echo json_encode($data);
    }

    function RecoverPassword() {
        if (!isset($_SESSION['status_confirm'])) {
            header('Location: http://localhost/websitesale/home/index');
        }
        // xoa di bien time;
        unset($_SESSION['time_sendcode']);
        $this->data['active_navigation'] = "home";
        $this->data['path'] = view_site('/site/user/change-password');
        render1('site/layout.php', $this->data);
    }

    function ChangePassword() {
        if (!isset($_SESSION['status_confirm'])) {
            header('Location: http://localhost/websitesale/home/index');
        }
        $data = array();
        if (!empty($_POST['password'])) {
            $password = hash('sha512', $_POST['password']);
            $user_model = new User_model();
            if (isset($_SESSION['email_forgot'])) {
                $user_list = $user_model->buldQueryParams([
                            "values" => "password = '" . $password . "'",
                            "where" => "email = '" . $_SESSION['email_forgot'] . "'"
                        ])->update()->execute();
                unset($_SESSION['status_confirm']);
                unset($_SESSION['email_forgot']);
                unset($_SESSION['code']);
                $data['status'] = 'ok';
            } else
                $data['status'] = 'err';
        } else
            $data['status'] = 'err';
        echo json_encode($data);
    }

    function Account() {
        if (!isset($_SESSION['id_user'])) {
            header('Location: http://localhost/websitesale/home/index');
        }

        $user_model = new User_model();
        $user_info = $user_model->buldQueryParams([
                    "select" => "name,phone,address",
                    "where" => "id = " . $_SESSION['id_user']
                ])->select()->loadRow();
        $this->data['user'] = $user_info;
        
        
        //load transaction
        // payment 1 : thanh toan tai nha 2: thanh toan chuyen khoan
        // status_payment 1 : chuaw thanh toan , 2 : da thanh toan , 
        // status_ship : 1 : dang van chuyen , 2 : da va chuyen
        $transaction_model = new Transaction_model();
        $transaction_list = $transaction_model->buldQueryParams([
                    "select" => "id,created , address , amount , payment, status_payment , status_ship",
                    "where" => "id_user = " . $_SESSION['id_user']
                ])->select()->loadAllRows();
        $this->data['transaction_list'] = $transaction_list;
        $this->data['path'] = view_site('/site/user/account');
        render1('site/layout.php', $this->data);
    }

    function CheckExistPhone($phone) {
        $user_model = new User_model();
        $user_list = $user_model->buldQueryParams([
                    "select" => "*",
                    "where" => " id <> ".$_SESSION['id_user']." and phone = '".$phone."'"
                ])->select()->loadRow();
        if (!empty($user_list)) {
            return true;
        } else {
            return false;
        }
    }

    function Update() {

        $data = array();
        if (!isset($_SESSION['id_user'])) {
            $data['status'] = 'error';
            $data['message'] = 'not_login';
        } else if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['address'])) {
            if ($this->CheckExistPhone($_POST['phone'])) {
                $data['status'] = 'error';
                $data['message'] = 'exit_phone';
            } else {
                $user_model = new User_model();
                $user_list = $user_model->buldQueryParams([
                            "values" => " name = '" . $_POST['name'] . "' , phone = '" . $_POST['phone'] . "', address = '" . $_POST['address'] . "'",
                            "where" => " id = " . $_SESSION['id_user']
                        ])->update()->execute();
                $data['status'] = 'ok';
            }
        }
        echo json_encode($data);
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
    } else if (get_rgetment(3) == 'sendcode') {
        $user->SendCode();
    } else if (get_rgetment(3) == 'cancel') {
        $user->Cancel();
    } else if (get_rgetment(3) == 'confirmcode') {
        $user->ConformCode();
    } else if (get_rgetment(3) == 'change-password') {
        $user->RecoverPassword();
    } else if (get_rgetment(3) == 'changepassword') {
        $user->ChangePassword();
    } else if (get_rgetment(3) == 'get_time_sendcode') {
        $user->GetTimeSendCode();
    } else if (get_rgetment(3) == 'account') {
        $user->Account();
    } else if (get_rgetment(3) == 'update') {
        $user->Update();
    }
     else if (get_rgetment(3) == 'check') {
        $user->CheckExistPhone('0326646934');
    }
}
?>