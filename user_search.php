<?PHP
header("Content-Type: text/html; charset=utf8");

if(!isset($_POST["submit"])){
    exit("Wrong execute.");
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$names = explode(" ", $name);
$sql1 = "SELECT * FROM private_user
                      WHERE first_name = '$names[0]' 
                        AND last_name  = '$names[1]'
                        AND     email  = '$email'
                        AND home_phone = '$phone_number'";
$sql2 = "SELECT * FROM private_user
                      WHERE first_name = '$names[0]' 
                        AND last_name  = '$names[1]'
                        AND      email = '$email'
                        AND cell_phone = '$phone_number'";
$sql3 = "SELECT * FROM private_user
                      WHERE first_name = '$names[0]' 
                        AND last_name='$names[1]'
                        AND email = '$email'";
$sql4 = "SELECT * FROM private_user
                      WHERE first_name = '$names[0]' 
                        AND last_name='$names[1]'
                        AND home_phone = '$phone_number'";
$sql5 = "SELECT * FROM private_user
                      WHERE first_name = '$names[0]' 
                        AND  last_name ='$names[1]'
                        AND cell_phone = '$phone_number'";
if (!$name ) {
    response("Please input your name.");
} else {

    if (count($names) == 2) {
        if ($email || $phone_number) {
            if($email && $phone_number) {
                if(!searchFromDB($sql1)) {
                    if(!searchFromDB($sql2)) {
                        response("Can not find record with Name, email and phone_number.");
                    }
                }
            }
            if($email && !$phone_number) {
                if (!searchFromDB($sql3)) {
                    response("Can not find record with Name and email!");
                }
            }
            if($phone_number && !$email) {
                if(!searchFromDB($sql4)) {
                    if(!searchFromDB($sql5)) {
                        response("Can not find record with Name and phone_number.");
                    }
                }
            }
        } else {
            response("Please input at least your email or phone_number.");
        }
    } else {
        response("Please input your full name.");
    }
}
function searchFromDB($sql)
{
    $dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
    if(!$dbc){
        die("couldn't connect to database");
    }
    mysqli_select_db($dbc,"private_user");
    $result = mysqli_query($dbc,$sql);

    $rows = mysqli_num_rows($result);
    if($rows){
        while($row = mysqli_fetch_array($result)){
            echo $row['first_name'] . " " . $row['last_name'] . "<br>";
            echo $row['email'] . "<br>" . $row['home_address'] . "<br>" . $row['home_phone'] . "<br> " . $row['cell_phone'];
            echo "<br>";
        }
        $link_address = 'login.html';
        echo "<a href='".$link_address."'>Click here go to the Login page.</a>";
        mysqli_close($dbc);
        return true;
    } else {
        mysqli_close($dbc);
        return false;
    }
}
function response($message) {
    echo $message;
    echo "
        <script>
            setTimeout(function(){window.location.href='login.html';},10000);
        </script>
        ";
}
?>