<?php

require 'application\core\My_controller.php';
require 'application\models\Comment_product_model.php';
require 'application\models\Service_model.php';
require 'application\models\Project_model.php';

//SELECT * FROM `product` ORDER by view LIMIT 9
class Home extends My_controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        // laay catalog
        //product
        $product_model = new Product_model();
        $product_list = $product_model->buldQueryParams([
                    "select" => "*",
                    "other" => "order by view desc limit 9"
                ])->select()->loadAllRows();

        $comment_product = new Comment_product_model();
        foreach ($product_list as $product) {
            $subs = $comment_product->buldQueryParams([
                        "select" => "COUNT(*) as totalcomment",
                        "where" => "id_product = " . $product->id
                    ])->select()->loadAllRows();
            $product->totalcommnet = $subs[0]->totalcomment;
        }
        $this->data['product_list'] = $product_list;

        //service
        $service_model = new Service_model();
        $service_list = $service_model->buldQueryParams([
                    "select" => "*",
                    "other" => "order by created desc limit 4"
                ])->select()->loadAllRows();
        $this->data['service_list'] = $service_list;
        //project
        $project_model = new Project_model();
        $project_list = $project_model->buldQueryParams([
                    "select" => "*",
                    "other" => "order by created desc limit 6"
                ])->select()->loadAllRows();
        $this->data['project_list'] = $project_list;




        $this->data['path'] = view_site('/site/home/index');
        render1('site/layout.php', $this->data);
    }

    function Search() {
        $this->data['key'] = $_GET['search_product'];
         //product
        $product_model = new Product_model();
        $product_list = $product_model->buldQueryParams([
                    "select" => "*",
                    "where" => "name like N'%".$_GET['search_product']."%'"
                ])->select()->loadAllRows();

        $comment_product = new Comment_product_model();
        foreach ($product_list as $product) {
            $subs = $comment_product->buldQueryParams([
                        "select" => "COUNT(*) as totalcomment",
                        "where" => "id_product = " . $product->id
                    ])->select()->loadAllRows();
            $product->totalcommnet = $subs[0]->totalcomment;
        }
        $this->data['product_list'] = $product_list;
        
        
        $this->data['path'] = view_site('/site/home/search');
        render1('site/layout.php', $this->data);
    }

}
$home = new Home();
if (get_rgetment(2) == 'Home') {
    if (get_rgetment(3) == 'index') {
        $home->index();
    }
    if(get_rgetment(3) == 'search'){
        $home->Search();
    }
}

