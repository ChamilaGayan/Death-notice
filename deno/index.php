<?php

include 'connection/config.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

   
    $sql_cat="SELECT dname,contact,adid,file_name,addr,birth,death from addn ORDER BY adid DESC";
    
    $cat_result = mysqli_query($db,$sql_cat);

?>
<!DOCTYPE html> 
<html lang="en"> 
    <head>
        <meta charset="utf-8" />
       
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Death Notice</title>
        <link href="css/stylesa.css" rel="stylesheet" />
        <link href="css/set.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
	

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 10px 10px 5px grey;">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto" style="float: right;">
              <center><h3 style="color:#176628;" >Keeping Memories Alive</h3></center>
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" >Home &emsp;</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="login/login.php" style="color:blue;">List Your Deth Alert &emsp;</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="edit/search.php">Search  &emsp;</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
                
  

<br>
<center>   &emsp;  &emsp;  &emsp;
<img  id="Page 1" width="400" height="300"
src="images/a.png" alt="Page 1">
</center>


<br>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container1">
                        <div class="row">
						<div class="card-group" >
						<?php  
						$i=0;
						while($row = mysqli_fetch_array($cat_result) ){
						
							if($i ==6){?>  <div class="card-group" >  <?php $i=0; } ?>
							
                            
   
  <div class="card">
    

    <div class="card-body">
    <center><h5 style=" font-weight: bold;color:black">Rest in Peace</h5></center>
      <h5 class="card-title"> <?php echo $row['dname'];?></h5>
		
     
      <br>
<?php
$imageURL='uploads/'.$row["file_name"];

echo "<center>   <img id='scream' width='100' height='100'
  src='$imageURL' alt='The Scream'  style='box-shadow: 10px 10px 5px grey;'>
  </center>";
?><br>
    <center> <img id="Page 1" width="150" height="80"
src="images/2.jpg" alt="Page 1" ></center> 
     
      
      <?php

  echo "<center> <h6  style='color:black'> $row[addr]</h6> 
  </center> ";
  echo "<center> <h6 style='color:black'>  Birth: $row[birth]<br> Death: $row[death]</h6> 
  </center> ";
    ?>
    </p>
    <br>
    &emsp;&emsp; <?php  echo  "<a href='view.php?id=".$row["adid"]."'>" ?> 


   <?php echo "<center><input style='height:35px;width:150px' type='button' class='card-title' onclick='location.href='view.php?id=".$row["adid"]."';' value='view' /> </center>"; ?> 
    </div>
  </div>
  
  
 <?php 
 if($i ==6){?>  </div>  <?php  } 
 	++$i;
 }?>
  </div>
				
							
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
 
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>


        <?php
        include 'connection/footer.php';
       ?>
    </body>
</html>
