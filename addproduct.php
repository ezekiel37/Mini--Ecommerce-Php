<?php
?>

<head>
 <title>Scandiweb</title>

 <link rel="stylesheet" href="./src/style.css">
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 </head>
<body>
<form method="post" action="save_product.php" id="product_form">
<div class="formcontainer">
    <!-- button-->
<div class="header">
    <div>
    <h3>Product Add</h3>
    </div>
    <div>
   <button class="savebtn" id="submitbtn" type="submit" >Save</button>
   <button class="cancelbtn" id="cancel" type="button" >Cancel</button>
    </div>
</div>
<div class="line"></div>

<div>
    
        <label>Sku</label>
        <input id="sku" type="text" name="sku" />
        <small id="skuValid" >
        </small>
        <p style="display:none"id="skuflag">true</p> 
</div> 
<div>
    <label>Name</label>
    <input id="name" type="text" name="name" />
    <small id="nameValid" >
        </small>
</div>
<div>
    <label>Price($)</label>
    <input id="price" type="text" name="price"/>
    <small id="priceValid" >
        </small>
</div>   
<div class="switcher">
        <label>Type Switcher</label>
     
           <select name="select" id="productType">
             
              <option id="Dvd">Dvd</option>
              <option id="Furniture">Furniture</option>
              <option id="Book">Book</option>
           </select>
</div>  
<!-- --->    
<div class="product">
<div class="Dvd" >
   
       <label>Size (Mb)</label>
       <input id="size" type="text" name="size"/>
       <small id="sizeValid" >
        </small>
       <p> Please, provide size in mb </p>
</div>
<div class="Furniture">
   
       <label>Height (CM)</label>
       <input id="height" type="text" name="height"/></br>
       <small id="heightValid" >
        </small>
   
       <label>Width (CM)</label>
       <input id="width" type="text" name="width"/></br>
       <small id="widthValid">
        </small>
       <label>Length (CM)</label>
       <input id="length" type="text" name="length"/></br>
       <small id="lengthValid">
        </small>
      <p>Please, provide dimensions (HxWxL) in CM </p>
</div>
<div class="Book" >
    
       <label>Weight (Kg)</label>
       <input id="weight" type="text" name="weight" />
       <small id="weightValid">
        </small>
        <p>Please, provide weight in kg</p>
</div>
</div> 

</div>

</form>





<script>

$( document ).ready(function() {
    //handles product changes
$(".Book, .Furniture").hide()
$("#productType").on("change",function() {
   
    $(".Dvd, .Furniture, .Book").hide()
 $( "." + $(this).val()).show()
});
    //////////////////////////////////
    $("input").click(function(){
  $("small").hide();
});

//cancel button 
$('#cancel').on("click", function(){
  
    location.href = "./"
})
   //submit function
    $('#product_form').on("submit" , function(e) {
 
        e.preventDefault();
       // console .log("wow")
       var flag = true;
       var skuflag = $('#skuflag').text();
// validations
    if ($('#sku').val() == "") {
         $('#skuValid').text("please enter sku");  
        flag =false
       $("#skuValid").show();
    }
     else 
        {
            $("#skuvalid").hide();
        }
  // check sku uniqueness and save product


  var Data = {sku : $('#sku').val()}
  $.ajax({
        type: "POST",
        url: 'src/unique.php',
        data: Data,
    })
    .done(function (response) {
     if (response == 1){
     
    
       $('#skuValid').text("sku must be unique"); 
       $("#skuValid").show();
      
    
     } else{
       
         saveProduct();
     
     }
     
    })
    .fail(function () {
     
  
    });   
// end sku uniqueness

//name validation
     if (!$('#name').val()) {
         $('#nameValid').text("please enter  name");  
         $("#nameValid").show();
       flag =false
    }else {
        $('#nameValid').hide();
    }
//end name validation

function checkerror(product){

    if ($('#'+product).is(':visible') && $('#' + product).val() == '') {
        $('#'+ product + 'Valid').text("please enter" + ' ' +product);  
       $('#' + product + 'Valid').show();
        flag =false
    }else if($('#'+product).is(':visible') && !parseFloat($("#" +product).val())){
        $('#'+ product + 'Valid').text("please enter an amount in $");  
       $('#' + product + 'Valid').show();
       flag =false   
     }
     else{
        $('#'+ product + 'Valid').hide();  
     }

    }
   arr = [ 'price' , 'size', 'height' ,'width', 'length', 'weight'];
   $( arr ).each(function( index ) {

  checkerror(arr[index]);
});
////////////////////////////////

function saveProduct() {
 if (flag){
  
    $.ajax({
        type: "POST",
        url: 'src/save_product.php',
        data: $('#product_form').serialize(),
    })
    .done(function (success) {
      location.href = "./"
     
    })
    .fail(function () {
   
    }); 
  }
}
});
//end submit function

});

</script>
</body>
