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

<header class="jd-topbar">
    <div class="jd-container" id="jd-header">
        <h1 class="am-topbar-brand">
            Saphora makeup
        </h1>
        <div class="am-collapse am-topbar-collapse jd-nav" id="doc-topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li><a href="./home.html">HOME</a></li>
                <li><a href="./about.html">ABOUT</a></li>
                <li class="am-active"><a href="./product.php">PRODUCTS</a></li>
                <li><a href="./news.html">NEWS</a></li>
                <li><a href="./contacts.php">CONTACTS</a></li>
                <li><a href="private.php">User creation/tab</a></li>
                <li><a href="./connect.php">Co.Info</a> </li>
                <li><a href="other.php">Other.Co.Info</a></li>
                <li><a href="./login.html">LOGIN</a></li>
            </ul>
        </div>
    </div>
</header>

<div class="jd-hr">
    <div class="jd-container">
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
            <h2 class="am-titlebar-title">PRODUCTS</h2>
        </div>
        <div>
            <?php
            if (isset($_COOKIE["lastfive"]))
            {
                $arr = $_COOKIE["lastfive"];
                $array = unserialize($arr);

                for($i = count($array) - 1; $i >= 0; $i--)
                {
                    $records = $array[$i]+1;
                    print ('<br><a href="details.php?product='.$array[$i].'">'.'Product'.$records.'</a>');
                    print ('<br>');
                }
            }
            else
            {
                print ("No History.");
            }
            ?>
        </div>
    </div>
</div>

<div class="jd-container">
    <footer data-am-widget="footer" class="am-footer am-footer-default">
        <div class="am-footer-miscs ">
            <p>©2018-2019 San Jose State University.</p></br>
            <p>Mengxia Li for 272 Lab</p>
        </div>
    </footer>
</div>
</body>
</html>