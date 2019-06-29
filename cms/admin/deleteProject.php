
<?php include "includes/admin_header.php" ?>

<?php
	$id = $_REQUEST['sid'];
	$query = "DELETE FROM `project` WHERE `id`='$id'";
	$run = mysqli_query($connection, $query);
	#$query1 = "DELETE FROM `quizquestion` WHERE `quizId`='$id'";
	#$run1 = mysqli_query($connection, $query1);
	
	#if($run)
	#{
		?>
		<script> 
			alert('Data Deleted Successfully!!');
			window.open('searchProject.php','_self');
		</script>
		<?php
	#}
?>