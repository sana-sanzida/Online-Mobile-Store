
<?php 
$con = mysqli_connect('localhost','root','','codingmantra_tutorial');
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

      .card_check{
        border: 3px solid red;
      }

    	.compare{
    		font-weight: 600; color: blue; cursor: pointer;
    	}
    </style>
  </head>
  <body>
  	<div class="container">
  	

      <div class="row" id="btn_compare" style="display:none;">
        <div class="col-sm-12" style="margin-top: 50px;">
          <form action="compare.php" method="post">
               <input type="hidden" value="" id="card_one" name="card_one"/>
               <input type="hidden" value="" id="card_two" name="card_two"/>
               <input type="submit" value="Compare_product" class="btn btn-success" style="float:right;"/>
           </form>
        </div>  
      </div>


  		<div class="row" style="margin-top: 50px;">
  			<?php
				$sql = "select * from compare_data";
				$query = mysqli_query($con, $sql);
				while($row = mysqli_fetch_array($query))
				{
			?>
  			<div class="col-sm-3" style="margin-bottom: 30px; padding: 5px;">
  				<div class="card compare_card<?php echo $row['id']; ?>">
	  				<p style="color: blue; font-weight: 600;"><?php echo $row['name']; ?></p>
	  				<p style="color: green;">Rs.<?php echo $row['price']; ?></p>
	  				<button style="color: #fff;" class="btn btn-primary btn-xs compare" rel="<?php echo $row['id']; ?>">Compare</button>
  				</div>
  			</div>	
  			<?php 
  				} 
  			?>
  		</div>
  	</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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

       });
    </script>
  </body>
</html>
