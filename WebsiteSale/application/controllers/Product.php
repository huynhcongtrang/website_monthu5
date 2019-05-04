<?php

include 'application\core\My_controller.php';

class Product extends My_controller {

    function __construct() {
        parent::__construct();
    }

    function product_list() {
        
        $this->data['path'] = view_site('/site/product/product_list');
        render1('site/layout.php', $this->data);
    }

}

$pro = new Product();

if (get_rgetment(2) == 'Product') {
    if (get_rgetment(3) == 'product_list') {
        $pro->product_list();
    }
}