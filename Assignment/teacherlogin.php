<?php
   require_once("dbconn.php");

session_start();

        
      
    $username = $_POST['username'];  
    $password = $_POST['password']; 
    
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password); 
        $comp = 'http://santoshghorpade.myartsonline.com/Assignment/teacherwelcome.php';
                        $it = '#';
      
        $sql = "select *from techers where email = '$username' and pass = '$password'";
        
        $result = mysqli_query($conn, $sql); 
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result); 
        
              
        
          
        if($count == 1){  
        $_SESSION["username"] = "$username";
        $_SESSION["password"] = "$password";
        

            echo "<h1><center> WELCOME   <br>".$row["fname"]."  ".$row["lname"]. "</center></h1>";
            if($row["department"]=="Computer"){
                        
                         echo "<center>Department :" . $row["department"]. "<br></center>";
                         echo '<center><a href="'.$comp.'",_self>DEPARTMENT</a></center>';
                         
                         }
                         
                         if($row["department"]=="IT"){
                        
                         echo "Department :" . $row["department"]. "<br>";
                         echo '<a href="'.$IT.'",_self>DEPARTMENT</a>';
                         
                         }

			

           
        } 
       
        
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>
