<?php 
include('classes/database.php');
?>
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Add Product</title>
</head>
<body>
    <div class="container-fluid">
    <div class="row"><div class="col-sm-4"><h3> Product Add</h3></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-2">
            <div class="col-sm-12"><button type="button" id="submit_btn">Save</button></div>
            </div><div class="col-sm-2">
            <div class="col-sm-12"><button type="button" id="cancel_btn">Cancel</button></div>
            </div><hr></div>
    <form method="POST" id="product_form" enctype="multipart/form-data" name="product_form">
    
    <div class="form-group row">
    <label for="sku" class="col-sm-2 col-form-label">SKU</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="sku" placeholder="SKU" name="sku" onchange="showHint(this.value)">
    </div>
</div>
    <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">NAME</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="name" placeholder="Name" name="name">
    </div>
    </div>
    <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="price" placeholder="PRICE" name="price" onchange="pricetest(this.value)">   
    </div></div>
    <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label">Type Switcher</label>
    <div class="col-sm-8">
      <select id="productType" onchange="myfunction()" name="productType">
      <option value="">Please select one of the following</option>
      <option value="dvd" id="DVD">DVD</option>
      <option value="Furniture" id="Furniture">FURNITURE</option>    
      <option value="Book" id="Book">BOOK</option>    
        </select>
    </div>
    <div class="col-sm-12 types" id="types"></div>
</div>
    </form>
</div>
</body>
<script src="scripts.js"></script>