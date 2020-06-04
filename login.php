
<!DOCTYPE html>
<?php
require_once "pdo.php";
session_start();

?>
<?php
    
    if(isset($_POST["Email"]) && isset($_POST["password"])){
      $email = $_POST["Email"];
        $pass = ($_POST["password"]);

        $stmt = $pdo->query("SELECT Email,password from users ");
/*
        $row = $stmt->fetch(PDO :: FETCH_ASSOC);

        echo $email;
        echo $pass;
        echo $row['Email'];
        echo $row['password'];
        echo ($row['Email']==$email && $row['password']==$pass);*/

                while($row = $stmt->fetch(PDO :: FETCH_ASSOC)){
                    if($row['Email']==$email && $row['password']==$pass){

                            header('Location: index.php');
                            $_SESSION['email']=$row['Email'];

                        
                        
                        


                }
        
        
        
        
            }
        
       
        }
    

?>
<html>
<head>

<title>Login Page</title>
</head>
<style>




input[type=text], input[type=password] {
  text-align: center;
  padding: 10px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  margin : 10px;
}

.error {color: #FF0000;}

.all{
    font-family: Helvetica;
    background-image: url(https://www.smartertravel.com/uploads/2020/03/ST_ZoomBackground_Beach03.jpg)

}

h2{
    font-size: 40px;
    color: white;
    text-align:center;
}

form {
  border: 3px solid #000000;
  text-align: center;
  margin-top:100px;
  width:30%;
  
  }

.container {
  padding: 10px;
  text-align:center;
  margin:20px;

}
.err{
  text-align:center;
  border:2px;
  background-color:white;
  margin:5px;
  padding:5px;
  

}
a{
  color:white;
}
/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 100px 550px;
  border: none;
  cursor: pointer;
  width: 25%;
  text-align: center;
  
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}



</style>


<body class="all">
	<div class="container"  >
	<center><h2>LOGIN </h2></center>
	</div>
  <center>
    <form method="post">
    
    <center><h3> <input type="text" placeholder="Enter Email"  name="Email"><br></h3></center>
    <center><h3>  <input type="password" placeholder="Enter password"  name="password"><br></h3></center>
    <div class="container">
    <center><a href="register.php">New here ? Click to Register</a><br></center>
    </div>
<br>
    <div>
    <center><input type="submit" value="LOGIN" style="font-size: 20px"></center>
    <br>
    <br>
    <br>
    </div>
    </form>
</center>
</body>
</html>