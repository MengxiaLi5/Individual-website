<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>HOME</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="./page.css"/>
    <link rel="stylesheet" href="./app.css"/>
</head>
<body>

        <table style='text-align:left;' border='1' class="dataTable">
            <tr><th>id</th><th>name</th><th>age</th><th>gender</th></tr>
            <?php
            $dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
            if(!$dbc){
                die("couldn't connect to database");
            }
            mysqli_select_db($dbc,"users");

            $sql = mysqli_query($dbc,"select * from users");

            if ($dbc) {
                $datarow = mysqli_num_rows($sql);
            } else {
                echo "nodata";
                $datarow = 0;
            }


            for($i=0;$i<$datarow;$i++){
                $sql_arr = mysqli_fetch_assoc($sql);
                $id = $sql_arr['user_id'];
                $name = $sql_arr['user_name'];
                $age = $sql_arr['user_age'];
                $gender = $sql_arr['user_gender'];
                echo "<tr><td>$id</td><td>$name</td><td>$age</td><td>$gender</td></tr>";
            }
            ?>
        </table>
</body>
</html>