<?php
require_once("dbconn.php");
 
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Computer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

{float: left;}

	#myTable {
  border-collapse: collapse;
  width: 100%;
  margin-left: auto;
  margin-right: auto;

  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
color:black;
  height: 100%;
  margin: 0;
  font-family: Arial;

}
fieldset{color: black;}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 20px 20px;
  font-size: 10px;
  width: 15%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 30px;
  height: 100%;
}

#Home {background-color: #fff;}
#News {background-color: #fff;}
#Contact {background-color: #fff;}
#About {background-color: #fff;}
#sepm {background-color: #fff;}

</style>
</head>
<body>

<button class="tablink" onclick="openPage('Home', this, 'blue')">DBMS</button>
<button class="tablink" onclick="openPage('News', this, 'blue')" id="defaultOpen">TOC</button>
<button class="tablink" onclick="openPage('Contact', this, 'blue')">ISEE</button>
<button class="tablink" onclick="openPage('About', this, 'light blue')">CN</button>
<button class="tablink" onclick="openPage('sepm', this, 'blue')">SEPM</button>

<div id="Home" class="tabcontent" style="color: black;">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by roll no.." title="Type in a name">
<table id="myTable">
	<tr>
		<th>Roll no</th>
		<th>Title</th>
		<th>File</th>
		

	</tr>




<?php

require_once("dbconn.php");


$records = mysqli_query($conn,"select * from images WHERE subject='dbms'AND type='student'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
$image = $data['file_name'];
$image_src = "upload/".$image;
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td><img src='<?php echo $image_src;  ?>' width="70" height="50"/></td>
  </tr>	
<?php
}
?>




</table>
<table id="myTable">
	<tr>
		<th>Assignment No</th>
		<th>Title</th>
		<th>Status</th>
		

	</tr>




<?php

require_once("dbconn.php");


$records = mysqli_query($conn,"select * from images WHERE subject='dbms'AND type='teacher'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td>Submited</td>
  </tr>	
<?php
}
?>




</table>



	<fieldset style="width: 80px">
    <legend>Upload Assignment:</legend>
  <form action="upload.php" method="post" enctype="multipart/form-data">
  Assignment No :
  <input type="number" name="rollno" size="20"><br><br>
  Title :
    <input type="text" name="title">
    
    <select name="sub" id="sub" hidden>
  <option value="dbms">toc</option>
  <option value="other">other</option>
</select><br><br>
<input type="hidden" id="type" name="type" value="teacher">

    Select File to Upload:
    <input type="file" name="file">
    <center><input type="submit" name="submit" value="Upload"></center>
</form>
</fieldset>

</div>




<div id="News" class="tabcontent" style="color: black;">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by roll no.." title="Type in a name">
<table id="myTable">
	<tr>
		<th>Roll no</th>
		<th>Title</th>
		<th>view</th>
		

	</tr>




<?php

require_once("dbconn.php");


$records = mysqli_query($conn,"select * from images WHERE subject='toc'AND type='student'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
$image = $data['file_name'];
$image_src = "upload/".$image;
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td><img src='<?php echo $image_src;  ?>' width="70" height="50"/></td>
  </tr>	
<?php
}
?>





</table>
<table id="myTable">
	<tr>
		<th>Assignment No</th>
		<th>Title</th>
		<th>Status</th>
		

	</tr>




<?php

require_once("dbconn.php");


$records = mysqli_query($conn,"select * from images WHERE subject='toc'AND type='teacher'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td>submited</td>
  </tr>	
<?php
}
?>




</table>




	<fieldset style="width: 50px">
    <legend>Upload Assignment:</legend>
  <form action="upload.php" method="post" enctype="multipart/form-data">
  Assignment No :
  <input type="number" name="rollno"><br>
  Title :
    <input type="text" name="title"><br>
    
    <select name="sub" id="sub" hidden>
  <option value="toc">toc</option>
  <option value="other">other</option>
</select><br>
<input type="hidden" id="type" name="type" value="teacher">

    Select File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
</fieldset>

</div>



<div id="Contact" class="tabcontent"  style="color: black;">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by roll no.." title="Type in a name">
<table id="myTable">
	<tr>
		<th>Roll no</th>
		<th>Title</th>
		<th>view</th>
		

	</tr>




<?php
// Include the database configuration file
require_once("dbconn.php");


$records = mysqli_query($conn,"select * from images WHERE subject='isee'AND type='student'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
$image = $data['file_name'];
$image_src = "upload/".$image;
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td><img src='<?php echo $image_src;  ?>' width="70" height="50"/></td>
  </tr>	
<?php
}
?>





</table>
<table id="myTable">
	<tr>
		<th>Assignment No</th>
		<th>Title</th>
		<th>Status</th>
		

	</tr>




<?php

require_once("dbconn.php");


$records = mysqli_query($conn,"select * from images WHERE subject='isee'AND type='teacher'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td>submited</td>
  </tr>	
<?php
}
?>




</table>




	<fieldset style="width: 50px">
    <legend>Upload Assignment:</legend>
  <form action="upload.php" method="post" enctype="multipart/form-data">
  Assignment No :
  <input type="number" name="rollno"><br>
  Title :
    <input type="text" name="title"><br>
    
    <select name="sub" id="sub" hidden>
  
  <option value="isee">isee</option>
  <option value="other">other</option>
</select><br>
<input type="hidden" id="type" name="type" value="teacher">

    Select File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
</fieldset>

</div>

<div id="About" class="tabcontent" style="color: black;">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by roll no.." title="Type in a name">
<table id="myTable">
	<tr>
		<th>Roll no</th>
		<th>Title</th>
		<th>View</th>
		

	</tr>




<?php
// Include the database configuration file
require_once("dbconn.php");


$records = mysqli_query($conn,"select * from images WHERE subject='cn'AND type='student'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
$image = $data['file_name'];
$image_src = "upload/".$image;
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td><img src='<?php echo $image_src;  ?>' width="70" height="50"/></td>
  </tr>	
<?php
}
?>




</table>
<table id="myTable">
	<tr>
		<th>Assignment No</th>
		<th>Title</th>
		<th>Status</th>
		

	</tr>




<?php

require_once("dbconn.php");


$records = mysqli_query($conn,"select * from images WHERE subject='cn'AND type='teacher'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td>submited</td>
  </tr>	
<?php
}
?>




</table>



	<fieldset style="width: 50px">
    <legend>Upload Assignment:</legend>
  <form action="upload.php" method="post" enctype="multipart/form-data">
  Assignment No :
  <input type="number" name="rollno"><br>
  Title :
    <input type="text" name="title"><br>
    
    <select name="sub" id="sub" hidden>
  
  <option value="cn">cn</option>
  <option value="other">other</option>
</select><br>
<input type="hidden" id="type" name="type" value="teacher">

    Select File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
</fieldset>

</div>


<div id="sepm" class="tabcontent"  style="color: black;">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by roll no.." title="Type in a name">
<table id="myTable">
	<tr>
		<th>Roll no</th>
		<th>Title</th>
		<th>View</th>
		

	</tr>




<?php
// Include the database configuration file
require_once("dbconn.php");


$records = mysqli_query($conn,"select * from images WHERE subject='sepm'AND type='student'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
$image = $data['file_name'];
$image_src = "upload/".$image;
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td><img src='<?php echo $image_src;  ?>' width="70" height="50"/></td>
  </tr>	
<?php
}
?>



</table>
<table id="myTable">
	<tr>
		<th>Assignment No</th>
		<th>Title</th>
		<th>Status</th>
		

	</tr>




<?php

require_once("dbconn.php");


$records = mysqli_query($conn,"select * from images WHERE subject='sepm'AND type='teacher'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['rollno']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td>submited</td>
  </tr>	
<?php
}
?>




</table>



	<fieldset style="width: 50px">
    <legend>Upload Assignment:</legend>
  <form action="upload.php" method="post" enctype="multipart/form-data">
  Assignment No :
  <input type="number" name="rollno"><br>
  Title :
    <input type="text" name="title"><br>
    
    <select name="sub" id="sub" hidden>
  
  <option value="sepm">sepm</option>
  <option value="other">other</option>
</select><br>
<input type="hidden" id="type" name="type" value="teacher">

    Select File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
</fieldset>

</div>

</div>

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
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

</body>
</html> 
