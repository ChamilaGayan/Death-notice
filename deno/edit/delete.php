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

$sql = "DELETE FROM addn WHERE adid='$id';";

if ($db->query($sql) === TRUE) {
    echo '<script language="javascript">';
    echo 'alert("successfully Deleted")';
    echo '</script>';
    echo '<script type="text/javascript">location.href = "../member.php?id=',$id,'";</script>';
} else {
  echo "Error deleting record: " . $db->error;
}


?>