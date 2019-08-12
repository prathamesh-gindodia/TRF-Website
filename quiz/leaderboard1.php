<?php
	///////Quiz id can only be an integer
	require('../cms/includes/db.php'); 
	session_start();
?>
<html>
<body>

<form name="form" action="" method="post">
	<input size="50" type="text" name="quizName" id="quizName" list="List" placeholder="Enter Quiz Name"/ value="<?php if(isset($_POST['quizName'])){echo $_POST['quizName'];} ?>">
	<input size="50" type="text" name="dep" id="dep" list="List3" placeholder="Department" />
	
	<select id="List2" name="year"> <!-- Year_filter  -->
	<option value="">Select Year</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	</select>

	<br>
	<br>
	<input type="submit" name="submit" value="Submit"/>
</form>

  <datalist id="List">
  <?php 
  	
  	//Search bar for quiz ids
	$query = "SELECT * FROM `quiz` WHERE 1 ";
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_array($result))
		{?>
			<option value="<?php echo $row['quizName'];?>">
			<?php
			} 
			?>
</datalist>

<datalist id="List3">
  				<?php 
  	
  				//Search for department
				$query = "SELECT * FROM `users` GROUP BY `Branch`";
				$result = mysqli_query($con,$query);
				while($row = mysqli_fetch_array($result))
					{
					?>
					<option value="<?php echo $row['Branch']; ?>">
					<?php
					} 
				?>
				</datalist>

  
        
<?php
if(!empty($_POST['submit'] ))
	{
	 if(!empty($_POST['quizName']))
	 	{ ?>
			<table>
        <tr>
          <th colspan="2">Position</th>
          <th colspan="2">Username</th>      
         <th colspan="2">Score</th>
         <th colspan="2">Department</th>
         <th colspan="2">Year</th>
        </tr>
        <?php
	 	$quiz_name=$_POST['quizName'];
	 	if(empty($_POST['dep']) AND empty($_POST['year']))
	 			{
				//Getting quiz id from quiz name
				$qq="SELECT * FROM `quiz` WHERE `quizName`='$quiz_name'";
				$rr = mysqli_query($con,$qq);
				$row11 = mysqli_fetch_array($rr);
				$quiz_id=$row11['quizId'];
				
				$depart=$_POST['dep'];
				$year=$_POST['year'];			
		
				$query = "SELECT * FROM `quizresponse` where `quizresponse`.`quizId`=$quiz_id  ORDER BY `quizresponse`.`score` DESC";
				$result = mysqli_query($con,$query);
				if (!$result)
			 		{
    				printf("Error: %s\n", mysqli_error($con));
    				exit();
					}
	
  				$ranking = 1;
    
				while($row = mysqli_fetch_array($result))
					{
					$user_id=$row['userId'];
					$query1 = "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$user_id ";	
					$result1 = mysqli_query($con,$query1);
					if (!$result1)
			 			{
    					printf("Error: %s\n", mysqli_error($con));
    					exit();
						}
					$row1 = mysqli_fetch_array($result1);
				  	?>
	<tr>
             	<td colspan="2"><?php echo $ranking; ?></td>
             	<td colspan="2"><?php echo $row1['username']; ?></td>       
             	<td colspan="2"><?php echo $row['score']; ?></td>
             	<td colspan="2"><?php echo $row1['Branch']; ?></td>
             	<td colspan="2"><?php echo $row1['Year']; ?></td>
					</tr>					
             
           		<?php
           		
             	$ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
         		} // END OF WHILE LOOP 
       		?>  </table> 
       		<?php
       		}
       	 else if(!empty($_POST['dep']) AND !empty($_POST['year'])) 
       	 	
       	 	{
       	 		//Getting quiz id from quiz name
				$qq="SELECT * FROM `quiz` WHERE `quizName`='$quiz_name'";
				$rr = mysqli_query($con,$qq);
				$row11 = mysqli_fetch_array($rr);
				$quiz_id=$row11['quizId'];
				
				$depart=$_POST['dep'];
				$year=$_POST['year'];			
		
				$query = "SELECT * FROM `quizresponse`,`users` where `users`.`Branch`='$depart' and `users`.`Year`=$year and `quizresponse`.`quizId`=$quiz_id and `users`.`user_id`=`quizresponse`.`userId` ORDER BY `score` DESC";
				$result = mysqli_query($con,$query);
				if (!$result)
			 		{
    				printf("Error: %s\n", mysqli_error($con));
    				exit();
					}
	
  				$ranking = 1;
    
				while($row = mysqli_fetch_array($result))
					{
					$user_id=$row['userId'];
					$query1 =  "SELECT `userid`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$user_id ";	
					$result1 = mysqli_query($con,$query1);
					if (!$result1)
			 			{
    					printf("Error: %s\n", mysqli_error($con));
    					exit();
						}
					$row1 = mysqli_fetch_array($result1);
				  	?>
	<tr>
             	<td colspan="2"><?php echo $ranking; ?></td>
             	<td colspan="2"><?php echo $row1['username']; ?></td>       
             	<td colspan="2"><?php echo $row['score']; ?></td>
             	<td colspan="2"><?php echo $row1['Branch']; ?></td>
             	<td colspan="2"><?php echo $row1['Year']; ?></td>
					</tr>					
             
           		<?php
           		
             	$ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
         		} // END OF WHILE LOOP 
       		?>  </table> 
       		<?php
       		}
       		
else if(empty($_POST['dep']) AND !empty($_POST['year'])) 
       	 	
       	 	{
       	 		//Getting quiz id from quiz name
				$qq="SELECT * FROM `quiz` WHERE `quizName`='$quiz_name'";
				$rr = mysqli_query($con,$qq);
				$row11 = mysqli_fetch_array($rr);
				$quiz_id=$row11['quizId'];
				
				$depart=$_POST['dep'];
				$year=$_POST['year'];			
		
				$query = "SELECT * FROM `quizresponse`,`users` where `users`.`Year`=$year and `quizresponse`.`quizId`=$quiz_id and `users`.`user_id`=`quizresponse`.`userId` ORDER BY `score` DESC";
				$result = mysqli_query($con,$query);
				if (!$result)
			 		{
    				printf("Error: %s\n", mysqli_error($con));
    				exit();
					}
	
  				$ranking = 1;
    
				while($row = mysqli_fetch_array($result))
					{
					$user_id=$row['userId'];
					$query1 = "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$user_id ";		
					$result1 = mysqli_query($con,$query1);
					if (!$result1)
			 			{
    					printf("Error: %s\n", mysqli_error($con));
    					exit();
						}
					$row1 = mysqli_fetch_array($result1);
				  	?>
	<tr>
             	<td colspan="2"><?php echo $ranking; ?></td>
             	<td colspan="2"><?php echo $row1['username']; ?></td>       
             	<td colspan="2"><?php echo $row['score']; ?></td>
             	<td colspan="2"><?php echo $row1['Branch']; ?></td>
             	<td colspan="2"><?php echo $row1['Year']; ?></td>
					</tr>					
             
           		<?php
           		
             	$ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
         		} // END OF WHILE LOOP 
       		?>  </table> 
       		<?php
       		}
       		
else if(!empty($_POST['dep']) AND empty($_POST['year'])) 
       	 	
       	 	{
       	 		//Getting quiz id from quiz name
				$qq="SELECT * FROM `quiz` WHERE `quizName`='$quiz_name'";
				$rr = mysqli_query($con,$qq);
				$row11 = mysqli_fetch_array($rr);
				$quiz_id=$row11['quizId'];
				
				$depart=$_POST['dep'];
				$year=$_POST['year'];			
		
				$query = "SELECT * FROM `quizresponse`,`users` where `users`.`Branch`='$depart'and `quizresponse`.`quizId`=$quiz_id and `users`.`user_id`=`quizresponse`.`userId` ORDER BY `score` DESC";
				$result = mysqli_query($con,$query);
				if (!$result)
			 		{
    				printf("Error: %s\n", mysqli_error($con));
    				exit();
					}
	
  				$ranking = 1;
    
				while($row = mysqli_fetch_array($result))
					{
					$user_id=$row['userId'];
					$query1 =  "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$user_id ";	
					$result1 = mysqli_query($con,$query1);
					if (!$result1)
			 			{
    					printf("Error: %s\n", mysqli_error($con));
    					exit();
						}
					$row1 = mysqli_fetch_array($result1);
				  	?>
				 	<tr>
             	<td colspan="2"><?php echo $ranking; ?></td>
             	<td colspan="2"><?php echo $row1['username']; ?></td>       
             	<td colspan="2"><?php echo $row['score']; ?></td>
             	<td colspan="2"><?php echo $row1['Branch']; ?></td>
             	<td colspan="2"><?php echo $row1['Year']; ?></td>
					</tr>						
             
           		<?php
           		
             	$ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
         		} // END OF WHILE LOOP 
       		?>  </table> 
       		<?php
       		}
       		}
       		else {
       			echo "Please select quiz name";
       			}
       		}
       	else
       	 	{
     		
     	$query2 = "SELECT * FROM `quiz` WHERE 1 ";
     	$result2 = mysqli_query($con,$query2);
     	if (!$result2)
			 {
    			printf("Error: %s\n", mysqli_error($con));
    			exit();
     		}?>
     		<table>
        <tr>
          <th colspan="2">Position</th>
          <th colspan="2">Username</th>      
         <th colspan="2">Score</th>
         <th colspan="2">Department</th>
         <th colspan="2">Year</th>
        </tr>
     		<?php
     		while($row2 = mysqli_fetch_array($result2))
     		 {
     		 	$quizId=$row2['quizId'];
     		 	$query3 = "SELECT * FROM `quizresponse` where `quizresponse`.`quizId`=$quizId ORDER by `score` DESC LIMIT 1";
     		 	$result3 = mysqli_query($con,$query3);
     		 	if (!$result3) {
    				printf("Error: %s\n", mysqli_error($con));
    				exit();
					}
     		 	$ranking = 1;
				while($row3 = mysqli_fetch_array($result3))
					{
						$user_id=$row3['userId'];
						$query1 =  "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$user_id ";	
						$result1 = mysqli_query($con,$query1);
						if (!$result1)
			 				{
    							printf("Error: %s\n", mysqli_error($con));
    							exit();
								}
						$row1 = mysqli_fetch_array($result1);
				  			?>
			<tr>
             	<td colspan="2"><?php echo $ranking; ?></td>
             	<td colspan="2"><?php echo $row1['username']; ?></td>       
             	<td colspan="2"><?php echo $row['score']; ?></td>
             	<td colspan="2"><?php echo $row1['Branch']; ?></td>
             	<td colspan="2"><?php echo $row1['Year']; ?></td>
					</tr>				
             
           <?php
           		
             	$ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
           
         } // END OF WHILE LOOP 
       ?>  
       <?php
						}
      
  	 
						?></table>
					<?php	
					}
					
					
				?>
</body>
</html>