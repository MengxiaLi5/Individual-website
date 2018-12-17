<?php
    extract($_POST);
    if (!isset($username) || !isset($password)) {
        //from other page
        echo '<script type="text/javascript">';
        //localStorage.getItem("loggedIn") === null ||
        echo 'console.log("check");
         
        if (localStorage.getItem("loggedIn") === null || localStorage.getItem("loggedIn") === "false") {
            window.location.replace("http://supermelody.tech/whole_market.html");
        }';
        echo '</script>';
    } else {
        $dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
        if(!$dbc){
            die("couldn't connect to database");
        }
        mysqli_select_db($dbc,"public_database");
        $query = "SELECT * FROM public_database
                   WHERE username = '$username'
                   AND password  = '$password'";
        $result = mysqli_query($dbc,$query);

        $row = mysqli_fetch_row($result);
        if ($row == null) {
            mysqli_close($dbc);
            header('location:whole_market.html');
        } else {
            echo '<script type="text/javascript">';
            echo '
  
                localStorage.setItem("loggedIn", true);
                localStorage.setItem("userName","'.$username.'");
                console.log(localStorage.getItem("userName"));
            ';
            echo '</script>';
            $query = "UPDATE only_one SET user_name = '$username' LIMIT 1 ";
            mysqli_query($dbc, $query);
            mysqli_close($dbc);

        }
    }





?>

<script type="text/javascript">

</script>

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
    .userTrack {
        text-align: center;
    }
    .rowData {
        margin-right: 2%;
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

    /* Second image (Portfolio) */
    .bgimg-2 {
        background-image: url("/w3images/parallax2.jpg");
        min-height: 400px;
    }

    /* Third image (Contact) */
    .bgimg-3 {
        background-image: url("/w3images/parallax3.jpg");
        min-height: 400px;
    }

    .w3-wide {letter-spacing: 10px;}
    .w3-hover-opacity {cursor: pointer;}
    .w3-button w3-black w3-right w3-section {
        margin-left: 20px;
    }
    #login{
        margin-right: 355px;
        margin-left: 20px;
    }

    .login{
        margin-left: 320px;
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
        <a href="#home" class="w3-bar-item w3-button">HOME</a>
        <a href="#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> LOGIN</a>
        <a href="#portfolio" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> TRACKING</a>
        <a href="#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> TOP FIVE</a>
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red">
            <i class="fa fa-search"></i>
        </a>
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
        <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">LOGIN</a>
        <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">TRACKING</a>
        <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">TOP FIVE</a>
        <a href="#" class="w3-bar-item w3-button">SEARCH</a>
    </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
    <div class="w3-display-middle" style="white-space:nowrap;">
        <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">WHOLE <span class="w3-hide-small">MARKET</span> PLACE</span>
    </div>
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
    <h3 class="w3-center">LOGGED IN SUCCESSFULLY!<br>
    <?php
    $dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
    if(!$dbc){
        die("couldn't connect to database");
    }
    $query = "SELECT * FROM only_one";
    $result = mysqli_query($dbc,$query);
    $row = mysqli_fetch_row($result);
    print "current user: ";
    print $row[0];
    ?>
    </h3>
    <script type="text/javascript">
        var handleLogout = function() {
            console.log("hanle out");
            localStorage.setItem("loggedIn", false);
            localStorage.setItem("username", "anonymous");
            window.location = "http://supermelody.tech/handleOut.php";

        }
    </script>
    <P class="w3-center"><button onclick="handleLogout().bind(this)">LOG OUT</button></P>
    <p class="w3-center"><em><a href="shikang.php">Shikang Jin "Cool Company"</a></em></p>
    <p class="w3-center"><em><a href="Mengxia.php">Mengxia "Fake saphora"</a></em></p>
    <p class="w3-center"><em><a href="kathy.php">Zixin "Kazeya"</a></em></p>
    <p class="w3-center"><em><a href="siyun.php">Siyun "Money in the House"</a></em></p>
    <p class="w3-center"><em><a href="Drew.php">Drew "omicronsix"</a></em></p>
</div>


<!-- Container (Tracking Section) -->
<div class="w3-content w3-container w3-padding-64" id="portfolio">
    <h3 class="w3-center">TRACKING</h3>
    <p class="w3-center">
        <em>
            <?php

            //mysqli_select_db($dbc,"only_one");
            $query = "SELECT * FROM user_track ORDER BY track_id DESC LIMIT 10";
            $result = mysqli_query($dbc,$query);
            while($row = mysqli_fetch_row($result)) {
                print("<p class='userTrack'>");
                print("<span class='rowData'>");
                print("Time: ");
                print($row[3]);
                print("</span>");
                print("<span class='rowData'>");
                print("website: ");
                print($row[2]);
                print("</span>");
                print("<span class='rowData'>");
                print("username: ");
                print($row[1]);
                print("</span>");
                print("</p>");
            }
            mysqli_close($dbc);
            ?>
            <br>
        </em>
    </p><br>

    <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
    <div class="w3-row-padding w3-center">
        <div class="w3-col m3">
        </div>

    </div>
    <div class="w3-row-padding w3-center">
        <div class="w3-col m3">
        </div>

    </div>

    <div class="w3-row-padding w3-center w3-section">
        <div class="w3-col m3">
        </div>
    </div>
    <!--<button class="w3-button w3-padding-large w3-light-grey" style="margin-top:64px">LOAD MORE</button>-->
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
    <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption" class="w3-opacity w3-large"></p>
    </div>
</div>

<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64" id="contact">
    <h3 class="w3-center">TOP FIVE RATE INDIVIDUALLY</h3>
    <p class="w3-center"><em><a href="shikangjin.php">Shikang Jin "Cool Company"</a></em></p>
    <p class="w3-center"><em><a href="mengxiali.php">Mengxia "Fake saphora"</a></em></p>
    <p class="w3-center"><em><a href="zixinli.php">Zixin "Kazeya"</a></em></p>
    <p class="w3-center"><em><a href="shiyunliang.php">Siyun "Money in the House"</a></em></p>
    <p class="w3-center"><em><a href="shiyunliang.php">Drew "omicronsix"</a></em></p>

    <h3 class="w3-center">WHOLE MARKET TOP FIVE RATE</h3>
    <div class="w3-row w3-padding-32 w3-section">
        <p class="w3-center"><em><a href="alltop5.php">top five rating (Click here!)</a></em></p>
    </div>
</div>
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

<script>
    // Modal Image Gallery
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }

    // Change style of navbar on scroll
    window.onscroll = function() {myFunction()};
    function myFunction() {
        var navbar = document.getElementById("myNavbar");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
        } else {
            navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
        }
    }

    // Used to toggle the menu on small screens when clicking on the menu button
    function toggleFunction() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>

</body>
</html>