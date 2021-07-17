<?php
// Include the database configuration file
 require_once("dbconn.php");
$statusMsg = '';

// File upload path
$targetDir = "upload/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$rollno = $_POST['rollno'];
$title = $_POST['title'];
$subject=$_POST['sub'];
$type = $_POST['type'];

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into images (rollno,title,file_name,subject,type,uploaded_on) VALUES ('$rollno','$title','".$fileName."','$subject','$type', 'NOW()')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.\n\n\n\n";
                
                if($type=="student")
                {
                echo "<br><br><br><br><br><br><br><br><br><br><h1><a href ='//santoshghorpade.myartsonline.com/Assignment/computer.php'>BACK</a></h1>";
                }
                else
                {
                echo "<br><br><br><br><br><br><h1><a href ='//santoshghorpade.myartsonline.com/Assignment/teacherwelcome.php'>BACK</a></h1>";
                }
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

// Display status message
echo $statusMsg;
?>
