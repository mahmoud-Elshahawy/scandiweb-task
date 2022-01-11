$('#submit_btn').on('click', function(e){
    e.preventDefault();
    let name = document.forms["product_form"]["name"].value;
    let price = document.forms["product_form"]["price"].value;
    let sku = document.forms["product_form"]["sku"].value;
    let size = $('#size').val();
    let weight = $('#weight').val();
    let length = $('#length').val();
    let width = $('#width').val();
    let height = $('#height').val();
    let type = $('#productType').val();
    $.ajax({
      url: 'config.php',
      type: 'POST',
      data: {
        'save': 1,
        'name': name,
        'price': price,
        'sku': sku,
        'size': size,
        'weight': weight,
        'height': height,
        'length': length,
        'width': width,
        'type': type
      },success: function(json){
          console.log(json)
          let check=JSON.parse(json);
          if(check.success) {
              window.location.href = 'http://localhost/scandiweb/';
          }else if(check.error)
          alert(check.error);
      }
    })});
$('#cancel_btn').on('click', function(){
    window.location.href = 'http://localhost/scandiweb/';
});
$('#add').on('click', function(){
    window.location.href = 'http://localhost/scandiweb/add-product.php';
});

 function myfunction(){
        var type=document.getElementById("productType");
        if (type.value=="dvd"){
            document.getElementById('types').innerHTML="<div class='form-group row'><h4>Please, Provide size</h4>"+
    "<label for='size' class='col-sm-2 col-form-label'>Size (MB)</label>"+
    "<div class='col-sm-8'>"+
    "<input type='number' class='form-control' id='size' placeholder='SIZE' name='size' required>" + 
    "</div></div>";
    }
    else if (type.value=="Furniture"){
            document.getElementById('types').innerHTML="<div class='form-group row'><h4>Please, Provide dimensions</h4>"+
    "<label for='height' class='col-sm-2 col-form-label'>Height (CM)</label>"+
    "<div class='col-sm-8'>"+
    "<input type='number' class='form-control' id='height' placeholder='Height' name='height' required>" + 
    "</div></div>"+"<div class='form-group row'>"+
    "<label for='width' class='col-sm-2 col-form-label'>Width (CM)</label>"+
    "<div class='col-sm-8'>"+
    "<input type='number' class='form-control' id='width' placeholder='Width' name='width' required>" + 
    "</div></div>"+"<div class='form-group row'>"+
    "<label for='length' class='col-sm-2 col-form-label'>Length (CM)</label>"+
    "<div class='col-sm-8'>"+
    "<input type='number' class='form-control' id='length' placeholder='Length' name='length' required>" + 
    "</div></div>";
    }
    else if(type.value="book"){
        document.getElementById('types').innerHTML="<div class='form-group row'><h4>Please, Provide weight</h4>"+
    "<label for='weight' class='col-sm-2 col-form-label'>Weight (KG)</label>"+
    "<div class='col-sm-8'>"+
    "<input type='number' class='form-control' id='weight' placeholder='Weight' name='weight' required>" + 
    "</div></div>";
    }
    else
    document.getElementById('types').innerHTML="";
    }

function showHint(str) {
  if (str.length == 0) {
    document.getElementById("sku").innerHTML = "";
    return;
  } else {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("sku").innerHTML = this.responseText;
        if(this.responseText=="Error"){
            alert("This SKU already exist please provide unique one");
            $("#submit_btn").prop('disabled', true);}
        else
            $("#submit_btn").prop('disabled', false);
        console.log(this.responseText);
    }
  xmlhttp.open("GET", "config.php?q=" + str);
  xmlhttp.send();
  }
}
function pricetest(str) {
  if (str.length == 0) {
    document.getElementById("price").innerHTML = "";
    return;
  } else {
      let price = document.forms["product_form"]["price"].value;
    $.ajax({
      url: 'config.php',
      type: 'POST',
      data: {
        'pricetest': 1,
          'price':price
      },success: function(json){
          console.log(json);
          let check=JSON.parse(json);
          if(check.success) {
              $("#submit_btn").prop('disabled', false);
          }else if(check.error){
              alert("Price field cannot contain non numerice values.");
            $("#submit_btn").prop('disabled', true);
          }
      }
    })
  }
}
$('#delete-product-btn').on('click', function(e) { 
	var products = [];  
	$(".delete-checkbox:checked").each(function() {  
		products.push($(this).data('product-id'));
	});	
	if(products.length <=0)  {  
		alert("Please select records.");  
	}
    else if(products.length>0){
    var selected_values = products.join(","); 
        $.ajax({ 
				type: "POST",  
				url: "config.php",  
				cache:false,  
				data: 'product_id='+selected_values,  
				success: function() {	
                    			window.location.href = 'http://localhost/scandiweb/';					
				}   
			});
    }
});