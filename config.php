<?php
include("classes/factory.php");
$json = array(); 
 if (isset($_POST['save'])) {
        $factory=new factory();
        $factory->set_type($_POST['type']);
        $product=$factory->find_type();
     $check=$product->set_name($_POST['name']);
     if($check==0){
         $json['error'][] = "Name field is required";
         echo json_encode($json);
         exit;
     }
        $check=$product->set_sku($_POST['sku']);
     if($check==0){
         $json['error'][] = "SKU field is required";
         echo json_encode($json);
         exit;
     }
        $check=$product->set_price($_POST['price']);
     if($check==0){
         $json['error'][] = "Price field is required";
         echo json_encode($json);
         exit;
     }
     $check=$product->set_type($_POST['type']);
     if($check==0){
         $json['error'][] = "Type field is required";
         echo json_encode($json);
         exit;
     }
        
        $check=$product->set_properties();
     if($check===1){
         $product->save_product();
         $json['success'][] = "Success";
         echo json_encode($json);
         exit;
     }
     else{
     $json['error'][] = "Properties cannot contain 0 Value";
         echo json_encode($json);
         exit;}
        
 }

if(isset($_POST['product_id'])) {
	$products_id = trim($_POST['product_id']);
    $factory=new factory();
    $result=$factory->delete_products($products_id);
    $json['success'][] = $result;
     echo json_encode($json);
     exit;
}
if(isset($_POST['pricetest'])){
    $json = array(); 
    if(is_numeric($_POST['price'])){
        $json['success'][] = "Success";
         echo json_encode($json);
         exit;
    }
    else{
        $json['error'][] = "Price field cannot contain non numerice values.";
         echo json_encode($json);
         exit;
    }
        
}
if(isset($_GET['q'])){
    $factory = new factory();
    $factory->set_sku($_GET['q']);
    $result=$factory->check_sku();
    echo $result;
}
?>