<?php
$dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
if(!$dbc){
    die("couldn't connect to database");
}
$query = "UPDATE only_one SET user_name = 'anonymous' LIMIT 1";
$result = mysqli_query($dbc,$query);
mysqli_close($dbc);
header("location: whole_market.html");