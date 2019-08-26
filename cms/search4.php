<?php
/*things to do
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
                    <input type="hidden" name="total" id="total" value="<?php if(isset($_POST['total'])){echo $_POST['total'];} else{echo "";}?>">
                    <input type="hidden" name="unselect1" id="unselect1" value="<?php if(isset($_POST['unselect1'])){echo $_POST['unselect1'];} else{echo "";}?>">  
                    <input type="submit" id="subm" name="submit" style="display: none;">
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
              var name_of_dep = document.getElementById("total").value;
              var test1=document.getElementById("unselect1").value;

              $(document).ready(function() {   
                $("#domains").select2({
                placeholder: "Select domains",

                });
                    var timepass_arr = name_of_dep.split(",");
                    
                    var input_string = timepass_arr.join([separator = ',']);
                    document.getElementById("total").value = input_string;

                  $('#domains').val(timepass_arr);
                  $('#domains').select2().trigger('change');
                    $('#title').select2({
                        placeholder: "Select a title",
                        maximumSelectionLength: 1,
                    });
                  $("#domains").on("select2:select", function (e) { 
                  var select_val = $(e.currentTarget).val();
                  console.log(select_val)
                  document.sampleForm.total.value=select_val;
                  document.getElementById("subm").click();
        });
                  $("#title").on("select2:select", function (e) { 
                  var select_val = $(e.currentTarget).val();
                  window.location.href = "project_display.php?link="+select_val;
        });
                  $('#domains').on("select2:unselect", function(e){
                    var deleted_item=e.params.data.text;
                    console.log(e.params.data.text);
                    for( var i = 0; i < timepass_arr.length; i++){ 
                       if ( timepass_arr[i] === deleted_item) {
                         timepass_arr.splice(i, 1); 
                       }
                    }
                    var delete_string = timepass_arr.join([separator = ',']);
                    document.sampleForm.total.value = delete_string;
                    document.getElementById("subm").click();
                }).trigger('change');

              });      

            </script> 
            <a class="search-btn" href="javascript:void(0)">
       <i class="fa fa-search"></i>
       </a>
        </div>
                    <div class="container" style="max-width: 1300 !important;  position: relative;">
                        <div class="row">
                          <?php
                          $qqq = "SELECT * FROM `project` ORDER BY `date` DESC LIMIT 4";
                          $rrr = mysqli_query($con,$qqq);
                          $o=1;
                          while($row = mysqli_fetch_array($rrr))
                          {
                            $o++;
                            if($o==4)
                              {?>
                                <div class="row">
                              <?php } ?>
                            <div class="col-md 6">
                                <div class="card">
                                    <a class="img-card" href="javascript:void(0)">
                                    <img src="admin/images/<?php echo $row['photo'];?>" />
                                  </a>
                                    <div class="card-content">
                                        <h4 class="card-title">
                                            <a href="javascript:void(0)"> <?php echo $row['title']; ?>
                                          </a>
                                        </h4>
                                        <h5 style="color: darkgray;"></h5><?php
                                        echo $row['date'];
                                        ?></h5>
                                        <p class="">
                                            <?php echo $row['description'] ?>
                                        </p>
                                        <div class="tags">
                                          <?php 
                                          $tagss=$row['tags'];
                                          $tag= array_map('intval', explode(',', $tagss));
                                          $c=count($tag);
                                          $i=0;
                                          while($i<$c)
                                              {
                                          $query7 = "SELECT * FROM `tags` WHERE id=$tag[$i]";
                                          $result7 = mysqli_query($con,$query7);
                                          $row7 = mysqli_fetch_array($result7);?>
                                          <span class="sp"><?php echo "#".$row7['name']."  "; ?></span>
                                          <?php
                                          $i++;
                                          }
                                          ?>
                                            <span class="sp">#The_Robotics_Forum</span>
                                            <span class="sp">#Robotics</span>
                                            <span class="sp">#Robobot</span>
                                            <span class="sp">#Vishwakarma_Institue_of_Techonology</span>
                                            <span class="sp">#Pune</span>
                                            <span class="sp"></span>
                                            <span class="sp"></span>
                                        </div>
                                    </div>
                                    <div class="card-read-more">
                                        <a href="project_display.php?link=<?php echo $row['title'];?>" class="btn btn-link btn-block">
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>

                          <?php }
                           ?>
                            
                            
                      
                            
                            </div>
                        </div>
                    </div>
    </body>
</html>