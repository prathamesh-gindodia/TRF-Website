<?php
$connection = mysqli_connect('localhost','root','','trfwebsite');
$query = "SELECT * FROM `quiz`";
$run = mysqli_query($connection, $query);
$row = mysqli_num_rows($run);
$count = 0;
?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bootstrap Table Search</title>
  
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>

      <link rel="stylesheet" href="./style.css">

  
</head>

<body>

  <div class="form-group pull-center col-md-5">
    <input type="text" class="search form-control" placeholder="Search for Quizes">
	</div>
	<div class="form-group pull-center">
	<button type="button" name="add" id="add" class="btn btn-success">Add New</button> 
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
		<tr>
		  <th>Sr.No</th>
		  <th>Quiz Name</th>
		  <th>Quiz Discription</th>
		  <th>Start Date</th>
		  <th>End Date</th>
		  <th>More Details</th>
		  <th>Edit</th>
		  <th>Delete</th>
		</tr>
		<tr class="warning no-result">
		  <td colspan="8"><i class="fa fa-warning danger"></i> No result</td>
		</tr>
	  </thead>
	  <tbody>
		<?php
  while($data = mysqli_fetch_assoc($run))
	{ 
		$count++;
		?>
		<tr>
		  <th scope="row"><?php echo $count;?></th>
		  <td><?php echo $data['quizName'];?></td>
		  <td><?php echo $data['discription'];?></td>
		  <td><?php echo $data['startDate'];?></td>
		  <td><?php echo $data['endDate'];?></td>
		  <td><a href="updateform/updateform.php?sid=<?php echo $data['quizId']; ?>">More details</a></td>
		  <td><a href="updateform/updateform.php?sid=<?php echo $data['quizId']; ?>">edit</a></td>
		  <td><a href="updateform/updateform.php?sid=<?php echo $data['quizId']; ?>">Delete</a></td>
		</tr>
<?php } ?>
  </tbody>
</table>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="./script.js"></script>




</body>

</html>
