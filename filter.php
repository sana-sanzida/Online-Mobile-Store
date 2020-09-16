<?php

include ("connect.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title> FILTER_PRODUCTS </title>
    <style type="text/css">
    

      .card_check{
        border: 3px solid red;
      }

      .compare{
        font-weight: 600; color: blue; cursor: pointer;
      }
      img{
        object-fit: cover;
      }
    </style>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/path/to/jquery-ui.css">

<script src="/path/to/jquery.min.js"></script>

<script src="/path/to/jquery-ui.min.js"></script>

<link rel="stylesheet" href="price_range style.css">

<script src="price_range_script.js"></script>
<link rel="stylesheet" type="text/css" href="./price_range_style.css"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <h3 class="text-center text-light bg-info p-2">FILTER PRODUCTS</h3>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3">
          <h3 class="text-center" > Filter here</h3>
          <hr>
          <div class="list-group">
            <h3>Price</h3>
            <input type="hidden" id="hidden_minimum_price" value="0" />
            <input type="hidden" id="hidden_maximum_price" value="120000" />
            <p id="price_show"> 10000-80000 </p>
            <div id="price_range"></div>
            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
          </div>
          <h4 class="text-info">Select Brand</h4>
          <ul class="list-group">
            <?php
          
$query = "SELECT DISTINCT brand FROM add_products ORDER BY brand";
$user = mysqli_query($db,$query);
while($row = mysqli_fetch_assoc($user))
{
  ?>
  <li class="list-group-item">
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input product_check" value= "<?php echo $row['brand']; ?>" id="brand"> 
        <?php echo $row['brand']; ?> 
      </label>
      </div>
    </li>
  <?php
}
?>
          </ul>

           <h4 class="text-info py-2">Select Camera</h4>
          <ul class="list-group">
            <?php
          
$query = "SELECT DISTINCT Camera FROM add_products ORDER BY Camera";
$user = mysqli_query($db,$query);
while($row = mysqli_fetch_assoc($user))
{
  ?>
  <li class="list-group-item">
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input product_check" value= "<?php echo $row['Camera']; ?>" id="camera"> 
        <?php echo $row['Camera']; ?> 
      </label>
      </div>
    </li>
  <?php
}
?>
          </ul> 

              <h4 class="text-info py-2">Select Battery</h4>
          <ul class="list-group">
            <?php
          
$query = "SELECT DISTINCT Battery FROM add_products ORDER BY Battery";
$user = mysqli_query($db,$query);
while($row = mysqli_fetch_assoc($user))
{
  ?>
  <li class="list-group-item">
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input product_check" value= "<?php echo $row['Battery']; ?>" id="battery"> 
        <?php echo $row['Battery']; ?> 
      </label>
      </div>
    </li>
  <?php
}
?>
          </ul> 

           <h4 class="text-info py-2">Select Operating system</h4>
          <ul class="list-group">
            <?php
          
$query = "SELECT DISTINCT Operating_System FROM add_products ORDER BY Operating_System";
$user = mysqli_query($db,$query);
while($row = mysqli_fetch_assoc($user))
{
  ?>
  <li class="list-group-item">
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input product_check" value= "<?php echo $row['Operating_System']; ?>" id="OS"> 
        <?php echo $row['Operating_System']; ?> 
      </label>
      </div>
    </li>
  <?php
}
?>
          </ul> 

        </div>
        <div class="col-lg-9">

          <h3 class="text-center" id="textChange">All products</h3>
          <hr>
             <div class="row" id="btn_compare" style="display:none;">
        <div class="col-lg-12" style="margin-top: 50px;">
          <form action="compare.php" method="post">
               <input type="hidden" value="" id="card_one" name="card_one"/>
               <input type="hidden" value="" id="card_two" name="card_two"/>
               <input type="hidden" value="" id="card_three" name="card_three"/>
               <input type="submit" value="Compare_product" class="btn btn-success" style="float:right;"/>
           </form>
        </div>  
      </div>
          <div class="text-center">
            <img src="img/loader.png" id="loader" width="200" style="display:none">
          </div>
          <div class="row" id="result">
            <?php
            $query = "SELECT * FROM add_products";
$user = mysqli_query($db,$query);
while($row = mysqli_fetch_assoc($user))
{
            ?>
            <div class="col-md-3 mb-2 ">
              <div class="compare_card<?php echo $row['product_id']; ?>">
                <div class="card border-secondary ">
                  <img src="img/<?php echo $row['Image']; ?>" 
                  class="card-img-top h-25" width="60px;">
                 <!--
                  <div class="card-img-overlay">
                    <h6 style="margin-top:190px;" class="text-light bg-info text-center rounded p-1">
                     <?php echo $row['name']; ?> 
                    </h6>
                    <br>
                  </div>
                -->
                  <div class="card-body ">
                    <h4 class="card-title text-danger">Price: <?php echo number_format($row['price']); ?>/- </h4>
                    <p>
                      <b>NAME: </b> <?php echo $row['name']; ?> <br>
                      <b> BRAND:</b> <?php echo $row['brand']; ?> <br>
              
                      <b>CAMERA: </b> <?php echo $row['Camera']; ?> <br>
                     <b> OS:  </b> <?php echo $row['Operating_System']; ?> <br>
                      
                    </p>
                    <button style="color: #fff;" class="btn btn-success btn-block compare" rel="<?php echo $row['product_id']; ?>">Compare</button>
                    <a href="#" class="btn btn-success btn-block"> ADD to cart</a>
                    
                  </div>
                  
                </div>
              </div>  
            </div>
            <?php
             
             }

             ?>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.compare',function(){
            var id = $(this).attr('rel');
            var size_class = $('.card_check').length;
            if(size_class > 1)
            {
                if($(".compare_card"+id).hasClass("card_check"))
                {
                    
                    $(".compare_card"+id).removeClass("card_check");
                    
                }
                else
                {
                    alert("You have already select maximum product");
                }
               
            }
            else
            {
                if(size_class>0)
                {
                     $('#btn_compare').show();
                }
                
                if($(".compare_card"+id).hasClass("card_check"))
                {
                    $(".compare_card"+id).removeClass("card_check");
                }
                else
                {
                    $(".compare_card"+id).addClass("card_check");
                    
                    var pro1 = $('#card_one').val();
                    var pro2 = $('#card_two').val();
                    
                    if(pro1=="")
                    {
                        $('#card_one').val(id);
                    }
                    else if(pro2=="")
                    {
                        $('#card_two').val(id);
                    }
                    
                }
            }
             
           }); 
    $(".product_check").click(function(){
       $("#loader").show();
       var action = 'data';
       var minimum_price = $('#hidden_minimum_price').val();
       var maximum_price = $('#hidden_maximum_price').val();
       var brand  = get_filter_text('brand');
       var camera = get_filter_text('camera');
       var battery = get_filter_text('battery');

       $.ajax({
        url:'action.php',
        method:'POST',
        data:{action:action,brand:brand,camera:camera,battery:battery},
        success:function(response){
          $("#result").html(response);
          $("#loader").hide();
          $("#textChange").text("FILTERED_PRODUCTS");
        }
       });


    });
    function get_filter_text(text_id){
      var filterData=[];
      $('#'+text_id+':checked').each(function(){
       filterData.push($(this).val()); 
      });
      return filterData;
    }
  });
</script>
   
  </body>
</html>