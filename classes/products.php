<?php
abstract class product{
    protected $name;
    protected $sku;
    protected $price;
    protected $id;
     public function set_sku($sku){
        $this->sku=$sku;
         if($this->sku=="")
             return 0;
         else
             return 1;
    }public function set_type($type){
        $this->type=$type;
         if($this->type=="")
             return 0;
         else
             return 1;
    }public function set_name($name){
        $this->name=$name;
         if($this->name=="")
             return 0;
         else
             return 1;
    }public function set_price($price){
        $this->price=$price;
         if($this->price=="")
             return 0;
         else
             return 1;
    }public function set_id($id){
        $this->id=$id;
    }
}
?>