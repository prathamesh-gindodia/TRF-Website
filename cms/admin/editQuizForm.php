<?php include "includes/admin_header.php" ?>

   <?php 

if(isset($_POST['submit']))
{	 

$number = count($_POST["name"]);
echo $number;
$discription = $_POST["discription"];
$quizName = $_POST["quizName"];
$id = $_POST['sid'];
//echo $id;
$startTime = $_POST["startTime"];
$endTime = $_POST["endTime"];
$qry = "UPDATE `quiz` SET `quizName`='$quizName',`discription`='$discription',`startDate`='$startTime',`endDate`='$endTime' WHERE `quizId` = '$id'";
$run = mysqli_query($connection, $qry);
$q2 = "DELETE FROM `quizquestion` WHERE `quizId`='$id'";
$run2 = mysqli_query($connection,$q2);
//$q1 = "SELECT `questionId` FROM `quizquestion` WHERE `quizId` = '$id'";
//$run = mysqli_query($connection, $q1);
//$storearray = Array();
//while($res = mysqli_fetch_array($run))
//	$storearray[] = $res['questionId'];

//echo $storearray[0]; 
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
				$query = "INSERT INTO `quizquestion`(`quizId`,`questions`,`optionA`,`optionB`,`optionC`,`optionD`,`correctOption`) VALUES ('$id','$n','$a','$b','$c','$d','$ans')";
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