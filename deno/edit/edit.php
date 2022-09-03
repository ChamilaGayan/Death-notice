<?php

include '../connection/config.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (strlen($_SESSION['id']==0)) {
      header('<location:../login/logout.php');
      } else{
      }
 
 


   
    //$query="SELECT dname,contact,adid,file_name,addr,birth,death,user_id,cmt from addn WHERE user_id = $uid";
  

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Death Notice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/set.css">
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
              <h5 >Edit</h5> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              <li class="nav-item">
                    <a class="nav-link" href="../member.php">Go Back</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login/logout.php">Log Out</a>
                </li>
                
              </ul>
            </div>
          </div>
        </nav>

      
      

   
        <?php


$id = $_GET['id'];

 $query = $db->query("SELECT dname,contact,adid,file_name,addr,birth,death,cmt from addn  WHERE adid = $id ");




if($query !== false && $query->num_rows > 0){
  while($row=$query->fetch_assoc()){
  $imageURL='../uploads/'.$row["file_name"];

  echo " 
  <table id='customers2' style='box-shadow: 10px 10px 5px grey;'>
  <tr>
 
  
  ";



  echo "<td> <div style='border:1px solid #aaa; width: 100%;'>

   
  </center> "; 

  echo "<center> <h5> $row[dname]</h5> 
  </center> ";

  echo "<center>  $row[addr]
  </center> ";
  echo "<center> Birth: $row[birth] <br> Death: $row[death]
  </center> ";

  
  echo "<center>   <img id='scream' width='250' height='250'
  src='$imageURL' alt='The Scream'>
  </center>";


  echo "<center> <p> $row[cmt]</p> 
  </center> </div> </td>
";


  }
}
else{
  ?> 
  <p>No Preview.....</p>
  <?php
}

?>

<td>
<?php

echo '
<form action="delete.php?id=',$id,'" method="post" enctype="multipart/form-data"> 
<input type="submit" class="btna" name="submit" value="Delete Record" style="float:right"><br><br> ';
?>

</form>
<?php

echo '
<form action="update.php?id=',$id,'" method="post" enctype="multipart/form-data"> 

     <code>Change Your Details Here</code>
    <input type="text" style="color:black;box-shadow: 10px 10px 5px grey;"  class="dash2" size="50" name="dn" placeholder="Enter Display Name Here..!" required><br><br>
   
    Select Birth Here 
  <input type="date" style="color:black;box-shadow: 10px 10px 5px grey;" class="dash2" name="birth"  required> <br><br>
  Select Death Here
    <input type="date" style="color:black;box-shadow: 10px 10px 5px grey;" class="dash2" name="death" size="50" required><br><br>
 

    <input type="text"  class="dash2" style="color:black;box-shadow: 10px 10px 5px grey;" name="add" size="50" placeholder="Enter Address Here..!" required><br><br>

    <textarea name="cmt" style="color:black;box-shadow: 10px 10px 5px grey;" rows="1" cols="53" class="dash2" placeholder="Type Your Comment Here...!" required></textarea><br><br>


 
    <input type="submit" class="btn btn-primary" name="submit" value="Change" style="width:130px"> ';
    ?>

</form>




</td>






</tr></table>


        
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <?php
        include '../connection/footer.php';
       ?>
  </body>
</html>

