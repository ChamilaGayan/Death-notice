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
     
      $id = $_REQUEST['id'];
$dn= $_POST['dn'];
        
$bt = $_POST["birth"];
$dt = $_POST["death"];

$add=$_POST["add"];
$uid =  $_SESSION["id"] ;
$cmt=$_POST["cmt"];

$sql = "update addn set dname='$dn', addr='$add', birth='$bt', death='$dt', cmt='$cmt'  WHERE adid='$id'; ";

 
 if($db -> query($sql)){
 echo '<script language="javascript">';
 echo 'alert("Change successfully")';
 echo '</script>';
 echo '<script type="text/javascript">location.href = "edit.php?id=',$id,'";</script>';
 }
 else{
     echo "<script>alert ('Check you entered Details and Try Again..!')</script>".$db->error;
 }
 mysqli_close($db);
?>