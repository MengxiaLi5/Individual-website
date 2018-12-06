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
    <link rel="stylesheet" href="comment.css"/ >
</head>
<body>

<header class="jd-topbar">
    <div class="jd-container" id="jd-header">
        <h1 class="am-topbar-brand">
            Engineering
        </h1>
        <div class="am-collapse am-topbar-collapse jd-nav" id="doc-topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li><a href="./home.html">HOME</a></li>
                <li><a href="./about.html">ABOUT</a></li>
                <li class="am-active"><a href="./product.php">PRODUCTS</a></li>
                <li><a href="./news.html">NEWS</a></li>
                <li><a href="./contacts.php">CONTACTS</a></li>
                <li><a href="./login.html">LOGIN</a></li>
                <li><a href="./connect.php">Co.Info</a> </li>
                <li><a href="other.php">Other.Co.Info</a></li>
                <li><a href="private.php">User creation/tab</a></li>
            </ul>
        </div>
    </div>
</header>

<div class="jd-hr">
    <div class="jd-container">
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
            <h2 class="am-titlebar-title">PRODUCTS and SERVICES</h2>
        </div>
        <div>
            <?php

            $product = (int) $_GET['product'];
            setcookie("latest",$product);

            $expire=time()+60*60*24*30;

            //last five product
            if (isset($_COOKIE["lastfive"]))
            {
                $arr = $_COOKIE["lastfive"];
                $array = unserialize($arr);

                for($i = 0; $i < count($array); $i++)
                {
                    if($product == $array[$i])
                    {
                        array_splice($array, $i, 1);
                    }
                }

                if(count($array) >= 5)
                {
                    array_splice($array, 0, 1);
                }

                $array[]= $product; //Add the latest browsing record
                $arrar_string = serialize($array);   //convert to strng
                setcookie("lastfive", $arrar_string, $expire);
            }
            else
            {
                $array = array($product);
                $arrar_string = serialize($array);
                setcookie("lastfive", $arrar_string, $expire);
            }


            //most five product
            if (isset($_COOKIE["mostfive"]))
            {
                $arr = $_COOKIE["mostfive"];
                $array = unserialize($arr);

                if(array_key_exists(strval($product), $array))
                {
                    $value = $array[strval($product)];
                    $value += 1;
                    $array[strval($product)] = $value;
                }
                else
                {
                    $array[strval($product)] = 1;
                }

                $arrar_string = serialize($array);
                setcookie("mostfive", $arrar_string, $expire);
            }
            else
            {
                $array=array();
                $array[strval($product)] = 1;
                $arrar_string = serialize($array);
                setcookie("mostfive", $arrar_string, $expire);
            }

            //show product details
            $con = file("./details.txt");
            echo $con[$product].'<br>';

            echo '<img src="image/'.$product.'.png"'.' alt="service image" width="500">';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';


            $dbc = mysqli_connect("db-30bsq7j6s.aliwebs.com", "30bsq7j6s", "30bsq7j6s","30bsq7j6s");
            if(!$dbc){
                die("couldn't connect to database");
            }
            mysqli_select_db($dbc,"comment");

          //  $productID = $product + 1;
            $sql = mysqli_query($dbc,"select * from comment WHERE product='$product' ");
            if ($dbc) {
                $datarow = mysqli_num_rows($sql);
            } else {
                echo "nodata";
                $datarow = 0;
            }


            for($i=0;$i<$datarow;$i++){
                $sql_arr = mysqli_fetch_assoc($sql);
                $id = $sql_arr['user_id'];
                $rate = $sql_arr['rate'];
                $comment = $sql_arr['comment'];
                echo "user id: ";
                echo "$id";
                echo '<br>';
                echo 'Rate: ';
                echo "$rate";
                echo '<br>';
                echo "comment: ";
                echo "$comment";
                echo '<br>';
            }

            ?>



            <form action="sentComment.php" method="post">
                <div lang="en-US" class="gitment-container gitment-editor-container">
                    <div class="gitment-editor-main">
                        <div class="gitment-editor-header">
                            <nav class="gitment-editor-tabs">
                                <button class="gitment-editor-tab gitment-selected">edit</button>
                                <p>Rate please: 5<input type="radio" name="rate" value="5"> 4<input type="radio" name="rate" value="4"> 3<input type="radio" name="rate" value="3"> 2<input type="radio" name="rate" value="2"> 1<input type="radio" name="rate" value="1"></p>
                            </nav>
                        </div>
                        <div class="gitment-editor-body">
                            <div class="gitment-editor-write-field">
                                <form action="sentComment.php" method="post">
                                <textarea placeholder="please write your comment" title="Login to Comment" name="comment"></textarea>
                                </form>
                            </div>
                            <div class="gitment-editor-preview-field gitment-hidden">
                                <div class="gitment-editor-preview gitment-markdown"></div>
                            </div>
                        </div>
                    </div>
                    <div class="gitment-editor-footer">
                        <button class="gitment-editor-submit" title="Login to Comment" type="submit" name="submit">submit</button>
                    </div>
                </div>
            </form>

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
