<?php

include ("connect.php");
if(isset($_POST['action'])){
	$query = "SELECT * FROM products where brand !='' ";
	if (isset($_POST['brand'])) {
      
      $brand = implode("','" , $_POST['brand']);
      $query.="AND brand IN('".$brand."')";
	}

	if (isset($_POST['camera'])) {
      
      $camera = implode("','" , $_POST['camera']);
      $query.="AND camera IN('".$camera."')";
	}
	if (isset($_POST['battery'])) {
      
      $battery = implode("','" , $_POST['battery']);
      $query.="AND battery IN('".$battery."')";
  }

  $result = mysqli_query($db,$query);
 
         $output='';
        $count = mysqli_num_rows($result); 
          
           if ($count >0) 
              { 
                 while($row = mysqli_fetch_assoc($result))
                 {
                 	$output .='<div class="col-md-3 mb-2">
              <div class="card-deck">
                <div class="card border-secondary">
                  <img src="img/'. $row['Image'].'" 
                  class="card-img-top h-25" width="60px;">
                  <div class="card-img-overlay">
                    <h6 style="margin-top:190px;" class="text-light bg-info text-center rounded p-1">
                     '. $row['name'].' 
                    </h6>
                    <br>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title text-danger">Price: '. number_format($row['price']).'/- </h4>
                    <p>
                      Brand: '. $row['brand'].' <br>
                      Memory: '. $row['Memory'].' <br>
                      Camera: '.  $row['Camera'].' <br>
                      
                    </p>
                    <a href="#" class="btn btn-success btn-block"> ADD to cart</a>
                    
                  </div>
                  
                </div>
              </div>  
            </div>';
                 }
              } 
        else{
        	$output=" <h3> No Products Found!</h3>";
        }
        	echo $output;
        
    
}
?>