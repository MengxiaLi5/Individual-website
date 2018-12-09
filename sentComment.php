<?php
extract($_POST);


if(!isset($_POST['submit'])){
    exit("Wrong execute.");
}

$dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
if(!$dbc){
    die("couldn't connect to database");
}

//mysqli_select_db($dbc,"only_one");
$query = "SELECT * FROM only_one";
$result = mysqli_query($dbc,$query);
$row = mysqli_fetch_row($result);


$name = $row[0];
$comment = $_POST['comment'];
$rate = $_POST['rate'];

$product_id = $_COOKIE['latest'];

$product = "product ".$product_id;
//$dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
//if(!$dbc){
//    die("couldn't connect to database");
//}
mysqli_select_db($dbc,"comment");
$query = "SELECT MAX(comment_id) from comment";
$result = mysqli_query($dbc,$query);
$row = mysqli_fetch_row($result);
$highest = $row[0]+1;

$query = "INSERT INTO comment(comment,rate,user_id,comment_id,product,user_name) VALUES ('$comment','$rate','0','$highest','$product','$name')";
$result = mysqli_query($dbc,$query);
mysqli_close($dbc);
header('location:details.php?product='.$product_id);






