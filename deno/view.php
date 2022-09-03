

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
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="login/login.php">List Your Deth Alert</a>
                </li>

                <li class="nav-item">
                <a class="nav-link"  onclick="window.history.back()">Go Back</a>
                </li>


                
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <?php

include 'connection/config.php';

$id = $_GET['id'];

 $query = $db->query("SELECT dname,contact,adid,file_name,addr,birth,death,cmt,uploaded_on,fname,lname,contactno from addn  WHERE adid = $id ");




if($query !== false && $query->num_rows > 0){
  while($row=$query->fetch_assoc()){
  $imageURL='uploads/'.$row["file_name"];

  echo " 
  <table id='customers' style='box-shadow: 10px 10px 5px grey;'>
  <tr>
 
  
  ";



  echo "<td> <div style='border:5px solid #aaa; width: 100%;'>
  <h3><center> Rest in Peace</h3>
   
  </center> "; 

  echo "<center> <h5> $row[dname]</h5> 
  </center> ";

  echo "<center> <h6> $row[addr]</h6> 
  </center> ";
  echo "<center> <h6>Birth: $row[birth] Death: $row[death]</h6> 
  </center> ";

  
  echo "<center>   <img id='scream' width='500' height='500'
  src='$imageURL' alt='The Scream'>
  </center>";


  echo "<center> <p> $row[cmt]</p> 
  </center>
   </div> </td></tr></table>
";
echo "<br><center> <h6>Published By: $row[fname] $row[lname]</h6> 
</center> ";

echo "<center> <h6>Contact No: $row[contactno]
</center> ";

echo "<center> <p> Uploaded on: $row[uploaded_on]</p> 
</center>
";

  }
}
else{
  ?> 
  <p>No Preview.....</p>
  <?php
}

?>





 
<?php




 




?>


        
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