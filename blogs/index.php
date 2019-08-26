<?php
  require('../cms/includes/db.php'); 
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Blog Main Page</title>

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="blog_page/css/bootstrap.css">
    <link rel="stylesheet" href="blog_page/css/animate.css">
    <link rel="stylesheet" href="blog_page/css/owl.carousel.min.css">

    <link rel="stylesheet" href="blog_page/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="blog_page/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="blog_page/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="blog_page/css/style.css">
  </head>
  <body>
    

    <div class="wrap" style="margin-top: 40px; margin-bottom: 40px;">
<br>
      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Blogs</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <?php
                  if(isset($_POST['Submit']))
                  {
                    $cat = $_POST['categories'];
                    $queery = "SELECT * FROM `categories` WHERE cat_title='$cat'";
                    $reesult = mysqli_query($con,$queery);
                    $r = mysqli_fetch_array($reesult);
                    $k = $r['cat_id'];
                     $qqq = "SELECT * FROM `posts` WHERE post_category_id=$k";
                  }
                  elseif (isset($_POST['Submit1']))
                   {
                      $p_name = $_POST['title'];
                      $qqq = "SELECT * FROM `posts` WHERE post_title='$p_name'";
                  }
                  else
                  {
                    $qqq = "SELECT * FROM `posts` ORDER BY `post_views_count` DESC LIMIT 6";
                  }
                  
                      $rrr = mysqli_query($con,$qqq);
                      if(mysqli_num_rows($rrr)==0)
                        {echo "No projects found";}
                          ?>
                         
              <div class="row">
                <?php
                   while($row = mysqli_fetch_array($rrr))
                   {
                          $p_id = $row['post_id'];
                          $p_image = $row['post_image'];
                          $p_author = $row['post_author'];
                          $qq = "SELECT * FROM `users` WHERE username='$p_author'";
                          $rr = mysqli_query($con,$qq);
                          $row1 = mysqli_fetch_array($rr);
                          $p_author_image = $row1['user_image'];
                          ?>
                <div class="col-md-6">
                  <a href="../cms/post.php<?php echo "?p_id=".$p_id ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="../cms/admin/images/<?php echo $p_image ?>" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img style="height: 30px; width: 30px;"src="../cms/admin/images/<?php echo $p_author_image ?>" alt="Batman"> <?php echo $p_author ?></span>&bullet;
                        <span class="mr-2"><i class="fa fa-calendar"></i> <?php echo $row['post_date']; ?> </span> &bullet;
                      </div>
                      <h2><?php echo $row['post_title']; ?> </h2>
                      <p><?php echo $row['post_content']; ?>
                      </p>
                    </div>
                  </a>
                </div>  
              <?php } ?>
                

              </div>

              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                      
                    </ul>
                  </nav>
                </div>
              </div>


              

              

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap" style="margin-bottom: 50px;">
                <form action="" class="search-form" id="form2" method="post">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" class="form-control" id="s" name="title" placeholder="Type post title ">
                  </div>
                  <button type="submit" form="form2" value="Submit" id="Submit" name="Submit1">Submit</button>
                </form>
              </div>
              <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                  <li><a href="#">Machine Learning <span>(12)</span></a></li>
                  <li><a href="#">Web Development <span>(22)</span></a></li>
                  <li><a href="#">Android <span>(37)</span></a></li>
                  <li><a href="#">Cyber Security  <span>(42)</span></a></li>
                  <li><a href="#">Control Systems <span>(14)</span></a></li>
                </ul>
              </div>
                <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                  <form id="form1" action="" method="post">
                  <?php 
                $qq1 = "SELECT * FROM `categories` WHERE 1";
                $rr1 = mysqli_query($con,$qq1);
                while($row = mysqli_fetch_array($rr1))
                {
                  $val = $row['cat_title'];
                ?>
                  <input type="radio" name="categories" id="categories" value="<?php echo $val; ?>"><?php echo $val; ?><br>
                <?php } ?>
                </ul>
                <button type="submit" form="form1" value="Submit" id="Submit" name="Submit">Submit</button>
              </form>
               
              </div>
              <!-- <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                  <ul>
                    <li>
                      <a href="">
                        <img src="images/img_10.jpg" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>Some Awesome Topic of a Personal  Amazing Blog</h4>
                          <div class="post-meta">
                            <span class="mr-2">March 15, 2018 </span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="">
                        <img src="images/img_4.jpg" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>Some Awesome Topic of a Personal  Amazing Blog</h4>
                          <div class="post-meta">
                            <span class="mr-2">March 15, 2018 </span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="">
                        <img src="images/img_12.jpg" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>Some Awesome Topic of a Personal  Amazing Blog</h4>
                          <div class="post-meta">
                            <span class="mr-2">March 15, 2018 </span>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- END sidebar-box --> 

              
            </div>
            <!-- END sidebar -->

          </div>
        </div>
      </section>

    </div>
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    
    <script src="js/main.js"></script>
  </body>
</html>