<?php 
include ("connect.php");

$productOne = $productTwo ='';

$productThree ='';

$productOne = $_REQUEST['card_one'];
$productTwo = $_REQUEST['card_two'];
$productThree = $_REQUEST['card_three'];


$pro1_sql = "select * from add_products where product_id= $productOne";
$pro1_query = mysqli_query($db, $pro1_sql);

$pro2_sql = "select * from add_products where product_id='".$productTwo."'";
$pro2_query = mysqli_query($db, $pro2_sql);

$pro3_sql = "select * from add_products where product_id ='".$productThree."'";
$pro3_query = mysqli_query($db, $pro3_sql);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Compare Product Using Jquery & PHP</title>

    <style>
    	.card{
    		border: 2px solid #ccc; border-radius: 3px; padding: 10px;

       
    	}
    </style>
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-sm-6" style="margin-top: 30px;">
  				<h2>Compare Product List</h2>
  			</div>
        <div class="col-sm-6" style="margin-top: 30px;">
          <a href="filter.php" style="text-align: right;"><h2>Back</h2></a>
        </div>	
  		</div>

  		<div class="row" style="margin-top: 50px;">
        <?php
  			while($row = mysqli_fetch_assoc($pro1_query))
{
            ?>

  			<div class="col-sm-4" style="margin-bottom: 30px; padding: 5px;">
          <div class="card">
            <h3 style="text-align: center; background: #ccc; width: 100%; padding: 10px;">Product One</h3>
  				  <h4><b style="color:blue;" >NAME: </b><?php echo  $row['name']; ?></h4>
            <p><b style="color:blue;">PRICE: </b><?php echo $row['price'];?> /- </p>

                     <p> <b style="color:blue;"> BRAND:</b> <?php echo $row['brand']; ?> <br> </p>
                      
                      <p> <b style="color:blue;" >CAMERA: </b> <?php echo $row['Camera']; ?> <br> </p>
                    <p> <b style="color:blue;" > OS:  </b> <?php echo $row['Operating_System']; ?> <br></p>
                     <p><b style="color:blue;" > BATTERY:  </b> <?php echo $row['Battery']; ?> <br></p>
                     <p><b style="color:blue;" > SCREEN_PARAMETER:  </b> <?php echo $row['Screen_Parameter']; ?> <br></p>
                    <p> <b style="color:blue;" > MEMORY:  </b> <?php echo $row['Memory']; ?> <br></p>
                     <p><b style="color:blue;" > WEIGHT:  </b> <?php echo $row['Weight']; ?> <br></p>
                     <p><b style="color:blue;" > AVAILABILITY:  </b> <?php echo $row['availability']; ?> <br></p>
            
  			</div>
        </div>

        <?php
      }
      ?>


            <?php
        while($row = mysqli_fetch_assoc($pro2_query))
{
            ?>

        <div class="col-sm-4" style="margin-bottom: 30px; padding: 5px;">
          <div class="card">
            <h3 style="text-align: center; background: #ccc; width: 100%; padding: 10px;">Product TWo</h3>
            <h4><b style="color:blue;" >NAME: </b><?php echo  $row['name']; ?></h4>
            <p><b style="color:blue;">PRICE: </b><?php echo $row['price'];?> /- </p>

                     <p> <b style="color:blue;"> BRAND:</b> <?php echo $row['brand']; ?> <br> </p>
                      
                      <p> <b style="color:blue;" >CAMERA: </b> <?php echo $row['Camera']; ?> <br> </p>
                    <p> <b style="color:blue;" > OS:  </b> <?php echo $row['Operating_System']; ?> <br></p>
                     <p><b style="color:blue;" > BATTERY:  </b> <?php echo $row['Battery']; ?> <br></p>
                     <p><b style="color:blue;" > SCREEN_PARAMETER:  </b> <?php echo $row['Screen_Parameter']; ?> <br></p>
                    <p> <b style="color:blue;" > MEMORY:  </b> <?php echo $row['Memory']; ?> <br></p>
                     <p><b style="color:blue;" > WEIGHT:  </b> <?php echo $row['Weight']; ?> <br></p>
                     <p><b style="color:blue;" > AVAILABILITY:  </b> <?php echo $row['availability']; ?> <br></p>
          </div>
        </div>
            <?php
      }
      ?>	
        
            <?php
        while($row = mysqli_fetch_assoc($pro3_query))
{
            ?>

        <div class="col-sm-4" style="margin-bottom: 30px; padding: 5px;">
          <div class="card">
            <h3 style="text-align: center; background: #ccc; width: 100%; padding: 10px;">Product Three</h3>
            <h4><b style="color:blue;" >NAME: </b><?php echo  $row['name']; ?></h4>
            <p><b style="color:blue;">PRICE: </b><?php echo $row['price'];?> /- </p>

                     <p> <b style="color:blue;"> BRAND:</b> <?php echo $row['brand']; ?> <br> </p>
                      
                      <p> <b style="color:blue;" >CAMERA: </b> <?php echo $row['Camera']; ?> <br> </p>
                    <p> <b style="color:blue;" > OS:  </b> <?php echo $row['Operating_System']; ?> <br></p>
                     <p><b style="color:blue;" > BATTERY:  </b> <?php echo $row['Battery']; ?> <br></p>
                     <p><b style="color:blue;" > SCREEN_PARAMETER:  </b> <?php echo $row['Screen_Parameter']; ?> <br></p>
                    <p> <b style="color:blue;" > MEMORY:  </b> <?php echo $row['Memory']; ?> <br></p>
                     <p><b style="color:blue;" > WEIGHT:  </b> <?php echo $row['Weight']; ?> <br></p>
                     <p><b style="color:blue;" > AVAILABILITY:  </b> <?php echo $row['availability']; ?> <br></p>
          </div>
        </div>
            <?php
      }
      ?>
  			
  	
  	</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
