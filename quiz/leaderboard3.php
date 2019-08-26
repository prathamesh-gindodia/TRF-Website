<?php
  require('../cms/includes/header.php'); 
  require('../cms/includes/db.php'); 
?>


<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="leaderboard_style.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
              <form id="sampleForm" name="sampleForm" method="post" action="">
                    <input type="hidden" name="dep" id="dep" value="">  
                    <input type="hidden" name="year" id="year" value="">
                    <input type="hidden" name="quizName" id="quizName" value="">
                    <input type="hidden" name="kk1" id="kk1" value="<?php if(isset($_POST['kk1'])){echo $_POST['kk1'];} else{echo "0";}?>">
                    <input type="submit" name="submit" id="submit_dep" value="submit">
            </form>
 
        <div class="wrapper">
            <div class="container">
            <div class="row">
                    <div class="col-xs-12">
          <div class="list" style="display: inline; float: left;">
             <!------------------------------------------------HEADER-------------------------------------------------------------->
            <div class="list__header" style="width: 100%;">
              <h1 id="title">Leaderboard</h1>
              <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn" id="butnn" style="font-weight: bold; font-size: 23px;"><?php if(isset($_POST['quizName'])){echo $_POST['quizName'];} else{echo "QUIZ TITLE";}?></button>
                  <?php 
    
                      //Search bar for quiz ids
                    $query = "SELECT * FROM `quiz` WHERE 1 ";
                    $result = mysqli_query($con,$query);
                    
                    ?>
                    <div id="myDropdown" class="dropdown-content">
                        <input type="text" placeholder="Search.." id="myInput" >
                        <?php
                        $k=1;
                        while($row = mysqli_fetch_array($result))
                      {?>
                        <a href="javascript:void(0)" id="<?php echo $k ?>" name="<?php echo $k ?>"><?php echo $row['quizName'];?></a>
                        <?php
                        $k++;
                        } 
                        ?>
                      </div>
                </div>
            </div>
              <!-------------------------------------------------TABLE---------------------------------------------------------------->

            <div class="list__body">
                            <?php
      if(!empty($_POST['submit'] ))
        {
          if(!empty($_POST['quizName']))
            { ?>
              <table class="list__table">
                <tr class="first__row" >
                  <td class="list__cell"><span class="list__value" style="text-align: center;">Rank</span></td>
                    <td class="list__cell"><span class="list__value" style="text-align: center;">Username</span></td>
                    <td class="list__cell"><span class="list__value">Score</span></td>
                    <td class="list__cell"><span class="list__value">Department</span></td>
                    <td class="list__cell"><span class="list__value">Year</span></td>
                    
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
  
          $ranking = 1;?>
                          <tr class="list__row" >
                  <td class="list__cell"><span class="list__value">33</span></td>
                  <td class="list__cell"><span class="list__value"><?php $_SESSION['user_id']?></span></td>
                  <td class="list__cell"><span class="list__value">Computer</span></td>
                    <td class="list__cell"><span class="list__value">First Year</span></td>
                  <td class="list__cell"><span class="list__value">66</span></td>
                </tr>
    <?php
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
                  <tr class="list__row" >
                  <td class="list__cell"><span class="list__value"><?php echo $ranking; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['username']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row['score']; ?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $row1['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['Year']; ?></span></td>
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
  
          $ranking = 1;?>
          <tr class="list__row" >
                  <td class="list__cell"><span class="list__value">33</span></td>
                  <td class="list__cell"><span class="list__value">Current User</span></td>
                  <td class="list__cell"><span class="list__value">Computer</span></td>
                    <td class="list__cell"><span class="list__value">First Year</span></td>
                  <td class="list__cell"><span class="list__value">66</span></td>
                </tr>
          <?php
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
            ?><tr class="list__row" >
                  <td class="list__cell"><span class="list__value"><?php echo $ranking; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['username']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row['score']; ?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $row1['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['Year']; ?></span></td>
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
  
          $ranking = 1;?>
          <tr class="list__row" >
                  <td class="list__cell"><span class="list__value">33</span></td>
                  <td class="list__cell"><span class="list__value">Current Userhi</span></td>
                  <td class="list__cell"><span class="list__value">Computer</span></td>
                    <td class="list__cell"><span class="list__value">First Year</span></td>
                  <td class="list__cell"><span class="list__value">66</span></td>
                </tr>
          <?php
    
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
  <tr class="list__row" >
                  <td class="list__cell"><span class="list__value"><?php echo $ranking; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['username']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row['score']; ?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $row1['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['Year']; ?></span></td>
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
  
          $ranking = 1;?>
          <tr class="list__row" >
                  <td class="list__cell"><span class="list__value">33</span></td>
                  <td class="list__cell"><span class="list__value">Current Usehikfcsknr</span></td>
                  <td class="list__cell"><span class="list__value">Computer</span></td>
                    <td class="list__cell"><span class="list__value">First Year</span></td>
                  <td class="list__cell"><span class="list__value">66</span></td>
                </tr>
          <?php
    
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
          <tr class="list__row" >
                  <td class="list__cell"><span class="list__value"><?php echo $ranking; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['username']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row['score']; ?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $row1['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['Year']; ?></span></td>
                </tr>       
             
              <?php
              
              $ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
            } // END OF WHILE LOOP 
          ?>  </table> 
          <?php
          }



      }//title if
      else {
            echo "Please select quiz name";
            }
          
        }//submit if 
          else
          {
        
      $query2 = "SELECT * FROM `quiz` WHERE 1 ";
      $result2 = mysqli_query($con,$query2);
      if (!$result2)
       {
          printf("Error: %s\n", mysqli_error($con));
          exit();
        }?>
        <table class="list__table">
        <tr class="first__row" >
                  <td class="list__cell"><span class="list__value" style="text-align: center;">Rank</span></td>
                    <td class="list__cell"><span class="list__value" style="text-align: center;">Username</span></td>

                    <td class="list__cell"><span class="list__value">Department</span></td>
                    <td class="list__cell"><span class="list__value">Year</span></td>
                    
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
      <tr class="list__row" >
                  <td class="list__cell"><span class="list__value"><?php echo $ranking; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['username']; ?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $row1['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['Year']; ?></span></td>
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


              
                
            </div>
              
          </div>
             <div class="continput" style="position: relative; display: inline; float: left;margin-top:50px; margin-left: 3% !important;">
    <h1>DEPARTMENT</h1>
  <ul>
        <li>
      <input checked type="radio" name="1" id="all1" value="">
      <label for="all1">All</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
    <li>

      <input  type="radio" name="1" id="comp" value="Computer">
      <label for="comp">Computer</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
    <li>
      <input type="radio" name="1" id="it" value="IT">
      <label for="it">IT</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
    <li>
      <input type="radio" name="1" id="entc" value="E&TC">
      <label for="entc">E&amp;TC</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input type="radio" name="1" id="elex" value="Electronics">
      <label for="elex">Electronics</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input type="radio" name="1" id="instru" value="Instrumentation">
      <label for="instru">Instrumentation</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input type="radio" name="1" id="mech" value="Mechanical">
      <label for="mech">Mechanical</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input type="radio" name="1" id="chem" value="Chemical">
      <label for="chem">Chemical</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input type="radio" name="1" id="indus" value="Industrial and Production">
      <label for="indus">Industrial and Production</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        
  </ul>
    <br>
    <hr>
    <h1>YEAR</h1>
    <ul>
        <li>
      <input checked type="radio" name="2" id="all2" value="">
      <label for="all2">All</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
    <li>
      <input type="radio" name="2" id="fy"  value="1">
      <label for="fy">First Year</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input  type="radio" name="2" id="sy" value="2">
      <label for="sy">Second Year</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input  type="radio" name="2" id="ty" value="3">
      <label for="ty">Third Year</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input  type="radio" name="2" id="final" value="4">
      <label for="final">Fourth Year</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
   </ul>
</div>
                </div>
                </div>
            </div>
        </div>
        


        <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
              if(!event.target.matches('#myInput')){
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            
          }
        }

        function changeFunction(){
            alert($("this").html());
        }
          var kk;
            $('a').click(function(){
                var quiz_title = $(this).get(0).innerHTML;
                kk = $(this).get(0).name;
               
                document.getElementById("butnn").innerHTML=quiz_title;
                document.sampleForm.quizName.value=quiz_title;
                document.sampleForm.kk1.value=kk;
                $('#submit_dep').click();

            });
           
            $('input[type=radio]').on('change', function() {
              var dep = "";
              var year = "";
                 dep = $('input[name=1]:checked').val();
                 year = $('input[name=2]:checked').val();
                document.sampleForm.dep.value=dep;
                document.sampleForm.year.value=year;
                var kkk = $('input[name=kk1]').val();

                $('a[name='+ kkk + ']').click();
            });
            
    </script>
        
    </body>
</html>