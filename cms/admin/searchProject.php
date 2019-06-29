

<?php include "includes/admin_header.php" ?>

	<?php
$query = "SELECT * FROM `project`";
$run = mysqli_query($connection, $query);
$row = mysqli_num_rows($run);
$count = 0;
?>
	<div id="wrapper">
       

        
  

        <!-- Navigation -->
 
        <?php include "includes/admin_navigation.php" ?>
        
        
    

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">


            <h1 class="page-header">
                Welcome to admin
                <small>Author</small>
            </h1>

			<!--     Add ur code here         -->

            <div class="col-xs-12">
				
				
				<div class="form-group pull-center col-md-5">
    <input type="text" class="search form-control" placeholder="Search for Quizes">
	</div>
	<div class="form-group pull-center">
	<a href="quiz_add.php"> <button type="button" name="add" id="add" class="btn btn-success">Add New</button> </a> 
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
		<tr>
		  <th>Sr.No</th>
		  <th>Project Title</th>
		  <th>Project Discription</th>
		  <th>Date of publish</th>
		  <th>Status</th>
		  <th>Tags</th>
		  <th>View Project</th>
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
		  <td><?php echo $data['title'];?></td>
		  <td><?php echo $data['description'];?></td>
		  <td><?php echo $data['date'];?></td>
		  <td><?php echo $data['status'];?></td>
		  <td><?php echo $data['tags'];?></td>
		  <td><a class='btn btn-primary' href="#">More Details</a></td>
		  <td><a class='btn btn-info' href="editQuiz.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
		  <td><a class='btn btn-danger' href="deleteProject.php?sid=<?php echo $data['id']; ?>">Delete</a></td>
		</tr>
<?php } ?>
  </tbody>
</table>
				

            </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/script-search.js"></script>

</div>




  
        
     
        
        <!-- /#page-wrapper -->
        
    <?php include "includes/admin_footer.php" ?>
