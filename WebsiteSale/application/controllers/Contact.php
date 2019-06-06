<?php

include 'application\core\My_controller.php';
include 'application\models\Contact_model.php';

class Contact extends My_controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        //info company
        $info_company = new Info_company_model();
        $info_company_de = $info_company->buldQueryParams([
                    "select" => "*",
                    "where" => "id = 1"
                ])->select()->loadRow();
        $this->data['info_company'] = $info_company_de;
        
        //// hien thi xe nhieu nhat
        $product_model = new Product_Model();
        $product_list = $product_model->buldQueryParams([
                    "select" => "id,name,view,image_link",
                    "other" => "order by view desc limit 10"
                ])->select()->loadAllRows();
        $this->data['product_list'] = $product_list; 
        
        $this->data['active_navigation'] = "contact";
        $this->data['path'] = view_site('/site/contact/index');
        render1('site/layout.php', $this->data);
    }

    function SubmitContact() {
        if (!empty($_POST['fullname']) && !empty($_POST['address']) && !empty($_POST['telephone']) && !empty($_POST['email']) && !empty($_POST['content'])) {
            $contact_model = new Contact_model();
            $contact_content = $contact_model->buldQueryParams([
                        "params" => "(name,address,phone,email,content,created)",
                        "values" => "('" . $_POST['fullname'] . "','" . $_POST['address'] . "','" . $_POST['telephone'] . "','" . $_POST['email'] . "','" . $_POST['content'] . "','" . date('Y-m-d H:i:s') . "')"
                    ])->insert()->execute();
        }
        header('Location: http://localhost/websitesale/home/index');
    }
}

$contact = new Contact();
if (get_rgetment(2) == 'contact') {
    if (get_rgetment(3) == 'index') {
        $contact->index();
    } else if (get_rgetment(3) == 'submit-contact') {
        $contact->SubmitContact();
    }
}
?>