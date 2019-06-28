   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
           
           
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/cms">CMS Front</a>
            </div>
            
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  
                  <?php 

    $query = "SELECT * FROM categories LIMIT 3";
    $select_all_categories_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
       $cat_title = $row['cat_title'];
       $cat_id = $row['cat_id'];
        
        echo "<li><a href='/cms/category/{$cat_id}'>{$cat_title}</a></li>";
    }
                    
    ?>

                    <?php if(isLoggedIn() AND $_SESSION['user_role'] == "admin"): ?>


                        <li>
                            <a href="/cms/admin">Admin</a>
                        </li>

                        <li>
                            <a href="/cms/includes/logout.php">Logout</a>
                        </li>
					<?php endif; ?>

                    <?php if(!isLoggedIn()): ?>


                        <li>
                            <a href="/cms/login.php">Login</a>
                        </li>


                    <?php endif; ?>




                                 
                     <li>
                        <a href="/cms/registration">Registration</a>
                    </li>
                                  
                    
    <?php 

    if(isset($_SESSION['user_role'])) {
    
        if(isset($_GET['p_id'])) {
            
          $the_post_id = $_GET['p_id'];
        
        echo "<li><a href='/cms/admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
        
        }
    
    
    
    }
    
    ?>

           
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
