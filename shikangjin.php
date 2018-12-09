<!DOCTYPE html>
<html>
<title>WHOLE MARKET PLACE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
    body, html {
        height: 100%;
        color: black;
        line-height: 1.8;
    }

    /* Create a Parallax Effect */
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    /* First image (Logo. Full height) */
    .bgimg-1 {
        background-image: url('image2/market.jpg');
        min-height: 100%;
    }

    .w3-wide {letter-spacing: 10px;}
    .w3-hover-opacity {cursor: pointer;}
    .w3-button w3-black w3-right w3-section {
        margin-left: 20px;
    }
    .one{
        text-align: center;
        margin-left: 45%;
    }

    .containters{
        margin-bottom: 40px;
    }
    /* Turn off parallax scrolling for tablets and phones */
    @media only screen and (max-device-width: 1600px) {
        .bgimg-1, .bgimg-2, .bgimg-3 {
            background-attachment: scroll;
            min-height: 400px;
        }
    }
</style>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar" id="myNavbar">
        <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
            <i class="fa fa-bars"></i>
        </a>
        <a href="logged_in.php" class="w3-bar-item w3-button">HOME</a>
        <a href="logged_in.php#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> LOGIN</a>
        <a href="wlogged_in.php#portfolio" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> TRACKING</a>
        <a href="logged_in.php#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> TOP FIVE</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red">
            <i class="fa fa-search"></i>
        </a>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
        <a href="logged_in.php#about" class="w3-bar-item w3-button" onclick="toggleFunction()">LOGIN</a>
        <a href="logged_in.php#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">TRACKING</a>
        <a href="logged_in.php#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">TOP FIVE</a>
        <a href="#" class="w3-bar-item w3-button">SEARCH</a>
    </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
    <div class="w3-display-middle" style="white-space:nowrap;">
        <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">WHOLE <span class="w3-hide-small">MARKET</span> PLACE</span>
    </div>
</div>
<div class="w3-content w3-container w3-padding-64">
    <h3 class="w3-center">Shikang Jin "Cool Company" TOP FIVE RATE</h3>
</div>
<div class="containters">

<?php


    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://skjinnero.com/topFive.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    $decode3 = json_decode($output, true);

    curl_close($ch);
    $count = 0;

    foreach($decode3 as $name => $value){

        if($name=='service 1')
            echo "<a class='one' href='https://skjinnero.com/services/service1.php' >Service 1</a >"."      Rate: ".$value."<br>";
        else if($name=='service 2')
            echo "<a class='one' href='https://skjinnero.com/services/service2.php' >Service 2</a >"."      Rate: ".$value."<br>";
        else if($name=='service 3')
            echo "<a class='one' href='https://skjinnero.com/services/service3.php' >Service 3</a >"."      Rate: ".$value."<br>";
        else if($name=='service 4')
            echo "<a class='one' href='https://skjinnero.com/services/service4.php' >Service 4</a >"."      Rate: ".$value."<br>";
        else if($name=='service 5')
            echo "<a class='one' href='https://skjinnero.com/services/service5.php' >Service 5</a >"."      Rate: ".$value."<br>";
        else if($name=='service 6')
            echo "<a class='one' href='https://skjinnero.com/services/service6.php' >Service 6</a >"."      Rate: ".$value."<br>";
        else if($name=='service 7')
            echo "<a class='one' href='https://skjinnero.com/services/service7.php' >Service 7</a >"."      Rate: ".$value."<br>";
        else if($name=='service 8')
            echo "<a class='one' href='https://skjinnero.com/services/service8.php' >Service 8</a >"."      Rate: ".$value."<br>";
        else if($name=='service 9')
            echo "<a class='one' href='https://skjinnero.com/services/service9.php' >Service 9</a >"."      Rate: ".$value."<br>";
        else if($name=='service 10')
            echo "<a class='one' href='https://skjinnero.com/services/service10.php' >Service 10</a >"."      Rate: ".$value."<br>";

        else{
            echo $name ;
            echo "<br>";
        }

        $count++;
        if($count==5)
            break;
    }


?>
</div>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
    <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
    <div class="w3-xlarge w3-section">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
</footer>
</body>
</html>
