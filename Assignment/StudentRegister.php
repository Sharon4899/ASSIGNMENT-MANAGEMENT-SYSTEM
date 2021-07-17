<?php
error_reporting();



require_once("dbconn.php");

if($submit=$_POST['submit'])
{
$rollno=$_POST['rno'];
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$department=$_POST['dep'];
$semister=$_POST['sem'];
$roll=$_POST['rollno'];
$id=$_POST['id'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['repass'];


   
	    $insert_function="INSERT INTO Student_Registration (fname,lname,dep,sem,rollno,Clgid,email,pass) VALUES('$fname','$lname','$department','$semister','$roll','$id','$email','$pass')";

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
