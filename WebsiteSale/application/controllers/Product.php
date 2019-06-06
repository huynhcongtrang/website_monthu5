<?php

include 'application\core\My_controller.php';
include 'application\models\Comment_product_model.php';

class Product extends My_controller {

    function __construct() {
        parent::__construct();
    }

    function product_list() {

        $product_model = new Product_Model();
        $product_list = $product_model->buldQueryParams([
                    "select" => "id,name,view,image_link",
                    "other" => "order by view desc limit 10"
                ])->select()->loadAllRows();
        $this->data['product_list'] = $product_list; // hien thi xe nhieu nhat

        $comment_product = new Comment_product_model();
        $catalog_model = new Catalog_Model();
        $product_list = array();
        $list_product_dis = $catalog_model->buldQueryParams([
                    "select" => "*",
                    "where" => "id_parent = 0"
                ])->select()->loadAllRows();
        foreach ($list_product_dis as $row) {
            $product_list = [];
            $product_list_temp = $product_model->buldQueryParams([
                        "select" => "*",
                        "where" => "id_catalog = " . $row->id,
                    ])->select()->loadAllRows();
            foreach ($product_list_temp as $product) {
                $subs_comment = $comment_product->buldQueryParams([
                            "select" => "COUNT(*) as totalcomment",
                            "where" => "id_product = " . $product->id
                        ])->select()->loadAllRows();
                $product->totalcommnet = $subs_comment[0]->totalcomment;
            }
            $product_list = array_merge($product_list, $product_list_temp);
            $subs = $catalog_model->buldQueryParams([
                        "select" => "*",
                        "where" => "id_parent = " . $row->id
                    ])->select()->loadAllRows();
            if (!empty($subs)) {
                foreach ($subs as $row1) {
                    $product_list_temp1 = $product_model->buldQueryParams([
                                "select" => "*",
                                "where" => "id_catalog = " . $row1->id,
                            ])->select()->loadAllRows();
                    // load so comment 
                    foreach ($product_list_temp1 as $product) {
                        $subs_comment = $comment_product->buldQueryParams([
                                    "select" => "COUNT(*) as totalcomment",
                                    "where" => "id_product = " . $product->id
                                ])->select()->loadAllRows();
                        $product->totalcommnet = $subs_comment[0]->totalcomment;
                    }
                    $product_list = array_merge($product_list, $product_list_temp1);
                    $subs2 = $catalog_model->buldQueryParams([
                                "select" => "*",
                                "where" => "id_parent = " . $row1->id
                            ])->select()->loadAllRows();
                    if (!empty($subs2)) {
                        foreach ($subs2 as $row2) {
                            $product_list_temp2 = $product_model->buldQueryParams([
                                        "select" => "*",
                                        "where" => "id_catalog = " . $row2->id,
                                    ])->select()->loadAllRows();
                            foreach ($product_list_temp2 as $product) {
                                $subs_comment = $comment_product->buldQueryParams([
                                            "select" => "COUNT(*) as totalcomment",
                                            "where" => "id_product = " . $product->id
                                        ])->select()->loadAllRows();
                                $product->totalcommnet = $subs_comment[0]->totalcomment;
                            }
                            $product_list = array_merge($product_list, $product_list_temp2);
                        }
                    }
                }
            }

            $row->product_list = $product_list;
        }
        $this->data['product_list_dis'] = $list_product_dis; // cai nay dung hien thi ra conten
        
        $this->data['active_navigation'] = "product";
        $this->data['path'] = view_site('/site/product/product_list');
        render1('site/layout.php', $this->data);
    }

    function ViewDetail() {
        if (empty(get_rgetment(4))) {
            header('Location: http://localhost/websitesale/home/index');
        }
        $product_model = new Product_Model();
        $product_list = $product_model->buldQueryParams([
                    "select" => "id,name,view,image_link",
                    "other" => "order by view desc limit 10"
                ])->select()->loadAllRows();
        $this->data['product_list'] = $product_list; // hien thi xe nhieu nhat

        $id = get_rgetment(4);
        // tang view len
        $view = $product_model->buldQueryParams([
                    "select" => "view",
                    "where" => "id = " . $id
                ])->select()->loadRow()->view;
        $product_model->buldQueryParams([
            "values" => "view = " . ($view + 1),
            "where" => "id = " . $id
        ])->update()->execute();

        // get info detail product
        $product_detail = $product_model->buldQueryParams([
                    "select" => "*",
                    "where" => "id = " . $id
                ])->select()->loadRow();
        $catalog = new Catalog_model();
        // get name catalog of product
        $product_detail->name_catalog = $catalog->buldQueryParams([
                    "select" => "name",
                    "where" => "id = " . $product_detail->id_catalog
                ])->select()->loadRow()->name;
        $this->data['product_detail'] = $product_detail;

        //get product concern
        $product_concern = $product_model->buldQueryParams([
                    "select" => "id,name,discount,price,view,image_link,introduce",
                    "where" => "id_catalog = " . $product_detail->id_catalog . " and id != " . $id,
                    "other" => "order by view desc limit 3"
                ])->select()->loadAllRows();
        if (!empty($product_concern)) {
            $comment_product = new Comment_product_model();
            foreach ($product_concern as $pro_con) {
                $subs_comment = $comment_product->buldQueryParams([
                            "select" => "COUNT(*) as totalcomment",
                            "where" => "id_product = " . $pro_con->id
                        ])->select()->loadRow();
                $pro_con->totalcommnet = $subs_comment->totalcomment;
            }
        }
        $this->data['product_concern'] = $product_concern;

        $this->data['active_navigation'] = "product";
        $this->data['path'] = view_site('/site/product/product_detail');
        render1('site/layout.php', $this->data);
    }

    function LoadListProductFollowCatalog() {
        if (empty(get_rgetment(4))) {
            header('Location: http://localhost/websitesale/home/index');
        }

        $product_model = new Product_Model();
        $product_list = $product_model->buldQueryParams([
                    "select" => "id,name,view,image_link",
                    "other" => "order by view desc limit 10"
                ])->select()->loadAllRows();
        $this->data['product_list'] = $product_list; // hien thi xe nhieu nhat

        $id = get_rgetment(4);
        // load list by catalog
        $catalog = new Catalog_model();


        $catalog_id_list = array();
        $catalog_id_list = $catalog->buldQueryParams([
                    "select" => "id,name",
                    "where" => "id_parent = " . $id
                ])->select()->loadAllRows();

        $catalog_id_temp = array();
        $catalog_id_temp = $catalog_id_list;
        $array_list_id_catalog = array();
        $array_list_id_catalog = $catalog_id_temp;
        while (!empty($catalog_id_temp)) {
            $catalog_id_sub = array();
            foreach ($catalog_id_temp as $ca_id) {
                $catalog_sub = $catalog->buldQueryParams([
                            "select" => "id,name",
                            "where" => "id_parent = " . $ca_id->id
                        ])->select()->loadAllRows();
                $catalog_id_sub = array_merge($catalog_id_sub, $catalog_sub);
            }
            $catalog_id_temp = $catalog_id_sub;
            $array_list_id_catalog = array_merge($array_list_id_catalog, $catalog_id_sub);
        }
        // ad id goc
        $object = new stdClass();
        $object->id = $id;
        $object->name = $catalog->buldQueryParams([
                    "select" => "name",
                    "where" => "id = " . $id
                ])->select()->loadRow()->name;
        array_unshift($array_list_id_catalog, $object);

        
        //load danh sachs san pham
        $product_list = array();
        $product_model = new Product_model();
        $comment_product = new Comment_product_model();
        foreach ($array_list_id_catalog as $id_catalog) {
            //get project
            $product_list = $product_model->buldQueryParams([
                        "select" => "id,name,discount,price,view,image_link,introduce",
                        "where" => "id_catalog = " . $id_catalog->id
                    ])->select()->loadAllRows();
            if (!empty($product_list)) {
                foreach ($product_list as $pro_con) {
                    $subs_comment = $comment_product->buldQueryParams([
                                "select" => "COUNT(*) as totalcomment",
                                "where" => "id_product = " . $pro_con->id
                            ])->select()->loadRow();
                    $pro_con->totalcommnet = $subs_comment->totalcomment;
                }
            }
            $id_catalog->product = $product_list;
        }
        
        $this->data['list_product'] = $array_list_id_catalog;
        $this->data['active_navigation'] = "product";
        $this->data['path'] = view_site('/site/product/product_follow_catalog');
        render1('site/layout.php', $this->data);
    }

}

$pro = new Product();

if (get_rgetment(2) == 'product') {
    if (get_rgetment(3) == 'product_list') {
        $pro->product_list();
    } else if (get_rgetment(3) == 'view-detail') {
        $pro->ViewDetail();
    } else if (get_rgetment(3) == 'product-follow-catalog') {
        $pro->LoadListProductFollowCatalog();
    }
}