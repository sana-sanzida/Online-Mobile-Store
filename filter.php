<?php

include ("connect.php");
$minimum_range = 3000;
$maximum_range = 200000;
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
  
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>


  <body>
    <h3 class="text-center text-light bg-info p-2">FILTER PRODUCTS</h3>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3">
          <h3 class="text-center" > Filter here</h3>
          <hr>
          <div class="list-group">


            <h3 align="center">Price Range</a></h3><br />
      <br />
      <div class="">
        <div class="">
          <input type="text" name="minimum_range" id="minimum_range" class="form-control" value="<?php echo $minimum_range; ?>" />
        </div>
        <div class="" style="padding-top:12px; padding-bottom:12px">
          <div id="price_range"> <br> <br> <br></div>
        </div>
        <div class="">
          <input type="text" name="maximum_range" id="maximum_range" class="form-control" value="<?php echo $maximum_range; ?>" />
        </div>
      </div>
      <br />
      <div id="load_product"></div>
      <br />
    </div>
           
      <!--  <div>

  <div class="sliderText"><h3>Price Range</h3></div>

  <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

  <div style="margin:30px auto">
    <input type="number" min=0 max="60000" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
    <input type="number" min=0 max="200000" oninput="validity.valid||(value='200000');" id="max_price" class="price-range-field" />
  </div>

  <button class="price-range-search" id="price-range-submit">Search</button>

  <div id="searchResults" class="search-results-block"></div>

</div>
-->





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
        <input type="checkbox" class="form-check-input product_check" value= "<?php echo $row['Operating_System']; ?>" id="os"> 
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
          <form action="compare.php " method="post">
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
                  class="card-img-top h-25" width="100px;">
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

    $( "#price_range" ).slider({
    range: true,
    min: 1000,
    max: 200000,
    values: [ <?php echo $minimum_range; ?>, <?php echo $maximum_range; ?> ],
    slide:function(event, ui){
      $("#minimum_range").val(ui.values[0]);
      $("#maximum_range").val(ui.values[1]);

      load_product(ui.values[0], ui.values[1]);
    }
  });
  
  load_product(<?php echo $minimum_range; ?>, <?php echo $maximum_range; ?>);
  
  function load_product(minimum_range, maximum_range)
  {
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{minimum_range:minimum_range, maximum_range:maximum_range},
      success:function(data)
      {
        $('#load_product').fadeIn('slow').html(data);
      }
    });
  }

  



    $(document).on('click','.compare',function(){
            var id = $(this).attr('rel');
            var size_class = $('.card_check').length;
            if(size_class > 2)
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
                    var pro3 = $('#card_three').val();
                    
                    if(pro1=="")
                    {
                        $('#card_one').val(id);
                    }
                    else if(pro2=="")
                    {
                        $('#card_two').val(id);
                    }
                      else (pro3=="")
                    {
                        $('#card_three').val(id);
                    }
                    
                }
            }
             
           }); 
    $(".product_check").click(function(){
       $("#loader").show();

       var action = 'data';
       var brand  = get_filter_text('brand');
       var camera = get_filter_text('camera');
       var battery = get_filter_text('battery');
        var os     = get_filter_text('os');

       $.ajax({
        url:'action.php',
        method:'POST',
        data:{action:action,brand:brand,camera:camera,battery:battery,os:os},
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
  }) ;
</script>
   
  </body>
</html>