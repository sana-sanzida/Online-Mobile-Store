<?php
     /** Connection to database*/
	$con=mysqli_connect("localhost","root","","online_mobile_store");
	if($con===false)
	{
	  echo '<script type= "text/javascript"> alert ("Database Could not connect")</script>';
    }
    /** initializing session */
    session_start();
    /**receiving blog id */
	$blog_id = $_GET['blog_id'];
	/**
	 * reciving current user_name
	 * default user name is set for testing 
	 */
	//$current_user = $_GET['user_name'];
	$current_user = "user404";
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
					<a class="title-banner-text">Review Blog</a>
				</div>
				<!-- !title -->
	
			</header>
        <!-- !header -->
        
        <?php
            $db = 'review_blog';
    
            $sql = "SELECT blog_id, writer_name, blog_title, blog_cover, blog_text, blog_date FROM {$db} WHERE blog_id='$blog_id' ";
            $query= mysqli_query($con,$sql);
  
            if(mysqli_num_rows($query) > 0 )
            {
              while($info = mysqli_fetch_array($query))
              {
                $writer_name = $info['writer_name'];
                $blog_title = $info['blog_title'];
                $blog_cover = $info['blog_cover'];
                $blog_text = $info['blog_text'];
                $blog_date = $info['blog_date'];
              }
            }
            else
            {
              echo '<script type= "text/javascript"> alert ("Blog not Found")</script>';
              echo "<script> location.href='Blogs.php'; </script>";
            }
        ?>


<div class="container">
	<div class="row">

        <div class="blogpost">

			<div class="mainheading">

				<h1 class="posttitle"><?php echo $blog_title ?></h1>

				<div class="row post-top-meta" style="margin-bottom: 10px; margin-top: 25px;">
					<div style="margin-left: 15px; margin-right: 10px;">
						<img src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal" width="50px">
					</div>
					<div >
						<span style="font-size: larger; font-weight: bold;"><?php echo $writer_name ?></span><br>
						<span style="font-weight:lighter;" ><?php echo date('d', strtotime($blog_date)).' '.date('F', strtotime($blog_date)).' '.date('Y', strtotime($blog_date)) ?></span>
					</div>
				</div>

			</div>

			<img class="featured-image img-fluid" src=<?php echo $blog_cover ?> style="margin-bottom: 20px;">

			<div class="article-post">
				<p>
                <?php echo $blog_text ?>
				</p>
				
				
			</div>

			<!-- comment -->
			<div class="comment">
				<form method="post" action="">
					<textarea name="comm" placeholder="Write a Comment...."></textarea>
					<input type="submit" name="button" value="Submit">
				</form>
            </div>
            <?php
				/**funtion to post a new comment
				 * and add it to database
				 * reload page to show the comment
				 */
                function addComment($comment)
                {
                    global $con, $blog_id, $current_user;
                    $query = "INSERT INTO review_blog_comment (blog_id, comment_name, comment_text) VALUES ( '".$blog_id."','".$current_user."','".$comment."')"; 
      
                    if(mysqli_query($con,$query))
                    {
						echo '<script type= "text/javascript"> alert ("Comment Posted")</script>';
						echo "<script> location.href='BlogPost.php?blog_id=$blog_id'; </script>";
                    }
                    else
                    {
						echo '<script type= "text/javascript"> alert ("Comment failed")</script>';
                    }  
                }

                if(isset($_POST['button']))
                {
					$comment = $_POST['comm'];
                    addComment($comment);
				}

				$sql = "SELECT comment_name, comment_text FROM review_blog_comment WHERE blog_id='$blog_id' ";
				$query= mysqli_query($con,$sql);
				
				$count = 0;
				$user_name = array();
				$comment_text = array();
  
            	if(mysqli_num_rows($query) > 0 )
            	{
					$count=mysqli_num_rows($query);
              		while($info = mysqli_fetch_array($query))
              		{
                		$user_name[] = $info['comment_name'];
                		$comment_text[] = $info['comment_text'];
              		}
            	}
            	else
            	{
              		// No comments yet
				}
				
				//showing the comments
				for($i=0; $i<$count;$i++)
				{
			?>
			
			<div class="comment-box">
				<img src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x">
					<a class="comment-user"><?php echo $user_name[$i] ?></a><br>
					<a class="comment-text"><?php echo $comment_text[$i] ?></a>
			</div>

			<?php
				}
			?>

	</div>
</div>

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
