<?php

$dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
if(!$dbc){
    die("couldn't connect to database");
}

mysqli_select_db($dbc,"only_one");

$query = "SELECT * FROM only_one";
$result = mysqli_query($dbc,$query);
$row = mysqli_fetch_row($result);

print $row[0];
