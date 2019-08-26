<?php
	require('../cms/includes/db.php'); 
	if(isset($_GET['link']))
	 {
		$title=$_GET['link'];
		$query3="SELECT * FROM project WHERE title='$title'"; 
		$result3 = mysqli_query($con,$query3);
		$row = mysqli_fetch_array($result3);
		$tagss=$row['tags'];
		$tag= array_map('intval', explode(',', $tagss));
		$c=count($tag);
		$i=0;
		$splitted = explode(",", $row['teamdid']);//seperating team ids
			$c1=count($splitted);?>
            
        <html>
<head>
<title> Project</title> 
<link rel="stylesheet" href="stylesheet//proj_show_style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
function myFunction() {
    var c = "4mem";
    var test = document.getElementById(c);
    test.style.display = "block";
}
</script>
</head>
<body onload="myFunction()">
    <header class="header">
        <div class="title">
            <h1 class="heading-primary">
            <span class="heading-primary-main"><?php echo $row['title']; ?></span>
            </h1>
        </div>
        
    </header>
    <div class="about container" id="about">      
        <div class="row">
            <div class="col-md-6 text-center" >
                <img src="admin/images/<?php echo $row['photo'];?>" class="img-responsive" id="im">
            </div>
            <div class="col-md-6"  >
                <h1 class="des" style="margin-left: 5px;">DeSCRIPTION</h1>
                <p style="margin-left: 5px;">
                   <?php echo $row['description'] ?>

                    
                    
                    
                </p>
                <a href="https://github.com/Chinmay/test1.git" style="margin-left: 5px;"><i class="fa fa-github"></i><?php echo "Github Link-".$row['githubLink']; ?></a>
                <hr>
                <div class="tags">
                    <?php
                    while($i<$c)
                    {
                $query7 = "SELECT * FROM `tags` WHERE id=$tag[$i]";
                $result7 = mysqli_query($con,$query7);
                $row7 = mysqli_fetch_array($result7);?>
                <span class="sp"><?php echo "#".$row7['name']."  "; ?></span>
                <?php
                $i++;
                }
                $i1=0; ?>
                </div>
                
                <div class="stat">
                    <h2><?php echo $row['status']; ?></h2>
                </div>
                
            </div>
        </div>
        <div class="horiline"><hr></div>
        <h1 class="auth" >AUtHORS</h1>
        
        
<!---------------------------------------ONE MEMBER BLOCK------------------------->
        <?php if($c1==1) 
        { ?>
        <div id="1mem" >
            <div class="row">
                
                <div class="col-md-4">
                </div>
                
                <div class="col-md-4">
                    <div class="our-team">
                        <?php
                                
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>" alt="Not Found" onerror=this.src="blank.jpg">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                     
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                </div>
                
            </div>
        </div>
    <?php } ?>
        
<!------------------------------------TWO MEMBER BLOCK-------------------------------->
    <?php if($c1==2) 
        {?>
        <div id="2mem" >
            <div class="row">
                
                <div class="col-md-2">
                </div>
                
                <div class="col-md-4">

                    <div class="our-team">
                        <?php
                                
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                    
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="our-team">
                         <?php
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                           
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                    
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-2">
                </div>
                
            </div>
        </div>
       <?php } ?>
<!-------------------------------------THREE MEMBER BLOCK------------------------------>
<?php if($c1==3) 
        { ?>
        <div id="3mem" >
            <div class="row">
                <div class="col-md-4">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                    
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                     
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                    
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
<!-------------------------------------FOUR MEMBER BLOCK----------------------------->    
<?php if($c1==4) 
        {    ?>
        <div id="4mem" >
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                     
                            ?>
                            
                        <ul class="social">
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                      
                            ?>
                            
                        <ul class="social">
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                      
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                     
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
       <?php } ?>
 <!------------------------------FIVE MEMBER BLOCK---------------------------------->
<?php if($c1==5) 
        { ?>
        <div id="5mem" >
            <div class="row">
                <div class="col-md-4 ">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                    
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 ">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                           
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                      
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 ">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                    
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                

            </div>
            
            <div class="row">
                
                <div class="col-md-2"></div>
                
                <div class="col-md-4 ">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                           
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                     
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4 ">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                     
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-2"></div>
                
            </div>
        </div>
      <?php  } ?>
<!----------------------------------SIX MEMBER BLOCK--------------------------------->
<?php if($c1==6) 
        { ?>
        <div id="6mem" >
            <div class="row">
                <div class="col-md-3 ">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                      
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                     
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                           
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                     
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                      
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                
                <div class="col-md-3"></div>
                
                <div class="col-md-3">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                            
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                      
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="our-team">
                        <?php
                                
                                    
                                        $splitted1[$i1]=(int)$splitted[$i1];
                                        $k=$splitted1[$i1];
                                    $query1="SELECT * FROM `users` WHERE `user_id`=$k";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_array($result1);?>
                        <div class="pic">
                            <img src="admin/images/<?php echo $row1['user_image']; ?>">
                        </div>
                        <div class="team-content">
                           
                                    <h3 class="nm"><?php echo $row1['username']; ?></h3>
                                    <span class="post"><?php echo $row1['Branch']; ?></span>
                                    </div>
                                    <?php
                                
                                    $i1++;
                                      
                            ?>
                            
                        <ul class="social">
                            
                            <li><a href="<?php echo $row1['google_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            
                            <li><a href="<?php echo $row1['linkedlin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-3"></div>
                
            </div>
        </div>
        
        
    </div>
   <?php } ?>
</body>
</html>

			
           <?php $i1=0;
            
			}
		else 
			{ ?>
				<a href="search2.php">Select Project</a>	
				<?php
			}
		
			
		