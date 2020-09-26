<?php
     /** Connection to database*/
	$con=mysqli_connect("localhost","root","","online_mobile_store");
	if($con===false)
	{
	  echo '<script type= "text/javascript"> alert ("Database Could not connect")</script>';
    }
    /** initializing session */
    session_start();
	/**
	 * reciving current user_name and id
	 * default user name and id is set for testing 
	 */
    //$current_user = $_GET['user_name'];
    //$current_user_id = $_GET['user_id'];
    $current_user = "user404";
    $current_user_id = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Review Blog Post</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">	
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
					<a class="title-banner-text">Write Review Blog</a>
				</div>
				<!-- !title -->
	
			</header>
		<!-- !header -->
		
    <div class="blog-image-url">
        <form method="POST">
		    Cover Image for Blog (link to image hosting site)
            <input type="text" id="cover" name="cover" required>
	</div>
    
    <div class="container">
        
        <div class="create-blog">
            <div class="b-title">
				<textarea name="title" placeholder="Title here...." required></textarea>
			</div>
			<div class="comment">
					<textarea name="blog" placeholder="Write here...." required></textarea>
					<input type="submit" name="button" value="Create Blog" style="float: none;">
				</form>
			</div>
    </div>

    <?php
        /**
         * funtion to create a new blog
         * and add it to the database
         */
        function createBlog($url, $title, $preview, $text)
        {
            global $con, $blog_id, $current_user, $current_user_id;
            $query = "INSERT INTO review_blog (writer_name, blog_title, blog_cover, blog_preview, blog_text, blog_date) VALUES ('".$current_user."','".$title."','".$url."','".$preview."','".$text."', NOW())"; 
            
            if(mysqli_query($con, $query))
            {
				echo '<script type= "text/javascript"> alert ("Review Blog Created")</script>';
				echo "<script> location.href='Blogs.php'; </script>";
            }
            else
            {
                echo '<script type= "text/javascript"> alert ("Review Blog Creation failed")</script>';
            }  
        }

        /** submit button action */
        if(isset($_POST['button']))
        {
            $url = $_POST['cover'];
            $title = $_POST['title'];
            $text = $_POST['blog'];
            $preview = substr($text,0,200);
            createBlog($url, $title, $preview, $text);
		}
    ?>

    <div class="hideshare"></div>
    </div>
</div>
  <!-- start #footer -->
	  
	  <div class="copyright text-center bg-dark text-white py-2" style="margin-bottom: -50px">
		<p class="font-rale font-size-14"> Done by <a href="https://github.com/sana-sanzida" class="color-second">Sazida Solayman</a></p>
	  </div>
  <!-- !start #footer -->


<script src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="assets/js/mediumish.js"></script>
</body>
</html>
