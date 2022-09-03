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
    $uid =  $_SESSION["id"] ;

    $query = $db->query("SELECT * FROM addn WHERE user_id = $uid ORDER BY adid DESC");

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
              <h5 >Summary</h5> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
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

       
      

   
   <!-- Database View -->
  
   <table border = 1px style="width:100%" >

<tr>

    <th>
      Name
    </th>
   <th>
     Uploaded Date
   </th>
    
    <th>
      Address
    </th>

    <th>
   <center>   View  </center>
    </th>

<?php

if($query->num_rows>0){
while($row=$query->fetch_assoc()){
  $row["adid"];
echo "<tr>

<td>". $row["dname"]. "</td>
<td>". $row["uploaded_on"]. "</td>

<td>". $row["addr"]. "</td>

<td><center>  <a href='edit.php?id=".$row["adid"]."'> <p style=color:brown> View </p> </a> </center> </td>
</tr>";           

}
}
else{

echo "No Details";
}

?>
</tr>      
</table>




        
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

