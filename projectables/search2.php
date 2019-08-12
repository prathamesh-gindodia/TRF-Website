<?php
/*things to do
1)integrate the part below search bar
2)domain should remain after refresh
3)hide the submit button
*/

	require('../cms/includes/db.php'); 
	session_start();
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);
            html,
            body {
              -moz-box-sizing: border-box;
                   box-sizing: border-box;
              height: 100%;
              width: 100%; 
              background: #FFF;
              font-family: 'Roboto', sans-serif;
              font-weight: 400;
            }
            .card {
              display: block; 
                margin-bottom: 20px;
                margin-top: 100px;
                line-height: 1.42857143;
                background-color: #fff;
                border-radius: 2px;
                box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
                transition: box-shadow .25s; 
                border-top-left-radius:6px;
              border-top-right-radius:6px;
                border-bottom-left-radius: 6px;
                border-bottom-right-radius: 6px;
            }
            .card:hover {
              box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            }
            .img-card {
              width: 80%;
              height:300px;
              border-top-left-radius:10px;
              border-top-right-radius:10px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
              display:block;
                transform: scale(1.15);
                margin-left: 10%;
                overflow: hidden;
                margin-bottom: 4%;
                box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
                transition: box-shadow .25s; 
            }
            .img-card img{
              width: 100%;
              height: 100%;
              object-fit:cover; 
              transition: all .25s ease;
            } 
            .card-content {
              padding:15px;
              text-align:center;
            }
            .card-title {
              margin-top:0px;
              font-weight: 700;
              font-size: 1.65em;
            }
            .card-title a {
              color: #000;
              text-decoration: none !important;
              font-weight: bold;
                color: cornflowerblue;
                font-size: 30px;
                letter-spacing: 1px;
            }
            .card-read-more {
              border-top: 1px solid #D4D4D4;
            }
            .card-read-more a {
              text-decoration: none !important;
              padding:10px;
              font-weight:600;
              text-transform: uppercase
            }
            .card-title a:hover{
                color: mediumblue;
            }
            
            .tags {
                margin-left: 1%;
            }
            .search-box {
             position: absolute;
             margin-left: 34%;
             background: dodgerblue;
             border-radius: 30px;
             padding: 10px;
             margin-top: 20px;
                width: 470px !important;
            }


            .search-box:hover > .search-btn:hover{
                background: dodgerblue;
                color: white;
                border: 2px solid white;
            }

            .tags {
                margin-left: 1%;
                margin-top: 1px;
                margin-bottom: 5%;
            }
            .sp{
                font-size: 15px;
                display: inline-block;
                text-align: center;
                padding: 1px;
                margin: 2px;
                color: cornflowerblue;
                font-weight: bold;
                text-transform: capitalize;
            }
.search-box:hover > .search-btn:hover{
    background: dodgerblue;
    color: white;
    border: 2px solid white;
}


.search-btn {
 width: 40px;
 height: 40px;
 border-radius: 50%;
 background: dodgerblue;
 padding: 4px;
 margin-left: 10px;
 justify-content: center;
 align-items: center;
 transition: 0.4s;
 color: white;
 cursor: pointer;
    position: relative;
 display: inline;
}
        </style>
    </head>
    <body>
    	<form id="sampleForm" name="sampleForm" method="post" action="">
                    <input type="hidden" name="total" id="total" value="">  
                    <input type="submit" name="submit">
            </form>
        <div class="search-box" style="position: relative;">
        	<?php
	
				$query7 = "SELECT * FROM `tags` WHERE 1";
				$result7 = mysqli_query($con,$query7);
				$i=0;
				$tag_project=""; ?>
            <select multiple id="domains" style="width: 200px; position: relative; display: inline; padding: 10px;">
                <?php 
				while($row7 = mysqli_fetch_array($result7)) //Dynamic CHECKBOX
					{?>
                <option value="<?php  echo $row7['name']; ?>"><?php  echo $row7['name']; ?></option>
			<?php } ?>        
            </select>

            <?php
    		if(isset($_POST['total']))
			{
				$i=1;
				$checked=$_POST['total'];
				$tag=  explode(',', $checked);
				$count = count($checked);
				$i=0;
				foreach($tag as $selected)
					{
						$q = "SELECT * FROM `tags` WHERE name='$selected'";
						$r = mysqli_query($con,$q);
						$row = mysqli_fetch_array($r);
						if($i==$count)
						 	{
						 		$tag_project=$tag_project. $row['id']. ",";
						 				
							}
						else
						 	{
								$tag_project=$tag_project. $row['id']. ",";
											
							}
							$i++;		
					}
			}
		if(!empty($tag_project))
		{
			$string = $tag_project;
	 					$j=0;
	 					$k=FALSE;
	 					$l=0;
						$ids = explode(',', $string);//creating logic for tag checking
						$d=count($ids);
						$d=$d-1;
						
						$query11="SELECT * FROM project WHERE 1";
						$result11 = mysqli_query($con,$query11);
						$num_rows1 = mysqli_num_rows($result11);?>

            <select multiple id="title" style="width: 200px; position: relative; display: inline;">
                 <?php
						while($row11 = mysqli_fetch_array($result11))
							{
								$l=0;
								$j=0; ?>
								
								<?php                   
								while($j<$d) 
									{
										if (strpos($row11['tags'], $ids[$j]) !== false) //checks whether given tag is present ot not
								 			{
												$l++;								 	
								 				}
								 			$j++;
								 		}
									if($l==$d)
								 		{
								 			$link = $row11['title'];
								 				?>
								 			<option value="<?php echo $row11['title']; ?>"><?php echo $row11['title']; ?></option>	
											<?php	
											$k=TRUE;
											}
								
										}
							}
							else//if no tags selected
								{
									//javascript code

								}?>

            </select>

            <script>
              $(document).ready(function() {   
                $("#domains").select2({
                placeholder: "Select domains",

                });
                    $('#title').select2({
                        placeholder: "Select a title",
                        maximumSelectionLength: 1,
                    });

                  $("#domains").on("select2:select", function (e) { 
                  var select_val = $(e.currentTarget).val();
                  console.log(select_val)
                  document.sampleForm.total.value=select_val;
        		  document.forms["sampleForm"].submit();
        });
                  $("#title").on("select2:select", function (e) { 
                  var select_val = $(e.currentTarget).val();
                  window.location.href = "project_display.php?link="+select_val;
        });

              });      

            </script> 
            <a class="search-btn" href="javascript:void(0)">
       <i class="fa fa-search"></i>
       </a>
        </div>
                    <div class="container" style="max-width: 1300 !important;  position: relative;">
                        <div class="row">
                            <div class="col-md 6">
                                <div class="card">
                                    <a class="img-card" href="javascript:void(0)">
                                    <img src="robo.jpg" />
                                  </a>
                                    <div class="card-content">
                                        <h4 class="card-title">
                                            <a href="javascript:void(0)"> Some Project Title 1
                                          </a>
                                        </h4>
                                        <h5 style="color: darkgray;">11/12/2013</h5>
                                        <p class="">
                                            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.
                                        </p>
                                        <div class="tags">
                                            <span class="sp">#Artificial Intelligence</span>
                                            <span class="sp">#Machine Learning</span>
                                            <span class="sp">#Android</span>
                                            <span class="sp">#Robotics</span>
                                            <span class="sp">#Web Development</span>
                                            <span class="sp">#Front End</span>
                                            <span class="sp">#Back End</span>
                                        </div>
                                    </div>
                                    <div class="card-read-more">
                                        <a href="javascript:void(0)" class="btn btn-link btn-block">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md 6">
                                <div class="card">
                                    <a class="img-card" href="javascript:void(0)">
                                    <img src="robo2.jpg" />
                                  </a>
                                    <div class="card-content">
                                        <h4 class="card-title">
                                            <a href="javascript:void(0)">Some Project Title 2
                                          </a>
                                        </h4>
                                        <h5 style="color: darkgray;">11/12/2013</h5>
                                        <p class="">
                                            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.
                                        </p>
                                        <div class="tags">
                                            <span class="sp">#Artificial Intelligence</span>
                                            <span class="sp">#Machine Learning</span>
                                            <span class="sp">#Android</span>
                                            <span class="sp">#Robotics</span>
                                            <span class="sp">#Web Development</span>
                                            <span class="sp">#Front End</span>
                                            <span class="sp">#Back End</span>
                                        </div>
                                    </div>
                                    <div class="card-read-more">
                                        <a href="javascript:void(0)" class="btn btn-link btn-block">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md 6">
                                <div class="card">
                                    <a class="img-card" href="javascript:void(0)">
                                    <img src="robo.jpg" />
                                  </a>
                                    <div class="card-content">
                                        <h4 class="card-title">
                                            <a href="javascript:void(0)"> Some Project Title 1
                                          </a>
                                        </h4>
                                        <h5 style="color: darkgray;">11/12/2013</h5>
                                        <p class="">
                                            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.
                                        </p>
                                        <div class="tags">
                                            <span class="sp">#Artificial Intelligence</span>
                                            <span class="sp">#Machine Learning</span>
                                            <span class="sp">#Android</span>
                                            <span class="sp">#Robotics</span>
                                            <span class="sp">#Web Development</span>
                                            <span class="sp">#Front End</span>
                                            <span class="sp">#Back End</span>
                                        </div>
                                    </div>
                                    <div class="card-read-more">
                                        <a href="javascript:void(0)" class="btn btn-link btn-block">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md 6">
                                <div class="card">
                                    <a class="img-card" href="javascript:void(0)">
                                    <img src="robo2.jpg" />
                                  </a>
                                    <div class="card-content">
                                        <h4 class="card-title">
                                            <a href="javascript:void(0)">Some Project Title 2
                                          </a>
                                        </h4>
                                        <h5 style="color: darkgray;">11/12/2013</h5>
                                        <p class="">
                                            Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.
                                        </p>
                                        <div class="tags">
                                            <span class="sp">#Artificial Intelligence</span>
                                            <span class="sp">#Machine Learning</span>
                                            <span class="sp">#Android</span>
                                            <span class="sp">#Robotics</span>
                                            <span class="sp">#Web Development</span>
                                            <span class="sp">#Front End</span>
                                            <span class="sp">#Back End</span>
                                        </div>
                                    </div>
                                    <div class="card-read-more">
                                        <a href="javascript:void(0)" class="btn btn-link btn-block">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </body>
</html>