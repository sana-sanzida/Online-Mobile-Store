<?php
  /** Connection to database*/
	$con=mysqli_connect("localhost","root","","online_mobile_store");
	if($con===false)
	{
	  echo '<script type= "text/javascript"> alert ("Database Could not connect")</script>';
  }
  /** initializing session */
  session_start();
  /**supressing an empty string warning */
  error_reporting(E_ALL ^ E_NOTICE);
  /**getting searched term */
  $searchBlog = $_GET['searchBlog'];
  if(is_null($searchBlog) == 1)
  {
    $searchBlog = "";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Review Blogs</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blog.css">

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
                <a class="title-banner-text">Mobile Review Blogs</a>
            </div>
            <!-- !title -->

        </header>
    <!-- !header -->

    <!-- search for blogs -->
    <form class="search_blog" action="Blogs.php" style="margin:auto;max-width:500px">
      <input type="text" placeholder="Search for Rewview Blogs" name="searchBlog">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
     <!-- !search for blogs -->

     <?php

      $count;
      $blog_id = array();
      $writer_name= array();
      $blog_title= array();
      $blog_cover= array();
      $blog_preview = array();

        /** searching a blog */
        function searchB($term)
        {
          $db = 'review_blog';
          global $con, $count, $blog_id, $writer_name, $blog_title, $blog_cover, $blog_preview;
          $sql = "SELECT blog_id, writer_name, blog_title, blog_cover, blog_preview FROM {$db} WHERE blog_title LIKE '%$term%' ";
          $query= mysqli_query($con,$sql);

          if(mysqli_num_rows($query) > 0 )
          {
            $count=mysqli_num_rows($query);
            while($info = mysqli_fetch_array($query))
            {
              $blog_id[] = $info['blog_id'];
              $writer_name[] = $info['writer_name'];
              $blog_title[] = $info['blog_title'];
              $blog_cover[] = $info['blog_cover'];
              $blog_preview[] = $info['blog_preview'];
            }
          }
          else
          {
            echo '<script type= "text/javascript"> alert ("No Matching Blog Found")</script>';
            $_SESSION['searchBlog'] = '';
          }
        }

        /**showing blog list */
        function viewBlogs()
        {
          $db = 'review_blog';
          global $con, $count, $blog_id, $writer_name, $blog_title, $blog_cover, $blog_preview;
          $sql = "SELECT blog_id, writer_name, blog_title, blog_cover, blog_preview FROM {$db}";
          $query= mysqli_query($con,$sql);

          if(mysqli_num_rows($query) > 0 )
          {
            $count=mysqli_num_rows($query);
            while($info = mysqli_fetch_array($query))
            {
              $blog_id[] = $info['blog_id'];
              $writer_name[] = $info['writer_name'];
              $blog_title[] = $info['blog_title'];
              $blog_cover[] = $info['blog_cover'];
              $blog_preview[] = $info['blog_preview'];
            }
          }
          else
          {
            echo '<script type= "text/javascript"> alert ("No Review Blog exists")</script>';
          }
        }

        /**selecting wheather to show search result or blog list */
        if( is_null($searchBlog) || $searchBlog != "")
        {
          searchB($searchBlog);
        }
        else
        {
          viewBlogs();
        }

        for($i=0; $i < $count; $i++)
          {
     ?>

        <div class="blog-col">
          <div class="blog-item-style-1 blog-item-style-3">
            <img src=<?php echo $blog_cover[$i] ?>> 
              <div class="blog-it-infor">
                <h3><a href=<?php echo "BlogPost.php?blog_id=$blog_id[$i]" ?>><?php echo $blog_title[$i] ?></a></h3>
                <span class="username"><?php echo $writer_name[$i] ?></span>
                <p><?php echo $blog_preview[$i] ?></p>
              </div>
          </div>
        </div>
  </div>

      <?php
          }
      ?>
    <!-- start #footer -->  
        <div class="copyright text-center bg-dark text-white py-2" style="margin-bottom: -50px">
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