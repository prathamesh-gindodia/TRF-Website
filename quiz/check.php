<?php
	/*THings to do
	1)set user id($id) and quiz id($quizId) in session variable
	2)what if user resubmits the test*/
	require('../cms/includes/db.php'); 

	if(isset($_POST['total']))
	{
	$ans_string=$_POST['total'];
	$quizId=0;
	$ids = explode(',', $ans_string);
	$correct = 0;
	$i = 0;
	$qry = "SELECT `quizId`, `questionId`, `questions`, `optionA`, `optionB`, `optionC`, `optionD`, `correctOption` FROM `quizquestion` WHERE `quizId` = $quizId"; 
 	$run1 = mysqli_query($connection, $qry);
	while($data=mysqli_fetch_assoc($run1))
	{
		if($data['correctOption'] == $ids[$i])
		{
			$correct++;
			
		}
		$i++;
	}
	$user_id = 3;
	$query = "INSERT INTO `quizresponse`(`quizId`, `userId`, `score`) VALUES ('$quizId','$user_id','$correct')";
	$run = mysqli_query($connection, $query);
	echo "Test submitted successfully";	
	}
	else
	{
		echo "quiz not submitted";
	}
	

?>