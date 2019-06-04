<?php

include 'application\core\My_controller.php';

class Service extends My_controller {

    function __construct() {

        parent::__construct();
    }

    function Service_list() {
        $product_model = new Product_Model();
        $product_list = $product_model->buldQueryParams([
                    "select" => "id,name,view,image_link",
                    "other" => "order by view desc limit 10"
                ])->select()->loadAllRows();
        $this->data['product_list'] = $product_list; // hien thi xe nhieu nhat
        //
        //load list project
        $service = new Service_model();
        $service_list = $service->buldQueryParams([
                    "select" => "id,name,introduce,image_link",
                ])->select()->loadAllRows();
        $this->data['service_list'] = $service_list;
        
        $this->data['active_navigation'] = "service";
        $this->data['path'] = view_site('/site/post/posts_list');
        render1('site/layout.php', $this->data);
    }

    function Service_detail() {
        if (empty(get_rgetment(4))) {
            header('Location: http://localhost/websitesale/home/index');
        }
        
        $product_model = new Product_Model();
        $product_list = $product_model->buldQueryParams([
                    "select" => "id,name,view,image_link",
                    "other" => "order by view desc limit 10"
                ])->select()->loadAllRows();
        $this->data['product_list'] = $product_list; // hien thi xe nhieu nhat
        
        $id_service = get_rgetment(4);
        //get info service
        $service = new Service_model();
        $service_detail = $service->buldQueryParams([
                    "select" => "*",
                    "where" => "id = ". $id_service
                ])->select()->loadRow();
        $this->data['service_detail'] = $service_detail;
        
        // service relate
        $id_type_service = $service_detail->id_type_service;
        $service_relate = $service->buldQueryParams([
                    "select" => "id,name,introduce,image_link",
                    "where" => "id_type_service = ". $id_type_service." and id <> ".$id_service,
                    "other" => "limit 3"
                ])->select()->loadAllRows();
        $this->data['service_relate'] = $service_relate;
        
        $this->data['active_navigation'] = "service";
        $this->data['path'] = view_site('/site/post/post_detail');
        render1('site/layout.php', $this->data);
    }

}

$service = new Service();
if (get_rgetment(2) == 'service') {
    if (get_rgetment(3) == 'service_list') {
        $service->Service_list();
    } else if (get_rgetment(3) == 'service_detail') {
        $service->Service_detail();
    }
}
?>