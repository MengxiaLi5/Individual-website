<?php

header("Content-Type: text/html; charset=utf8");

if(!isset($_POST['submit'])){
    exit("Wrong execute.");
}
$user_id = $_POST['user_id'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$home_address=$_POST['home_address'];
$home_phone=$_POST['home_phone'];
$cell_phone=$_POST['cell_phone'];

$dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
if(!$dbc){
    die("couldn't connect to database");
}

mysqli_select_db($dbc,"private_user");
$query = "INSERT INTO private_user(user_id,first_name,last_name,email,home_address,home_phone,cell_phone) VALUES ('$user_id','$first_name','$last_name','$email','$home_address','$home_phone','$cell_phone')";
$result = mysqli_query($dbc,$query);

    echo "Successfully submit....  <br>";
    $link_address = 'login.html';
    echo "<a href='".$link_address."'>Click here go to the Login page.</a>";
mysqli_close($dbc);
