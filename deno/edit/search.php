<?php

include '../connection/config.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
  
    $query = $db->query("SELECT * FROM addn ORDER BY adid DESC");

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
        <link href="../css/stylesa.css" rel="stylesheet" />
        <link href="../css/set.css" rel="stylesheet" />
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
             <h3>Search</h3> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php" >Home &emsp;</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../login/login.php" style="color:blue;">List Your Deth Alert &emsp;</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="../about.php">About</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
	
       
  <!-- Database View -->
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Name Here" title="Search">


  <table id="myTable">
  <tr class="header">

<tr>

    <th>
      Name
    </th>
   
   <th>
     Birth Date
   </th>

   <th>
    Death Date
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

<td>". $row["birth"]. "</td>

<td>". $row["death"]. "</td>

<td>". $row["addr"]. "</td>

<td ><center>  <a href='../view.php?id=".$row["adid"]."'> <p style=color:brown> View </p></a> </center> </td>
</tr>";           

}
}
else{

echo "No Details";
}

?>
</tr>      
</table>


<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
   
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
    