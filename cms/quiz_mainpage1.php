<?php
$arr=array();
$arr1=array();
$con=mysqli_connect("localhost","root","","trf_website");
$query="SELECT * FROM `quiz`  ORDER BY startDate DESC";
$run=mysqli_query($con,$query);
$total_number=mysqli_num_rows($run);
while($row=mysqli_fetch_assoc($run))
{
  $arr[]=$row;
}
//print_r($arr);
$results_per_page=5;//number of values to be displayed per page
$number_of_pages=ceil($total_number/$results_per_page);//total number of pages
if(!isset($_GET['page'])){
  $page=1;
}
  else {
    $page=$_GET['page'];
  }







$this_page_first=($page-1)*$results_per_page;
$qry1="SELECT * FROM `quiz`ORDER BY startDate DESC LIMIT ".$this_page_first. ','.$results_per_page;
$result=mysqli_query($con,$qry1);
while($row1=mysqli_fetch_assoc($result))
{
  $arr1[]=$row1;
}
//print_r($arr1);
?>




<html>
<head>
    <title>Quiz display</title>
    <link rel="stylesheet" href="quiz_mainpage_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="pagination.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.solodev.com/assets/pagination/jquery.twbsPagination.js"></script>
</head>
<body>
  <?php
for($i=0;$i<count($arr1);$i++){
?>
      <div id='main' onclick='runscript(this)'>

        <div class='container'>
            <div class='row'>

                <div class='col-md-8'>
                    <h3 id='quiz_title'><?php echo $arr1[$i]['quizName'];?></h3>
                </div>

                <div class='col-md-2'>
                    <h5 id='date'><?php  echo $arr1[$i]['startDate'].' to '.$arr1[$i]['endDate'];?></h5>
                </div>

                <div class='col-md-2'>
                    <button id='start' type='button'  onclick="window.location='quiz_debug.php?bid=<?php echo $arr1[$i]['quizId'] ?>' ">START </button>
                </div>

            </div>
        </div>


        <div id='hidden-content' style='display: none;'>
            <hr>
            <h4>Description:</h4>
            <p><?php echo $arr1[$i]['discription'];?></p>
            <h4>Time:<?php echo $arr1[$i]['duration'] ?></h4>
        </div>

    </div>
<?php
  }
  ?>
  <?php
/*
if($page>1)
{
echo '<a href="quiz_mainpage1.php?page=' .($page-1). '" > Previous </a>';

}
for($i=1;$i<=$number_of_pages;$i++){
  if($i==$page)
  echo '<a class="active">'.  $i  .'</a>';
  else
  echo "<a href='quiz_mainpage1.php?page=".$i. "' >$i</a>";
}
if($page<$number_of_pages)
{
echo '<a href="quiz_mainpage1.php?page=' .($page+1). '" > Next </a>';

}*/


 ?>

 <nav aria-label="Page navigation example">
 <ul class="pagination">
 <li  id="previous-page">
   <a class="page-link" href="javascript:void(0)" aria-label="Previous">
     <span aria-hidden="true">&laquo;</span>
   </a>
 </li>
 <!-- <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
 <li class="page-item"><a class="page-link" href="javascript:void(0" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>-->
 </ul>
 </nav>

    <script>

        function runscript(object){

            if(object.querySelector('#hidden-content').style.display=="none"){
                object.querySelector('#hidden-content').style.display="block";
            }
            else if(object.querySelector('#hidden-content').style.display=="block"){
                object.querySelector('#hidden-content').style.display="none";
            }
}

</script>
</script>

     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous">
    </script>

      <script>
      'use strict';
      var curr="<?php echo $page ?>"
          var numberOfItems = "<?php echo $total_number;?>";
          var limitPerPage = 5;
          var totalPages = Math.ceil(numberOfItems / limitPerPage);
          $(".pagination").append("<li class='page-item '><a href='javascript:void(0)' class='page-link'>" + 1 + "</a></li>");
          for (var i = 2; i <= totalPages; i++) {
              $(".pagination").append("<li class='page-item '><a href='javascript:void(0)' class='page-link'>" + i + "</a></li>"); // Insert page number into pagination tabs
            }

          $(".pagination").append("<li id='next-page'><a class='page-link' href='javascript:void(0' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
          var temp = document.getElementsByClassName("page-link")
        for(var c=1;c<temp.length;c++){
            if(temp[c].innerHTML==curr){
                var t = document.getElementsByClassName("page-item");
                t[c-1].classList.add("active");
                break;

         }
        }

          $(".pagination li.page-item").on("click", function() {
              // Check if page number that was clicked on is the current page that is being displayed
              if ($(this).hasClass('active')) {
                return false; // Return false (i.e., nothing to do, since user clicked on the page number that is already being displayed)
              } else {
                var currentPage = $(this).index();
                // Get the current page number
                $(".pagination li").removeClass('active'); // Remove the 'active' class status from the page that is currently being displayed
                $(this).addClass('active'); // Add the 'active' class status to the page that was clicked on
              }
              window.location.replace("quiz_mainpage1.php?page="+currentPage);
            });

          $("#next-page").on("click", function() {
              var currentPage = $(".pagination li.active").index(); // Identify the current active page
              // Check to make sure that navigating to the next page will not exceed the total number of pages
              if (currentPage === totalPages) {
                return false; // Return false (i.e., cannot navigate any further, since it would exceed the maximum number of pages)
              } else {
                currentPage++; // Increment the page by one
                $(".pagination li").removeClass('active'); // Remove the 'active' class status from the current page
                $(".pagination li.page-item:eq(" + (currentPage - 1) + ")").addClass('active'); // Make new page number the 'active' page
              }
                window.location.replace("quiz_mainpage1.php?page="+currentPage);
            });

          $("#previous-page").on("click", function() {
              var currentPage = $(".pagination li.active").index(); // Identify the current active page
              // Check to make sure that users is not on page 1 and attempting to navigating to a previous page
              if (currentPage === 1) {
                return false; // Return false (i.e., cannot navigate to a previous page because the current page is page 1)
              } else {
                currentPage--; // Decrement page by one
                $(".pagination li").removeClass('active'); // Remove the 'activate' status class from the previous active page number
                $(".pagination li.page-item:eq(" + (currentPage - 1) + ")").addClass('active'); // Make new page number the 'active' page
              }
                window.location.replace("quiz_mainpage1.php?page="+currentPage);
            });
            </script>

    <ul id="pagination-demo" class="pagination-lg pull-right" ></ul>

</body>


</html>
