<?php
$dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
if(!$dbc){
    die("couldn't connect to database");
}
$query = "SELECT * FROM only_one";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_row($result);
$username = $row[0];
$query = "SELECT MAX(track_id) FROM user_track";
$result = mysqli_query($dbc,$query);
$row = mysqli_fetch_row($result);
$track_id = 1;
if ($row) {
    $track_id = $row[0] + 1;
}
$time = time();
$time = date("Y-m-d", $time);
//mysqli_select_db($dbc,"only_one");
$query = "INSERT INTO user_track (track_id, username, website, timestamp) 
VALUES ('$track_id', '$username', 'https://skjinnero.com/service.php', '$time')";
mysqli_query($dbc,$query);
mysqli_close($dbc);
header('location:https://skjinnero.com/service.php');