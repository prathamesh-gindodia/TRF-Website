
 
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            
            <div class="col-md-8">
               



    




    
        
          <h1 class="page-header">
                    Posts
                  
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> </p>
                <hr>
                <
            


                <hr>
                








?>


<!-- Blog Comments -->

<?php 

    



?> 


                <!-- Posted Comments -->



        <!-- Comments Form -->
        <div class="well">



            <h4>Leave a Comment:</h4>
            <form action="#" method="post" role="form">

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <hr>
                
                 <?php 
                 if(isset($_SESSION['user_id']))
                 {
                    $comment_author_id = $_SESSION['user_id'];
      $q1 = "SELECT `username` FROM users WHERE `user_id` = {$comment_author_id}";
      $run = mysqli_query($connection, $q1);
      $author_name = mysqli_fetch_assoc($run);
            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            #$query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($connection));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
                
                ?>
                
                
                           <!-- Comment -->
                <div class="media">
                     
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $author_name['username'];   ?>
                            <small><?php echo $comment_date;   ?></small>
                        </h4>
                        
                        <?php echo $comment_content;   ?>
 
                    </div>
                </div>
     
                
  

           <?php } } }   else {


            header("Location: index.php");


            }
                ?>
           
  

            </div>
            
              

            <!-- Blog Sidebar Widgets Column -->
            
            
            <?php include "includes/sidebar.php";?>
             

        </div>
        <!-- /.row -->

        <hr>

   

<?php include "includes/footer.php";?>

<!doctype html>
<html lang="en">
  <head>
    <title>Blog Display Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

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
    

    <div class="wrap" style="margin-top: 40px; margin-bottom: 40px;">
    <section class="site-section py-lg" style="padding-top: 50px; padding-bottom: 50px;">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
            <img src="images/img_10.jpg" alt="Image" class="img-fluid mb-5">
             <div class="post-meta">
                        <span class="author mr-2" style="font-size: 18px;"><img style="height: 40px; width: 40px;" src="images/batface.jpg" alt="Colorlib" class="mr-2"> Batman</span>&bullet;
                        <span class="mr-2" style="font-size: 18px;"><i class="fa fa-calendar"></i> March 15, 2018 </span> &bullet;
                        <span class="ml-2" style="font-size: 18px;"><span class="fa fa-comments"></span> 3</span>
                      </div>
            <h1 class="mb-4">Some Awesome Topic of a Personal Amazing Blog</h1>
            <a class="category mb-5" href="#">Machine Learning</a> <a class="category mb-5" href="#">Android</a>
           
            <div class="post-content-body">
              <p><span class="firstcharacter">L</span>orem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium nam quas inventore, ut iure iste modi eos adipisci ad ea itaque labore earum autem nobis et numquam, minima eius. Nam eius, non unde ut aut sunt eveniet rerum repellendus porro.</p>
            <p>Sint ab voluptates itaque, ipsum porro qui obcaecati cumque quas sit vel. Voluptatum provident id quis quo. Eveniet maiores perferendis officia veniam est laborum, expedita fuga doloribus natus repellendus dolorem ab similique sint eius cupiditate necessitatibus, magni nesciunt ex eos.</p>
            <p>Quis eius aspernatur, eaque culpa cumque reiciendis, nobis at earum assumenda similique ut? Aperiam vel aut, ex exercitationem eos consequuntur eaque culpa totam, deserunt, aspernatur quae eveniet hic provident ullam tempora error repudiandae sapiente illum rerum itaque voluptatem. Commodi, sequi.</p>
            <p>Quibusdam autem, quas molestias recusandae aperiam molestiae modi qui ipsam vel. Placeat tenetur veritatis tempore quos impedit dicta, error autem, quae sint inventore ipsa quidem. Quo voluptate quisquam reiciendis, minus, animi minima eum officia doloremque repellat eos, odio doloribus cum.</p>
            <p>Temporibus quo dolore veritatis doloribus delectus dolores perspiciatis recusandae ducimus, nisi quod, incidunt ut quaerat, magnam cupiditate. Aut, laboriosam magnam, nobis dolore fugiat impedit necessitatibus nisi cupiditate, quas repellat itaque molestias sit libero voluptas eveniet omnis illo ullam dolorem minima.</p>
            <p>Porro amet accusantium libero fugit totam, deserunt ipsa, dolorem, vero expedita illo similique saepe nisi deleniti. Cumque, laboriosam, porro! Facilis voluptatem sequi nulla quidem, provident eius quos pariatur maxime sapiente illo nostrum quibusdam aliquid fugiat! Earum quod fuga id officia.</p>
            <p>Illo magnam at dolore ad enim fugiat ut maxime facilis autem, nulla cumque quis commodi eos nisi unde soluta, ipsa eius aspernatur sint atque! Nihil, eveniet illo ea, mollitia fuga accusamus dolor dolorem perspiciatis rerum hic, consectetur error rem aspernatur!</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus magni explicabo id molestiae, minima quas assumenda consectetur, nobis neque rem, incidunt quam tempore perferendis provident obcaecati sapiente, animi vel expedita omnis quae ipsa! Obcaecati eligendi sed odio labore vero reiciendis facere accusamus molestias eaque impedit, consequuntur quae fuga vitae fugit?</p>
            </div>
<br>
              
            <hr>


            <div class="pt-5" style="padding-top: 10px;">
              <h3 class="mb-5">6 Comments</h3>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard">
                    <img style="height: 50px; width: 50px;" src="images/batface.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Batman</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>
                </li>

                <li class="comment">
                  <div class="vcard">
                    <img style="height: 50px; width: 50px;" src="images/batface.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Batman</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>

                  <ul class="children">
                    <li class="comment">
                      <div class="vcard">
                        <img style="height: 50px; width: 50px;" src="images/batface.jpg" alt="Image placeholder">
                        </div>
                    <div class="comment-body">
                        <h3>Batman</h3>
                        <div class="meta">January 9, 2018 at 2:21pm</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                        <p><a href="#" class="reply rounded">Reply</a></p>
                      </div>


                      <ul class="children">
                        <li class="comment">
                          <div class="vcard">
                            <img style="height: 50px; width: 50px;" src="images/batface.jpg" alt="Image placeholder">
                          </div>
                          <div class="comment-body">
                            <h3>Batman</h3>
                            <div class="meta">January 9, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply rounded">Reply</a></p>
                          </div>

                            <ul class="children">
                              <li class="comment">
                                <div class="vcard">
                                  <img style="height: 50px; width: 50px;" src="images/batface.jpg" alt="Image placeholder">
                                  </div>
                                  <div class="comment-body">
                                    <h3>Batman</h3>
                                  <div class="meta">January 9, 2018 at 2:21pm</div>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                  <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                              </li>
                            </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>

                <li class="comment">
                  <div class="vcard">
                    <img style="height: 50px; width: 50px;" src="images/batface.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Batman</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>
                </li>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name"><span style="color: coral;">*</span> Name </label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email"><span style="color: coral;">*</span> Email </label>
                    <input type="email" class="form-control" id="email">
                  </div>

                  <div class="form-group">
                    <label for="message"><span style="color: coral;">*</span> Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap" style="margin-bottom: 50px;">
                <form action="#" class="search-form">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" class="form-control" id="s" placeholder="Type a keyword ">
                  </div>
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
                    <li>
                      <a href="">
                        <img src="images/img_6.jpg" alt="Image placeholder" class="mr-4">
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
                        <img src="images/img_11.jpg" alt="Image placeholder" class="mr-4">
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