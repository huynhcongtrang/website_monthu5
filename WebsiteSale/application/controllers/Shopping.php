<?php

include 'application\core\My_controller.php';

class Shopping extends My_controller {

    function __construct() {
        parent::__construct();
    }
    function CheckItemExits($idsp,$nameSp,$gia,$linkImage){
        $tonTai=FALSE;
        foreach($_SESSION['cart'] as $item){
            if($item->id==$idsp){
               $item->quantity++;
               $tonTai=TRUE;
            }
        }
        if($tonTai==FALSE){
            $pro=(object)array('id'=>$idsp,'name'=>$nameSp,'price'=>$gia,'image'=>$linkImage,'quantity'=>1);
            array_push($_SESSION['cart'],$pro);
        }
        return $tonTai;
    }
    function CartAddItem(){
        $data = array();
        if (!empty($_POST['id']) && !empty($_POST['name'])&& !empty($_POST['price'])&& !empty($_POST['image'])) {
            $isTonTai=$this->CheckItemExits($_POST['id'],$_POST['name'],$_POST['price'],$_POST['image']);
            if($isTonTai==FALSE)
                $data['newOrder']='ok';
        }
        //$data['newOrder']='ok';
        $data['status']  = 'ok' ; 
        $data['cart'] =  $_SESSION['cart']; 
        echo json_encode($data);
    }
    function GetIDItemInCart($idsp){
        foreach($_SESSION['cart'] as $item){
            if($item->id==$idsp){
               return $item;
            }
        }
        return NULL;
    }
    function View_cart(){
        //unset($_SESSION['cart'][1]);
        pre($_SESSION['cart']);
        //pre(Compute_All_Cart());
       // $show= array();
        //for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        //    $item=$_SESSION['cart'][i];
        //    array_push($show,$item->id);
        //} 
        //foreach($_SESSION['cart'] as $item){
        //    unset($item);
            //array_push($show,$item->id);
       // }
        //pre($show);
        //$show=array();
        //$key=array_search("1",array_column($show,'id'));
        //foreach($_SESSION['cart'] as $item){
        //    array_push($show,$item->id);
        //}
    }
    
    function CartDeleteItem(){
        $data = array();
        $_SESSION['cart']=array_values($_SESSION['cart']);
        if (!empty($_POST['id'])){
            unset($_SESSION['cart'][array_search($_POST['id'],array_column($_SESSION['cart'],'id'))]);
            $data['status']  = 'ok' ; 
        }
        $data['cart'] =  $_SESSION['cart']; 
        echo json_encode($data);
    }

}

$sh = new Shopping();

if (get_rgetment(2) == 'shopping') {
    if (get_rgetment(3) == 'order') {
        $sh->CartAddItem();
    }
    if (get_rgetment(3) == 'viewcart') {
        $sh->View_cart();
    }
    if(get_rgetment(3)=='deletecart'){
        $sh->CartDeleteItem();
    }
    
}
