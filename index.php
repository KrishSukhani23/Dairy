<?php
require_once "pdo.php";
session_start();




?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<style>

.big{
  width:70%;
  height : 50%;
}

.all{
    font-family: Helvetica;
    background-image: url(https://www.smartertravel.com/uploads/2020/03/ST_ZoomBackground_Beach03.jpg)

}
h2{
    font-size: 40px;
    color: white;
    text-align:center;
    margin:30px;
}

</style>

<script>

</script>

<html>

<body class="all">

<center><h2>My Secret Dairy</h2></center>

<center>
<form  method="post">
<textarea class="big" name="dairy"  >  </textarea>
<br>
<br>


<button type="submit" class="btn btn-success" name="submit" value="Submit" style="font-size: 20px">Submit</button>


</form>
<a href="logout.php" class="btn btn-primary">Logout</a>

</center>



</body>

<?php


if(isset($_POST['submit'])){

  $dair =  $_POST['dairy'];
  $gemail =  $_SESSION['email'];

  $sql="update users set dairy = :dai where email = :gemail ";
  $query = $pdo->prepare($sql);
  $query->bindParam(':dai',$dair,PDO::PARAM_STR);
  $query->bindParam(':gemail',$gemail,PDO::PARAM_STR);
  $query->execute();






}



?>



</html>