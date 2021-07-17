<?php $servername ="fdb29.awardspace.net";
$username ="3565056_assignmentss";
$password ="Santosh@123";
$dbname = "3565056_assignmentss";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
	echo "";
}
else
{
	echo "Connection failed !".mysqli_connect_error();
}
?>