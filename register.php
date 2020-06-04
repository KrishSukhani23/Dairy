<!DOCTYPE html>
<?php
require_once "pdo.php";
session_start();


$nameErr = $emailErr = $genderErr = $passErr = "";
$name = $email = $gender = $comment = $website = "";
if (empty($_POST["username"])) {
    $nameErr = "* Name is required";
  } else {
    $name = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "* Only letters and white space allowed";
    }
  }

  if (empty($_POST["Email"])) {
    $emailErr = "* Email is required";
  } else {
    $email = test_input($_POST["Email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "* Invalid email format";
    }
  }




  if (empty($_POST["password"])) {
    $passErr = "* Password is required";
  } else {
    $password = test_input($_POST["password"]);
    if ( strlen($password) < 8) {
      $_POST['password'] = "";
        $passErr = "* Requirements : Min 8 characters";
      }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>



<html>
<head>
<title>Registration Page</title>

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
</style>


<body class="all">
    <div class="container" >
    <h2>Register</h2>
    </div>
    
    <center>
    <form method="post">
 <center>
    <div class="err">
    <span class="error"> <?php echo $emailErr;?></span><br>
    <span class="error"> <?php echo $passErr;?></span>

    </div>
    </center>
    <h4> <input type="text" placeholder="Enter Email" name="Email"><br></h4>
    <h4> <input type="password" placeholder="Enter Password" name="password"><br></h4>
    <input type="submit" value="SUBMIT" style="font-size:20px">
    <div class="container" >
    <a href="login.php">Already Registered? Go to Login Page</a><br>  
    </div>
</form>
</center>


<?php

if( isset($_POST["password"]) && isset($_POST["Email"])  && !empty($_POST['password'])  && !empty($_POST['Email'])     ){
            
    $sql = "INSERT INTO users (Email, password)
      VALUES (:Email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
        ':Email' => $_POST['Email'],
        ':password' => ($_POST['password'])));
        $_SESSION['success'] = 'Successfully Registered';
        header( 'Location: index.php' ) ;
        $_SESSION['email']=$_POST['Email'];

        return;
    }

    ?>




</body>
</html>




