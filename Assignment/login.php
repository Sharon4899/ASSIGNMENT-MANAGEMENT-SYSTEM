<?php
session_start();
?>

<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: #D6D6D6;  
}  
button {   
       background: linear-gradient(to bottom,#D6D6D6 0% , #000 100%);  
       width: 100%;  

        padding: 15px;   
        margin: 10px 0px;   
        border: white;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #ABD;   
    }   
 input[type=email], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px #ABD234;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 1;
        margin: 10px 5px; 
        color:none;
    }  
    button{
    font-size: 20px
    border:2px solid #342;
    }
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: 25px;   
       
        background-color: #D6D6D6;  
    }   
</style>   
</head> 
<body>   
<?php



$_SESSION["favcolor"] = "yellow";

?>

<form action="http://santoshghorpade.myartsonline.com/Assignment/login1.php" method="post">  
        <div class="container">   
            <label>Username : </label>   
            <input type="email" placeholder="Enter email" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <button type="submit" >Login</button>   
            
               
            Forgot <a href="https://www.google.co.in/"> password? </a>   
        </div>   
    </form>     
    </body>     
</html>
