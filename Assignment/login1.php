

<?php
   require_once("dbconn.php");

      
    $username = $_POST['username'];  
    $password = $_POST['password']; 
    
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password); 
        $link_address='www.google.com';
      
        $sql = "select * from Student_Registration where email = '$username' and pass = '$password'";
        
        $result = mysqli_query($conn, $sql); 
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result); 
        
        echo'<body style="background-color:#F1EAEA">';
        
        if($count == 1){  

             echo "<h1><center> WELCOME   <br>".$row["fname"]."  ".$row["lname"]. "</center></h1>";
             $sql = "SELECT dep FROM Student_Registration WHERE email='$username'";
              $result = $conn->query($sql);

                  if ($result->num_rows > 0) 
                  {
            // output data of each row
                        while($row = $result->fetch_assoc())
                        {
                        $comp = 'http://santoshghorpade.myartsonline.com/Assignment/computer.php';
                        $it = '#';
                        $mach = '#';
                        $etc = '#';
                        $no = '#';

                        
                        if($row["dep"]=="Computer"){
                        
                         echo "<br><br><br><br><center>Department :" . $row["dep"]. "<br> </center>";

            echo '<center><a href="'.$comp.'",_self>YOUR DEPARTMENT</a></center>';
                  }
                  elseif ($row["dep"]=="IT"){
                  echo "Department :" . $row["dep"]. "<br>";

            echo '<a href="'.$it.'",_self>YOUR DEPARTMENT</a>';
                  
                  
                  }

    
                              
                            }
                       }
    else {
              echo "0 results" ;
    }
   
   }


           
    
       
        
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }  
        
        
 
        
?>

