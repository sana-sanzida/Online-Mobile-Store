<?php

include ("connect.php");
if(isset($_POST['action'])){
  $query = "SELECT * FROM add_products where brand !='' ";
  if (isset($_POST['brand'])) {
      
      $brand = implode("','" , $_POST['brand']);
      $query.="AND brand IN('".$brand."')";
  }

  if (isset($_POST['camera'])) {
      
      $camera = implode("','" , $_POST['camera']);
      $query.="AND camera IN('".$camera."')";
  }
      if (isset($_POST['os'])) {
      
      $os = implode("','" , $_POST['os']);
      $query.="AND Operating_System IN('".$os."')";
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
                  $output .= '          <div class="row" id="btn_compare" style="display:none;">
        <div class="col-lg-12" style="margin-top: 50px;">
          <form action="compare.php " method="post">
               <input type="hidden" value="" id="card_one" name="card_one"/>
               <input type="hidden" value="" id="card_two" name="card_two"/>
               <input type="hidden" value="" id="card_three" name="card_three"/>
               <input type="submit" value="Compare_product" class="btn btn-success" style="float:right;"/>
           </form>
        </div>  
      </div>
      <div class="col-md-3 mb-2 ">
              <div class="compare_card'. $row['product_id'].'">
                <div class="card border-secondary ">
                  <img src="img/'.$row['Image'].'"
                  class="card-img-top h-25" width="60px;">
             
                  <div class="card-body ">
                    <h4 class="card-title text-danger">Price: '. number_format($row['price']) .'/- </h4>
                    <p>
                      <b>NAME: </b> '.$row['name'].' <br>
                      <b> BRAND:</b> '.$row['brand'].' <br>
              
                      <b>CAMERA: </b> '.$row['Camera'].' <br>
                     <b> OS:  </b> '.$row['Operating_System'].' <br>
                      
                    </p>
                    <button style="color: #fff;" class="btn btn-success btn-block compare" rel=" '.$row['product_id'].'">Compare</button>
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

