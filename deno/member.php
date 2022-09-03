<?php

include 'connection/config.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (strlen($_SESSION['id']==0)) {
      header('<location:login/logout.php');
      } else{
      }
      $uid =  $_SESSION["id"] ;
      $sql_cat="SELECT dname,contact,adid,file_name,addr,birth,death from addn";
    
      $cat_result = mysqli_query($db,$sql_cat);
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Death Notice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/set.css">
  </head>
  <body>
    
  <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">

		<div class="wrapper d-flex align-items-stretch">
			

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
              <ul class="nav navbar-nav ml-auto">
              <h5 >MEMORIAL</h5> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              <li class="nav-item">
                    <a class="nav-link" href="login/logout.php">Log Out</a>
                </li>
                
              </ul>
            </div>
          </div>
        </nav>

      
              <table align="center">
	<tr>

  <td>
  <center>   &emsp;  &emsp; 
<img  id="Page 1" width="130" height="130"
src="images/a.png" alt="Page 1">
</center>
  <br>
<center>   &emsp;  &emsp;  
<img  id="Page 1" width="130" height="130"
src="images/a.png" alt="Page 1">
</center>
  </td>
	<td>
	
			<div class="carda">
      <center><h5 style="color:#176628;">Keeping Memories Alive</h5></center>

      <img id="Page 1" width="145" height="80"
src="images/2.jpg" alt="Page 1">

			<p><button onclick="document.location='add_notice.php';">Submit Death Notice</button></p>
			</div>
		</td>
    <td>
	
			<div class="carda">
      <center><h5 style="color:#176628;">Keeping Memories Alive</h5></center>
      <img id="Page 1" width="145" height="80"
src="images/2.jpg" alt="Page 1">
			
			 <p>
         

       
   <button style="height: 90px;"  onclick="document.location='edit/summary.php';">View old Notices</button></p>
			</div>
      
		</td>
 <td>
 <center>   &emsp;  &emsp; 
<img  id="Page 1" width="130" height="130"
src="images/a.png" alt="Page 1">
</center>
 <br>
 <center>   &emsp; &emsp; 
<img  id="Page 1" width="130" height="130"
src="images/a.png" alt="Page 1">
</center>

 </td>
    </tr>

    <tr>
      <td>
      <br>
<center>  &emsp;  &emsp;  &emsp;
<img  id="Page 1" width="150" height="150"
src="images/a.png" alt="Page 1">
</center>
      </td>
      <td>
      <br>
<center>  
<img  id="Page 1" width="150" height="150"
src="images/a.png" alt="Page 1">
</center>
      </td>
      <td>
      <br>
<center>   
<img  id="Page 1" width="150" height="150"
src="images/a.png" alt="Page 1">
</center>
      </td>
      <td>
      <br>
<center>   
<img  id="Page 1" width="150" height="150"
src="images/a.png" alt="Page 1">
</center>
      </td>
    </tr>
    </table>
        
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <?php
        include 'connection/footer.php';
       ?>
  </body>
</html>

