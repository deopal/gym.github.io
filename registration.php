<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php

session_start();
$con=mysqli_connect('localhost','root');

mysqli_select_db($con,'gymoholic');

$name=$_POST['user'];
$pass=$_POST['password'];

$q="SELECT * FROM signin WHERE name='$name'&&password='$pass' ";

$result=mysqli_query($con,$q);

$num=mysqli_num_rows($result);

if($num==1){
    echo "<script> alert('user already registered')</script>";
    echo "<script> window.location='login.php'</script>";
}
else{
    $qy="INSERT INTO signin(name,password) VALUES('$name','$pass')";
    mysqli_query($con,$qy);
    echo "<script> window.location='login.php'</script>";
}

?>