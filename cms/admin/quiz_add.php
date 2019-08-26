
   <?php

if(isset($_POST['submit']))
{
 $connection = mysqli_connect("localhost", "root", "", "trf_website");
if(!$connection)
		echo "not connected";
 $number = count($_POST["name"]);
$discription = $_POST["discription"];
$quizName = $_POST["quizName"];
$quizId = uniqid();
$startTime = $_POST["startTime"];
$endTime = $_POST["endTime"];
$qry = "INSERT INTO `quiz`(`quizId`,`quizName`, `discription`,`startDate`,`endDate`) VALUES ('$quizId','$quizName','$discription','$startTime','$endTime')";
$run = mysqli_query($connection, $qry);


 if($number > 0)
 {
      for($i=0; $i<$number; $i++)
      {
				$q="answer$i";
                $n = $_POST['name'][$i];
				$a = $_POST['optionA'][$i];
                $b = $_POST['optionB'][$i];
                $c = $_POST['optionC'][$i];
                $d = $_POST['optionD'][$i];
				$ans = $_POST[$q];
				$query = "INSERT INTO `quizquestion`(`quizId`,`questions`, `optionA`, `optionB`, `optionC`, `optionD`,`correctOption`)
	            VALUES('$quizId',
				'$n',
				'$a',
				'$b',
				'$c',
				'$d',
				'$ans')";
				$run = mysqli_query($connection, $query);
					if(!$run)
					{
						?>
						<script>
							alert('Data NOT inserted Successfully!!');
						</script>
						<?php
					}
      }
      echo "Data Inserted";
 }
 else
 {
      echo "Please Enter Name";
 }
}
 ?>
 <?php include "includes/admin_header.php" ?>


   <div id="wrapper">





         <!-- Navigation -->

         <?php include "includes/admin_navigation.php" ?>




 <div id="page-wrapper">



           <div class="container-fluid">
                <br />
                <br />
                <h2 align="center"></h2>
                <div class="form-group">
                     <form action="quiz_add.php" id="add_name" method="POST">
                          <div class="table-responsive" id="dynamic_field">
                               <table class="table table-bordered" >
                                    <tr>
										<td><input type="text" name="quizName" placeholder="quiz name" class="form-control name_list" /></td>
										<td><input type="datetime-local" name="startTime" placeholder="Start time" class="form-control name_list" /></td>
										<td><input type="datetime-local" name="endTime" placeholder="End time" class="form-control name_list" /></td>
									</tr>
								</table>
									<textarea name="discription" placeholder="discription box" rows="5" cols="26" style="margin: 0px; width: 1140px; height: 132px;"></textarea>

								<br>
								<br>
								<table class="table table-bordered" >
									<tr>
                                         <td>Correct option</td>
										 <td><input type="text" name="name[]" placeholder="Enter question" class="form-control name_list" /></td>

                                    </tr>
									<tr>
												<td><input type="radio" name="answer0" value="a" /></td>
												<td><input type="text" name="optionA[]" placeholder="Enter option A" class="form-control name_list" /></td>

									</tr>
											<tr>
												<td><input type="radio" name="answer0" value="b" /></td>
												<td><input type="text" name="optionB[]" placeholder="Enter option B" class="form-control name_list" /></td>
											</tr>

											<tr>
												<td><input type="radio" name="answer0" value="c" /></td>
												<td><input type="text" name="optionC[]" placeholder="Enter option C" class="form-control name_list" /></td>
											</tr>

											<tr>
												<td><input type="radio" name="answer0" value="d" /></td>
												<td><input type="text" name="optionD[]" placeholder="Enter option D" class="form-control name_list" /></td>

									</tr>
							   </table>
                          </div>
                               <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
								<button type="button" name="add" id="add" class="btn btn-success">Add More</button>

                     </form>
                </div>
           </div>
         </div>
       </div>
             <?php include "includes/admin_footer.php" ?>



 <script>
 $(document).ready(function(){
      var i=0;
      var j=1;
      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<div id="row'+i+'"><br><br><table class="table table-bordered"><tr><td>Correct option</td><td><input type="text" name="name[]" placeholder="Enter question" class="form-control name_list" /></td></tr><tr><td><input type="radio" name="answer'+i+'" value="a" /></td><td><input type="text" name="optionA[]" placeholder="Enter option A" class="form-control name_list" /></td></tr><tr><td><input type="radio" name="answer'+i+'" value="b" /></td><td><input type="text" name="optionB[]" placeholder="Enter option B" class="form-control name_list" /></td></tr><tr><td><input type="radio" name="answer'+i+'" value="c" /></td><td><input type="text" name="optionC[]" placeholder="Enter option C" class="form-control name_list" /></td></tr><tr><td><input type="radio" name="answer'+i+'" value="d" /></td><td><input type="text" name="optionD[]" placeholder="Enter option D" class="form-control name_list" /></td></tr></table></div>');
      });
      $(document).on('click', '.btn_remove', function(){
			j++;
		  var button_id = $(this).attr("id");console.log(button_id);
           $('#row'+button_id+'').remove();
      });
 });
 </script>
