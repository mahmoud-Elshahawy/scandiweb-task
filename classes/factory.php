<?php
require_once("database.php");
include('products.php');
$rows=[];
class Factory extends product{
    public function load(){
        global $database,$rows;
        $sql="SELECT * FROM products WHERE 1 ORDER BY ID DESC";
        $result=$database->query($sql);
        $array=[];
        while($rows=mysqli_fetch_array($result)){
            $this->set_type($rows['type']);
            $type=$this->find_type();
            $element=$type->prepare();
            array_push($array,$element);
        }
        return $array;
    }public function delete_products($products){
        global $database;
        $sql="DELETE FROM products WHERE ID IN ($products)";
        $result=$database->query($sql);
        return $result;
    }
    public function check_sku(){
        global $database;
        $sql = "SELECT * FROM products WHERE sku ='".$database->escape_strings($this->sku)."'";
        $result=$database->query($sql);
        if(mysqli_num_rows($result)>0)
            return "Error";
        else
            return "Clear";
    }
      public function find_type()
    {
        $lookupArray = [    
            'dvd' => 'dvd',
            'furniture' => 'furniture',
            'book' => 'book'
        ];
            return new $this->type;
    }
}

class DVD extends product{
    protected $size;
    public function set_properties(){
        $this->size=$_POST['size'];
        if($this->size==0)
            return 0;
        else
            return 1;
    }
    public function save_product(){
        global $database;
        $sql="INSERT INTO products";
        $sql.="(`name`, `price`, `sku`, `type`,`size`) VALUES ('";
        $sql.=$database->escape_strings($this->name)."', '";
        $sql.=$database->escape_strings($this->price)."', '";
        $sql.=$database->escape_strings($this->sku)."', '";
        $sql.=$database->escape_strings($this->type)."', '";
        $sql.=$database->escape_strings($this->size)."')";
        $database->query($sql);
    }
    public function prepare(){
        global $rows;
        $this->set_id($rows['ID']);
        $this->set_name($rows['name']);
        $this->set_price($rows['price']);
        $this->set_sku($rows['sku']);
        $this->size=$rows['size'];
        return "<div class='col-sm-3'><div class='products'><input type='checkbox' class='delete-checkbox' data-product-id='$this->id'><p>".$this->sku."</p><p>".$this->name."</p><p>".$this->price." $</p><p> Size: ".$this->size."MB </p></div></div>";
    }
    
}
class Furniture extends product{
    protected $width;
    protected $height;
    protected $length;
    
    public function set_properties(){
        $this->width=$_POST['width'];
        $this->height=$_POST['height'];
        $this->length=$_POST['length'];
        if($this->width==0 || $this->height==0 || $this->length==0 )
            return 0;
        else
            return 1;
    }
    public function save_product(){
        global $database;
        $sql="INSERT INTO products";
        $sql.="(`name`, `price`, `sku`, `type`,`length`,`height`,`width`) VALUES ('";
        $sql.=$database->escape_strings($this->name)."', '";
        $sql.=$database->escape_strings($this->price)."', '";
        $sql.=$database->escape_strings($this->sku)."', '";
        $sql.=$database->escape_strings($this->type)."', '";
        $sql.=$database->escape_strings($this->length)."', '";
        $sql.=$database->escape_strings($this->height)."', '";
        $sql.=$database->escape_strings($this->width)."')";
        $database->query($sql);
    }
    public function prepare(){
        global $rows;
        $this->set_id($rows['ID']);
        $this->set_name($rows['name']);
        $this->set_price($rows['price']);
        $this->set_sku($rows['sku']);
        $this->length=$rows['length'];
        $this->height=$rows['height'];
        $this->width=$rows['width'];
        return "<div class='col-sm-3'><div class='products'><input type='checkbox' class='delete-checkbox' data-product-id='$this->id'><p>".$this->sku."</p><p>".$this->name."</p><p>".$this->price." $</p><p> Dimensions: ".$this->height."x".$this->width."x".$this->length."</p></div></div>";
    }
}
    
    class Book extends product{
    protected $weight;
    
        public function set_properties(){
        $this->weight=$_POST['weight'];
        if($this->weight==0)
            return 0;
        else
            return 1;
    }
        
        public function save_product(){
        global $database;
        $sql="INSERT INTO products";
        $sql.="(`name`, `price`, `sku`, `type`,`weight`) VALUES ('";
        $sql.=$database->escape_strings($this->name)."', '";
        $sql.=$database->escape_strings($this->price)."', '";
        $sql.=$database->escape_strings($this->sku)."', '";
        $sql.=$database->escape_strings($this->type)."', '";
        $sql.=$database->escape_strings($this->weight)."')";
        $database->query($sql);
    }
        public function prepare(){
        global $rows;
        $this->id=$rows['ID'];
        $this->name=$rows['name'];
        $this->sku=$rows['sku'];
        $this->price=$rows['price'];
        $this->weight=$rows['weight'];
        return "<div class='col-sm-3'><div class='products'><input type='checkbox' class='delete-checkbox' data-product-id='$this->id'><p>".$this->sku."</p><p>".$this->name."</p><p>".$this->price." $</p><p> Weight: ".$this->weight."KG </p></div></div>";
    }
    
}
?>