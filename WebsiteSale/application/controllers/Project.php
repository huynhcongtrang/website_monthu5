<?php

include 'application\core\My_controller.php';
include 'application\models\Project_model.php';

class Project extends My_controller {

    function __construct() {

        parent::__construct();
    }

    function ProjectList() {
        $product_model = new Product_Model();
        $product_list = $product_model->buldQueryParams([
                    "select" => "id,name,view,image_link",
                    "other" => "order by view desc limit 10"
                ])->select()->loadAllRows();
        $this->data['product_list'] = $product_list; // hien thi xe nhieu nhat
        
        //load list project
        $project_model = new Project_model();
        $project_list = $project_model->buldQueryParams([
                    "select" => "id,name,introduce,image_link",
                ])->select()->loadAllRows();
        $this->data['project_list'] = $project_list;
        
        $this->data['active_navigation'] = "project";
        $this->data['path'] = view_site('/site/project/project_list');
        render1('site/layout.php', $this->data);
    }
    
    function Project_detail(){
        echo 'trống';
    }

}

$project = new Project();
if (get_rgetment(2) == 'project') {
    if (get_rgetment(3) == 'project_list') {
        $project->ProjectList();
    }
    else if(get_rgetment(3) == 'project_detail') {
        $project->Project_detail();
    }
}
?>