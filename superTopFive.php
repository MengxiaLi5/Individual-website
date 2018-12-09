<?php

// if (mysql_connect_errno()) echo "Failed to connect to MySQL: " . mysql_connect_error();
$dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
if(!$dbc){
    die("couldn't connect to database");
}

//mysqli_select_db($dbc,"only_one");
$query = "SELECT product, AVG(rate) FROM comment group by product order by AVG(rate) DESC LIMIT 5";
$result = mysqli_query($dbc,$query);
$productlist = array();

while($query_data = mysqli_fetch_row($result)) {
    $productlist[$query_data[0]] = $query_data[1];
}
$encode = json_encode($productlist);
echo $encode;
mysqli_close($dbc);

?>