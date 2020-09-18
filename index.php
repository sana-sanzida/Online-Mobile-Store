<?php
include ("connect.php");
ob_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>add-products</title>
  </head>
  <body>

  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-md-12">
  				<div class="card">
  					<div class="card-header" style="background: #4e73df; color:white;">
  						<h2 class="text-center"> ADD PRODUCTS</h2>
  					</div>
  					<div class="card-body">
  						<!-- input products -->
  <form method="POST" enctype="multipart/form-data">
  <div class="form-group" >
    <label for="">Product-Name</label>
    <input type="text" name="p-name" class="form-control" id="exampleInputEmail1"  placeholder="Enter product-name " required>
    </div>

    <div class="form-group">
    <label for="">Price</label>
    <input type="number" name="price" class="form-control" id="exampleInputEmail1"  placeholder="Enter price " required>
    </div>
    <div class="form-group">
    <label for="">Model</label>
    <input type="text" name="model" class="form-control" id="exampleInputEmail1"  placeholder="Enter model" >
    </div>
    <div class="form-group">
    <label for="">Brand</label>
    <input type="text" name="brand" class="form-control" id="exampleInputEmail1"  placeholder="Enter Brand ">
    </div  required>
    <div class="form-group">
    <label for="">Availability</label>
    <input type="text" name="availability" class="form-control" id="exampleInputEmail1"  placeholder="Enter Availability"  required>
    </div>
    <div class="form-group">
    <label for="">weight</label>
    <input type="text" name="weight" class="form-control" id="exampleInputEmail1"  placeholder="Enter weight" required>
    </div>
    <div class="form-group">
    <label for="">Dimensions(LxWxH)</label>
    <input type="text" name="dimension" class="form-control" id="exampleInputEmail1"  placeholder="Enter Dimensions ">
    </div>
    <div class="form-group">
    <label for=""> Processor </label>
    <input type="text" name="processor" class="form-control" id="exampleInputEmail1"  placeholder="Enter Processor ">
    </div>
    <div class="form-group">
    <label for="">Network-Standard</label>
    <input type="text" name="network" class="form-control" id="exampleInputEmail1"  placeholder="Enter Network-Standard "
    </div>
    <div class="form-group">
    <label for="">Memory</label>
    <input type="text" name="memory" class="form-control" id="exampleInputEmail1"  placeholder="Enter Memory" required>
    
    </div>
    <div class="form-group">
    <label for="">Screen-Parameter</label>
    <input type="text" name="screen" class="form-control" id="exampleInputEmail1"  placeholder="Enter Screen-Parameter " required>
    </div>
    <div class="form-group">
    <label for="">Camera</label>
    <input type="text" name="camera" class="form-control" id="exampleInputEmail1"  placeholder="Enter Camera" required>
    </div>
    <div class="form-group">
    <label for="">Battery</label>
    <input type="text" name="battery"  class="form-control" id="exampleInputEmail1"  placeholder="Enter Battery" required>
    </div>
    <div class="form-group">
    <label for="">Sensors</label>
    <input type="text" name="sensors" class="form-control" id="exampleInputEmail1"  placeholder="Enter sensors ">
    
    </div>
    <div class="form-group">
    <label for="">Operating-System</label>
    <input type="text" name="operating" class="form-control"  placeholder="Enter Operating-System"  required>
    </div>
    <div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image" class="form-control"   placeholder="Enter Image ">
    </div>
  
  
  <button type="submit" name="sbt" class="btn btn-primary">Submit</button>
</form>
<?php
if(isset($_POST['sbt'])){
                $pname =  $_POST['p-name'];
                $Price =  $_POST['price'];
                $model = $_POST['model'];
                $brand = $_POST['brand'];
                $availability = $_POST['availability'];
                $weight = $_POST['weight'];
                $dimension = $_POST['dimension'];
                $processor = $_POST['processor'];
                $network = $_POST['network'];
                $memory = $_POST['memory'];
                $screen = $_POST['screen'];
                $camera = $_POST['camera'];
                $battery = $_POST['battery'];
                $sensor = $_POST['sensors'];
                $operating = $_POST['operating'];
                
                $image = $_FILES['image']['name'];
                $image_size = $_FILES['image']['size'];
                $image_tmp = $_FILES['image']['tmp_name'];
                echo $image;
                $extn = strtolower(end(explode(".", $image)));
                $extensions = array("jpg","png","jpeg");
                if(in_array($extn,$extensions, TRUE)){
                    $random = rand(0,500);
                    $update_image_name = $random."_".$image;
                    move_uploaded_file($image_tmp,"img/".$update_image_name);
                    // send the info into the database
                    $query= "INSERT INTO add_products (name, price, model, brand, availability, Weight, Dimensions, Processor, Network_Standard, Memory, Screen_Parameter, Camera, Battery, Sensors, Operating_System, Image) VALUES ('$pname','$Price',' $model',' $brand','$availability','$weight','$dimension','$processor','$network','$memory','$screen','$camera','$battery','$sensor','$operating','$update_image_name') ";
                    $result = mysqli_query($db,$query);
                    if($result){
                        header('Location: index.php');
                    }
                    else {
                        echo "Add products has an error";
                    }
                
                }
                else{
                    echo "This is not an image";

                	

                }

}
	?>
  						
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>

    

  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php
    ob_end_flush();
    ?>
  </body>
</html>
