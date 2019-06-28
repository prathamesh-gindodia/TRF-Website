<?php

$connection = mysqli_connect('localhost','root','','trfwebsite');
	$id = $_REQUEST['sid'];
	$query = "DELETE FROM `quiz` WHERE `quizId`='$id'";
	$run = mysqli_query($connection, $query);
	$query1 = "DELETE FROM `quizquestion` WHERE `quizId`='$id'";
	$run1 = mysqli_query($connection, $query1);
	
	#if($run)
	#{
		?>
		<script> 
			alert('Data Deleted Successfully!!');
			window.open('searchQuiz.php','_self');
		</script>
		<?php
	#}
?>