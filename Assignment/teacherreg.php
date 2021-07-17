<?php
error_reporting();
require_once("dbconn.php");



if($submit=$_POST['submit'])
{

$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$department=$_POST['dep'];
$sub=$_POST['sub'];
$id=$_POST['id'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['repass'];


   
	    $insert_function="INSERT INTO techers (fname,lname,department,sub,clgid,email,pass,repass) VALUES('$fname','$lname','$department','$sub','$id','$email','$pass','$cpass')";

         if (mysqli_query($conn, $insert_function)) 
            {
               echo "Registered";
               }
         else 
            {
              echo "Error: ".mysqli_error($conn);
             }
    }
    
?>
