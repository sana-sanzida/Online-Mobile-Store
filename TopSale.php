<?php
     /** Connection to database*/
	$con=mysqli_connect("localhost","root","","online_mobile_store");
	if($con===false)
	{
	  echo '<script type= "text/javascript"> alert ("Database Could not connect")</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Sale</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="full-body">
    <!-- header -->
        <header id="header">
            <div class="strip d-flex justify-content-between px-4 py-3" style="background-color: #60175B;">
                <p class="font-bletter font-size-12 text-black-50 m-0"></p>
                <div class="font-bletter font-size-35">
                    <a href="#" class="px-3 border-right border-left border-warning" style="color: #FFE600;">Login</a>
                    <a href="#" class="px-3 border-right border-warning" style="color: #FFE600;">Whishlist</a>
                </div>
            </div>

            <!-- Primary Navigation -->
            <nav class="navbar navbar-expand-lg bg-light">
                <a class="navbar-brand" href="TopSale.php"><a class="main-logo" style="color: #F8AF03;">O</a><a class="main-logo" style="color: #09057C;">nline&nbsp;</a> <a class="main-logo" style="color: #F8AF03;">M</a><a class="main-logo" style="color: #09057C;">obile&nbsp;</a> <a class="main-logo" style="color: #F8AF03;">S</a><a class="main-logo" style="color: #09057C;">tore&nbsp;</a>        </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav m-auto font-bletter font-size-20" style="float: right;">
                    <li class="nav-item active">
                      <a class="nav-link border-left" style="color: #1D8D55;" href="TopSale.php">Top Sale</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link border-left" style="color: #1D8D55;" href="#">Category</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link border-left" style="color: #1D8D55;" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link border-left" style="color: #1D8D55;" href="Blogs.php">Review Blogs</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link border-left" style="color: #1D8D55;" href="CreateBlog.php">Write Review Blog</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link border-left" style="color: #1D8D55;" href="#">Category</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link border-left border-right" style="color: #1D8D55;" href="#">Coming Soon</a>
                      </li>
                  </ul>
                  <form action="#" class="font-size-14 font-rale">
                      <a href="#" class="py-2 rounded-pill bg-secondary">
                        <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light">0</span>
                      </a>
                  </form>
                </div>
              </nav>
               <!-- !Primary Navigation -->

            <!-- title -->
            <div class="title-banner">
                <a class="title-banner-text">Top Selling Mobile</a>
            </div>
            <!-- !title -->

        </header>
    <!-- !header -->

        <main id="main-site">

          <!-- Top Sale -->
          <section id="special-price">
            <div class="container">
              
              <div class="grid">
                <?php
                    $count = 10;
                    $product_id = array();
                    $product_title= array();
                    $product_image= array();

                    $sql = "SELECT product_id, product_title, image_url, sale_count FROM products ORDER BY sale_count DESC LIMIT 10";
                    $query= mysqli_query($con,$sql);

                    if(mysqli_num_rows($query) > 0 )
                    {
                        while($info = mysqli_fetch_array($query))
                        {
                            $product_id[] = $info['product_id'];
                            $product_title[] = $info['product_title'];
                            $product_image[] = $info['image_url'];
                            //echo $info['image_url'];
                        }
                    }
                    else
                    {
                        echo '<script type= "text/javascript"> alert ("No Product Found")</script>';
                    }

                    for($i=0; $i<$count; $i++)
                    {
                ?>

                <div class="grid-item Apple border">
                 <div class="item py-2" style="width: 200px;">
                  <div class="product font-rale">
                    <a href=""><img src=<?php echo $product_image[$i] ?> alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                      <h6 style="font-family: blockletterregular;">#<?php echo $i+1 ?></h6>
                      <?php echo $product_title[$i] ?> <br>
                      <a class="btn btn-warning font-size-12" style="margin-top: 10px;">View Details</a>
                    </div>
                  </div>
                </div>
                </div>
                <?php 
                    } 
                ?>
                      
              </div>
            </div>
          </section>

          <?php

            $blog_id = array();
            $blog_title= array();
            $blog_cover= array();
            $blog_preview = array();
            $db = 'review_blog';

            $sql = "SELECT blog_id, blog_title, blog_cover, blog_preview FROM {$db}";
            $query= mysqli_query($con,$sql);

            if(mysqli_num_rows($query) > 0 )
            {
                while($in = mysqli_fetch_array($query))
                {
                $lim = mysqli_num_rows($query);
                $blog_id[] = $in['blog_id'];
                $blog_title[] = $in['blog_title'];
                $blog_cover[] = $in['blog_cover'];
                $blog_preview[] = $in['blog_preview'];
                }
            }
            else
            {
                //do nothing
            }

          ?>

            <section id="blogs">
              <div class="container py-4">
                <h4 class="font-rubik font-size-20">Recent Review Blogs</h4>
                <hr>

                <div class="owl-carousel owl-theme">
                  
                <div class="item">
                    <?php
                        for($i=0; $i<$lim && $i<3;$i++)
                        {
                    ?>
                    <div class="card border-0 font-rale mr-5" style="width: 18rem;">
                      <h5 class="card-title font-size-16"><?php echo $blog_title[$i] ?></h5>
                      <img src=<?php echo $blog_cover[$i] ?> alt="cart image" class="card-img-top">
                      <p class="card-text font-size-14 text-black-50 py-1"><?php echo $blog_preview[$i] ?></p>
                      <a href=<?php echo "BlogPost.php?blog_id=$blog_id[$i]" ?> class="color-second text-left">Go to Blog</a>
                    </div>
                  </div>
                  <?php
                        }
                  ?>

                </div>
              </div>
            </section>
        </main>
  </div>
    <!-- start #footer -->
        
        <div class="copyright text-center bg-dark text-white py-2">
          <p class="font-rale font-size-14"> Done by <a href="https://github.com/sana-sanzida" class="color-second">Sazida Solayman</a></p>
        </div>
    <!-- !start #footer -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>
</html>