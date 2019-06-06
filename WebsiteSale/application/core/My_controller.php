<?php
include 'application\models\Product_model.php';
include 'application\models\Catalog_Model.php';
include 'application\models\Advisory_Model.php';
include 'application\models\Banner_Model.php';
include 'application\models\Info_company_Model.php';
include  'application\models\Service_model.php';
include 'application\models\service_type_Model.php';

session_start();
class My_controller {
    public $data = array();
    public function __construct() {
        //info company
        $info_company = new Info_company_model();
        $info_company_de = $info_company->buldQueryParams([
                    "select" => "*",
                    "where" => "id = 1"
                ])->select()->loadRow();
        $this->data['info_company'] = $info_company_de;
        //catalog
        $catalog_model = new Catalog_Model();
        $catalog_list = $catalog_model->buldQueryParams([
                    "select" => "*",
                    "where" => "id_parent = 0"
                ])->select()->loadAllRows();
        foreach ($catalog_list as $row) {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $catalog_model->buldQueryParams([
                        "select" => "*",
                        "where" => "id_parent = " . $row->id
                    ])->select()->loadAllRows();
            $row->subs = $subs;
            foreach ($subs as $row) {

                $input['where'] = array('parent_id' => $row->id);
                $subs2 = $catalog_model->buldQueryParams([
                            "select" => "*",
                            "where" => "id_parent = " . $row->id
                        ])->select()->loadAllRows();

                $row->subs2 = $subs2;
            }
        }
        //pre($catalog_list);
        $this->data['catalog'] = $catalog_list;
        
        //advisory
        $advisory_model = new Advisory_model();
        
        $advisory_list = $advisory_model->buldQueryParams([
                    "select" => "*",
                ])->select()->loadAllRows();
//        pre($advisory_list);
         $this->data['advisory'] = $advisory_list;
         // service_type
         $service_type_model = new Service_type_model();
         $service_type_list = $service_type_model->buldQueryParams([
                    "select" => "*",
                ])->select()->loadAllRows();
         $this->data['service_type_list'] = $service_type_list;
         
         // banner
         
         $banner_model = new Banner_model();
        
        $banner_list = $banner_model->buldQueryParams([
                    "select" => "*",
                    "other" => "order by created limit 3"
                ])->select()->loadAllRows();
        //pre($banner_list);
         $this->data['banner'] = $banner_list;
         //produc_search
         $product_model = new Product_Model();
         $product_list_search = $product_model->buldQueryParams([
                    "select" => "id,name as 'label', name as 'value'",
                    "other" => "order by name desc"
                ])->select()->loadAllRows();
        
        $this->data['product_list_search'] = json_encode($product_list_search);
        //cart khoi tao
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=array();
        }
    }
}