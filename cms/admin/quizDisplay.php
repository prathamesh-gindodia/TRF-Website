<!doctype html>
<?php include "includes/admin_header.php" ?>
<?php

 $quizId = 1;
 $i = 0;
 $qry = "SELECT `quizId`, `questionId`, `questions`, `optionA`, `optionB`, `optionC`, `optionD`, `correctOption` FROM `quizquestion` WHERE `quizId` = $quizId"; 
 $run = mysqli_query($connection, $qry);

 ?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
 
<body>
<form action="quizDisplay.php" method="post">
<table align="center">
<?php while($data=mysqli_fetch_assoc($run)){?>
<tr>
<td><?php echo $data['questions']; ?></td>
 
</tr>
<tr>
<td></td>
<td><input type="radio" name="answer<?php echo $i; ?>" value="a"><?php echo $data['optionA']; ?></td>
</tr>
<tr>
<td></td>
<td><input type="radio" name="answer<?php echo $i; ?>" value="b"><?php echo $data['optionB']; ?></td>
</tr>
<tr>
<td></td>
<td><input type="radio" name="answer<?php echo $i; ?>" value="c"><?php echo $data['optionC']; ?></td>
</tr>
<tr>
<td></td>
<td><input type="radio" name="answer<?php echo $i; ?>" value="d"><?php echo $data['optionD']; ?></td>
</tr>
<?php $i++;
	} ?>
<tr>
<td><input type="submit" name="submit" value="submit"></td>
<td><input type="submit" name="check" value="check result"></td>
</tr>
</table>
</form>
</body>
</html>


<?php
if(isset($_POST['submit']))
{
	$correct = 0;
	$i = 0;
	$qry = "SELECT `quizId`, `questionId`, `questions`, `optionA`, `optionB`, `optionC`, `optionD`, `correctOption` FROM `quizquestion` WHERE `quizId` = $quizId"; 
 $run1 = mysqli_query($connection, $qry);
	while($data=mysqli_fetch_assoc($run1))
	{
		$q = "answer$i";
		if($data['correctOption'] == $_POST[$q])
		{
			$correct++;
			
		}
		$i++;
	}
	$id = 1;
	echo $correct;
	$query = "INSERT INTO `quizresponse`(`quizId`, `userId`, `score`) VALUES ('$quizId','$id','$correct')";
	$run = mysqli_query($connection, $query);
	
}


?>