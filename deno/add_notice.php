
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
?>

<?php

error_reporting(0);
$statusMsg = '';

$targetDir = "uploads/";
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 
    ceil($length/strlen($x)) )),1,$length);
        }
if(isset($_POST["submit"])){

    if(!empty($_FILES["file"]["name"])){
        $fileName = basename($_FILES["file"]["name"]);
        $fileName = generateRandomString() . $fileName;
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $dn= $_POST['dn'];
        
        $bt = $_POST["birth"];
        $dt = $_POST["death"];
        $cnt=$_POST["cntact"]; 
        $add=$_POST["add"];
        $uid =  $_SESSION["id"] ;
        $cmt=$_POST["cmt"];
        $fname =  $_SESSION["fname"] ;
        $lname =  $_SESSION["lname"] ;
        $contactno =  $_SESSION["contactno"] ;

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
      
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

         $sql="INSERT into addn (file_name,uploaded_on, dname,addr,birth,death,contact,user_id,cmt,fname,lname,contactno) 
            VALUES ('".$fileName."', NOW(),'".$dn."','". $add."','". $bt."','".$dt."','".$cnt."','".$uid."','".$cmt."','".$fname."','".$lname."','".$contactno."')";

        $insert = $db->query($sql)  ;

            if($insert){
              echo '<script language="javascript">';
              echo 'alert("successfully")';
              echo '</script>';
              echo '<script type="text/javascript">location.href = "member.php?type=leave";</script>';
                
                
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{ 
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
}

echo $statusMsg;


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
             <h5 >MEMORIAL</h5> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               
              <li class="nav-item">
                    <a class="nav-link" href="member.php">Go Back</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login/logout.php">Log Out</a>
                </li>
                
              </ul>
            </div>
          </div>
        </nav>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"> 

     <center>
    <input type="text" style="color:black;box-shadow: 10px 10px 5px grey;"  class="dash" size="50" name="dn" placeholder="Enter Display Name Here..!" required><br><br>
    Select Birth Here 
  <input type="date" style="color:black;box-shadow: 10px 10px 5px grey;" class="dash" name="birth" size="50" required> <br><br>
  Select Death Here
    <input type="date" style="color:black;box-shadow: 10px 10px 5px grey;" class="dash" name="death" size="50" required><br><br>
 
    <input type="text" class="dash" style="color:black;box-shadow: 10px 10px 5px grey;" name="cntact" size="50" placeholder="Enter Contact Here..!" required><br><br>

    <input type="text"  class="dash" style="color:black;box-shadow: 10px 10px 5px grey;" name="add" size="50" placeholder="Enter Address Here..!" required><br><br>

    <textarea name="cmt" style="color:black;box-shadow: 10px 10px 5px grey;" rows="2" cols="53" class="dash" placeholder="Type Your Comment Here...!" required></textarea><br>
  
  <label  class="col-sm-2 col-form-label">Selec Image</label><br>

    <input type="file" class="" name="file"><br><br>

 
    <input type="submit" class="btn btn-primary" name="submit" value="Submit"><br><br>

    </center>
</form>



        
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