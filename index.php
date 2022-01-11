<?php require_once("classes/factory.php");
?>
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Product List</title>
</head>
<body>
    <div class="container-fluid">
    <div class="row"><div class="col-sm-4"><h3> Product List</h3></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-2">
            <div class="col-sm-12"><button type="button" id="add">ADD</button></div>
            </div><div class="col-sm-2">
            <div class="col-sm-12"><button type="button" id="delete-product-btn">MASS DELETE</button></div>
            </div><hr></div>
        <div class="row"><?php
            $factory=new factory();
            $result=$factory->load();
            foreach($result as $element){
                echo $element;
            }
            ?></div>
</div>
</body>
<script src="scripts.js"></script>