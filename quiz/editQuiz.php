
<?php
$connection = mysqli_connect('localhost','root','','trfwebsite');
$id = $_REQUEST['sid'];
$query = "SELECT * FROM `quiz` WHERE `quizId` = '$id'";
$run = mysqli_query($connection, $query);
//$row = mysqli_num_rows($run);

$data = mysqli_fetch_assoc($run);
$startDate = date("Y-m-d\TH:i:s",strtotime($data['startDate']));
$endDate = date("Y-m-d\TH:i:s",strtotime($data['endDate']));

?>



<html>  
      <head>  
           <title>Dynamically Add or Remove input fields in PHP with JQuery</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <h2 align="center"></h2>  
                <div class="form-group">  
                     <form action="editQuizForm.php" id="add_name" method="POST">  
                          <div class="table-responsive" id="dynamic_field">  
                               <table class="table table-bordered" >  
                                    <tr>
										<td><input type="text" name="quizName" placeholder="quiz name" value=<?php echo $data['quizName'];  ?> class="form-control name_list" /></td>
										<td><input type="datetime-local" name="startTime" placeholder="Start time" value=<?php echo $startDate;  ?> class="form-control name_list" /></td>
										<td><input type="datetime-local" name="endTime" placeholder="End time" value=<?php echo $endDate;  ?> class="form-control name_list" /></td>
									</tr>
								</table>	
									<textarea name="discription" placeholder="discription box" rows="5" cols="26" style="margin: 0px; width: 1140px; height: 132px;"> <?php echo $data['discription'];  ?></textarea>
									
								<br>
								<br>
								
				<?php
						$query = "SELECT * FROM `quizQuestion` WHERE `quizId` = '$id'";
						$i=0;
						$run = mysqli_query($connection, $query);
						$row = mysqli_num_rows($run);
						//$data = mysqli_fetch_assoc($run);
						while($data=mysqli_fetch_assoc($run))
						{
				?>
								<table class="table table-bordered" > 
									<tr>  
                                         <td>Correct option</td>
										 <td><input type="text" name="name[]" placeholder="Enter question" value="<?php echo $data['questions']; ?>" class="form-control name_list" /></td>  
                                         
                                    </tr>  
									<tr>
												<td><input type="radio" name="answer<?php echo $i; ?>" value="a" <?php if($data['correctOption'] == "a") {echo "checked";} ?> /></td>
												<td><input type="text" name="optionA[]" placeholder="Enter option A" value="<?php echo $data['optionA']; ?>" class="form-control name_list" /></td>
											
									</tr>
											<tr>
												<td><input type="radio" name="answer<?php echo $i; ?>" value="b" <?php if($data['correctOption'] == "b") {echo "checked";} ?>/></td>
												<td><input type="text" name="optionB[]" placeholder="Enter option B" value="<?php echo $data['optionB']; ?>" class="form-control name_list" /></td>
											</tr>
											
											<tr>
												<td><input type="radio" name="answer<?php echo $i; ?>" value="c" <?php if($data['correctOption'] == "c") {echo "checked";} ?> /></td>
												<td><input type="text" name="optionC[]" placeholder="Enter option C" value="<?php echo $data['optionC']; ?>" class="form-control name_list" /></td>
											</tr>
											
											<tr>
												<td><input type="radio" name="answer<?php echo $i; ?>" value="d" <?php if($data['correctOption'] == "d") {echo "checked";} ?>/></td>
												<td><input type="text" name="optionD[]" placeholder="Enter option D" value="<?php echo $data['optionD']; ?>" class="form-control name_list" /></td>
								
									</tr>
							   </table>  
						<?php 
								$i++;
						}
						?>
                          </div> 
                               <input type="hidden" name="sid" value="<?php echo $id; ?>"/>
							   <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" /> 
							<button type="button" name="add" id="add" class="btn btn-success">Add More</button> 							   
						  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      var i= <?php echo $i-1; ?>;
      var j=1;  
      $('#add').click(function(){  
            i++;
           $('#dynamic_field').append('<div id="row'+i+'"><br><br><table class="table table-bordered"><tr><td>Correct option</td><td><input type="text" name="name[]" placeholder="Enter question" class="form-control name_list" /></td></tr><tr><td><input type="radio" name="answer'+i+'" value="a" /></td><td><input type="text" name="optionA[]" placeholder="Enter option A" class="form-control name_list" /></td></tr><tr><td><input type="radio" name="answer'+i+'" value="b" /></td><td><input type="text" name="optionB[]" placeholder="Enter option B" class="form-control name_list" /></td></tr><tr><td><input type="radio" name="answer'+i+'" value="c" /></td><td><input type="text" name="optionC[]" placeholder="Enter option C" class="form-control name_list" /></td></tr><tr><td><input type="radio" name="answer'+i+'" value="d" /></td><td><input type="text" name="optionD[]" placeholder="Enter option D" class="form-control name_list" /></td></tr></table></div>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
			j++;
		  var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });    
 });  
 </script>
   