<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 
 <?php

    if(isset($_GET['p_id']))
    {
      $the_post_id = $_GET['p_id'];
      $update_statement = mysqli_prepare($connection, "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = ?");
      mysqli_stmt_bind_param($update_statement, "i", $the_post_id);
      mysqli_stmt_execute($update_statement);
      if(!$update_statement)
       {
        die("query failed" );
        }
      if(isset($_SESSION['username']) && is_admin($_SESSION['username']) )
       {
        $stmt1 = mysqli_prepare($connection, "SELECT post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_id = ?");
        }
     else {
        $stmt2 = mysqli_prepare($connection , "SELECT post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_id = ? AND post_status = ? ");

        $published = 'published'; 
      }//else closes
      if(isset($stmt1)){

        mysqli_stmt_bind_param($stmt1, "i", $the_post_id);

        mysqli_stmt_execute($stmt1);

        mysqli_stmt_bind_result($stmt1, $post_title, $post_author, $post_date, $post_image, $post_content);

      $stmt = $stmt1;


    }else {


        mysqli_stmt_bind_param($stmt2, "is", $the_post_id, $published);

        mysqli_stmt_execute($stmt2);

        mysqli_stmt_bind_result($stmt2, $post_title, $post_author, $post_date, $post_image, $post_content);

     $stmt = $stmt2;

    }?>   
<!doctype html>
<html lang="en">
  <head>
    <title>Blog Display Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="blog_page/css/bootstrap.css">
    <link rel="stylesheet" href="blog_page/css/animate.css">
    <link rel="stylesheet" href="blog_page/css/owl.carousel.min.css">

    <link rel="stylesheet" href="blog_page/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="blog_page/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="blog_page/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .firstcharacter {
          color: #903;
          float: left;
          font-family: Georgia;
          font-size: 75px;
          line-height: 60px;
          padding-top: 4px;
          padding-right: 8px;
          padding-left: 3px;
        }
    </style>
  </head>
  <body>
    
    <?php
          mysqli_stmt_fetch($stmt);
           
            $qq = "SELECT * FROM `users` WHERE username='$post_author'";
            $rr = mysqli_query($con,$qq);
            $row1 = mysqli_fetch_array($rr);
            $p_author_image = $row1['user_image'];
            $qqq = "SELECT * FROM `posts` WHERE post_title='$post_title'";
            $rrr = mysqli_query($con,$qqq);
            $row = mysqli_fetch_array($rrr)
                      ?>
    <div class="wrap" style="margin-top: 40px; margin-bottom: 40px;">
    <section class="site-section py-lg" style="padding-top: 50px; padding-bottom: 50px;">
      <div class="container">
        
        <div class="row blog-entries element-animate">

           

          <div class="col-md-12 col-lg-8 main-content">
            <img src="admin/images/<?php echo $post_image; ?>" alt="Image" class="img-fluid mb-5" >
             <div class="post-meta">
                        <span class="author mr-2" style="font-size: 18px;"><img style="height: 40px; width: 40px;" src="admin/images/<?php echo $p_author_image ?>" alt="Colorlib" class="mr-2"> <?php echo $post_author ?></span>&bullet;
                        <span class="mr-2" style="font-size: 18px;"><i class="fa fa-calendar"></i> <?php echo $post_date ?> </span> &bullet;
                        <span class="ml-2" style="font-size: 18px;"><span class="fa fa-comments"></span> </span>
                      </div>
                      
            <h1 class="mb-4"><?php echo $post_title ?></h1>
            <a class="category mb-5" href="#"><?php echo $row['post_tags']; ?></a>
            <div class="post-content-body">
              <?php echo $row['post_content']; ?>
            </div>
<br>       
            <hr>
            <?php
            if(isset($_POST['create_comment'])) {
   #session_start();
    if(isset($_SESSION['user_id']))
    {
        $the_post_id = $_GET['p_id'];
        $comment_author_id = $_SESSION['user_id'];
        //$comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];

        if (!empty($comment_content)) {


            $query1 = "INSERT INTO comments (comment_post_id, comment_author, comment_content, comment_status,comment_date)";

            $query1 .= "VALUES ($the_post_id ,'{$comment_author_id}', '{$comment_content }', 'unapproved',now())";

            $create_comment_query = mysqli_query($con, $query1);
            #$create_comment_query->store_result();
            if (!$create_comment_query) {
                die('QUERY FAILED1' . mysqli_error($connection));


            }


        }

    }
    else
    {?>
            <?php
      echo "<script>alert('Please Login to Comment')</script>";
    }

    }?>
    
      
            <div class="pt-5" style="padding-top: 10px;">
              <ul class="comment-list">
                <?php
                if(isset($_SESSION['user_id']))
                 {
                    $comment_author_id = $_SESSION['user_id'];
      $q1 = "SELECT `username` FROM `users` WHERE `user_id` = {$comment_author_id}";
      $run = mysqli_query($con, $q1);
      $author_name = mysqli_fetch_assoc($run);
            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            #$query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($con, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($connection));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
             ?>
                <li class="comment">
                  <div class="vcard">
                  </div>
                  <div class="comment-body">
                    <h3><?php echo $author_name['username'];   ?></h3>
                    <div class="meta"><?php echo $comment_date ?></div>
                    <p><?php echo $comment_content;   ?></p>
                  </div>
                </li>
                <?php } } }   else {


            header("Location: index.php");


            }?>
        
              
              <div class="comment-form-wrap pt-5">
            <form action="#" method="post" role="form">

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
              </div>
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap" style="margin-bottom: 50px;">
                <form action="../blogs/index.php" class="search-form" id="form2" method="post">
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
                  <form id="form1" action="../blogs/index.php" method="post">
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
              <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                  <ul><?php 
                     $qqq = "SELECT * FROM `posts` ORDER BY `post_views_count` DESC LIMIT 6";
                     $rrr = mysqli_query($con,$qqq);
                     while($row = mysqli_fetch_array($rrr))
                   {
                          $p_id1 = $row['post_id'];
                          $p_image = $row['post_image'];
                          $p_author = $row['post_author'];
                          $qq = "SELECT * FROM `users` WHERE username='$p_author'";
                          $rr = mysqli_query($con,$qq);
                          $row1 = mysqli_fetch_array($rr);
                          $p_author_image = $row1['user_image'];
                          ?>
                    <li>
                      <a href="../cms/post.php<?php echo "?p_id=".$p_id1 ?>">
                        <img src="admin/images/<?php echo $p_image ?>" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4><?php echo $row['post_title']; ?> </h4>
                          <div class="post-meta">
                            <span class="mr-2"><?php echo $row['post_date']; ?></span>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php } ?>
                  </ul>
                </div>
              </div>
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