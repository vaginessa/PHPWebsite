<!DOCTYPE html>
<html>
    <head>
<?php
    $loginaborted = ($_GET["loginaborted"])?: 0;

    function average($img) {
        $w = imagesx($img);
        $h = imagesy($img);
        $r = $g = $b = 0;
        for($y = 0; $y < $h; $y++) {
            for($x = 0; $x < $w; $x++) {
                $rgb = imagecolorat($img, $x, $y);
                $r += ($rgb >> 16) & 255;
                $g += ($rgb >> 8) & 255;
                $b += $rgb & 255;
            }
        }

        $pxls = $w * $h;

        $r = round($r / $pxls);
        $g = round($g / $pxls);
        $b = round($b / $pxls);

        return (255 << 24) | ($r << 16) | ($g << 8) | $b;
    }

    function random($array) {
        return $array[rand(0, count($array) - 1)];
    }

    $possible_images = array(
        "img/background000.jpg",
        "img/background001.jpg",
        "img/background002.jpg",
        "img/background003.jpg",
        "img/background004.jpg",
        "img/background005.jpg",
        "img/background006.jpg",
        "img/background007.jpg",
        "img/background008.jpg",
        "img/background009.jpg",
        "img/background010.jpg",
        "img/background011.jpg",
        "img/background012.jpg",
        "img/background013.jpg",
        "img/background014.jpg",
        "img/background015.jpg",
        "img/background016.jpg",
        "img/background017.jpg",
        "img/background018.jpg",
        "img/background019.jpg",
        "img/background020.jpg",
        "img/background021.jpg",
        "img/background022.jpg",
        "img/background023.jpg",
        "img/background024.jpg",
        "img/background025.jpg",
    );

    $img_path = random($possible_images);
    $img = imagecreatefromjpeg($img_path);

    $average_color_rgb = average($img);

    imagedestroy($img);
?>
        <title>MyWebsite - Login</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Sansita" rel="stylesheet">

        <link rel="stylesheet" href="css/general-style.css">
        <link rel="stylesheet" href="css/index-style.css">

        <style type="text/css">
body {
    background-image: url(<?php print "\"" . $img_path . "\"";?>);
}

<?php
    if($loginaborted != 0) {
        print ".website-message-wrong-credentials {\n    color: rgb(244, 86, 66);\n}\n\n.website-message-wrong-credentials a {\n    color: rgb(247, 40, 14);\n}\n\n";
    }
?>
.login-wrapper {
    background: rgba(<?php print (($average_color_rgb >> 16) & 255) . ", " . (($average_color_rgb >> 8) & 255) . ", " . ($average_color_rgb & 255); ?>, 0.6);
}
        </style>
    </head>
    <body>

        <div class="sticky-header">
            <a href="index.php"><img src="img/logo.png"/></a>
            <form method="get" action="search.php">
                <input type="text" name="content" placeholder="Search on MyWebsite" class="input-tf-nonstretch">
                <input type="submit" value="" text="" class="input-button-search"/>
            </form>
        </div>
    
        <div class="login-wrapper">
            <span class="website-header">MyWebsite</span><br/>
            <span class="website-sub-header">The best community to have yet existed!</span>
            <?php
                if($loginaborted != 0) {
                    print "<br/><span class=\"website-message-wrong-credentials\">Your password or username were incorrect. <a href=\"restore.php\">Forgot your password?</a></span>";
                }
            ?>
            <form action="login.php" method="POST">
                <input type="text" name="name" placeholder="Username or E-Mail address" class=" input-tf">
                <input type="password" name="pw" placeholder="Your password" class="input-tf">
                <input type="submit" name="submit-btn" class="input-button-submit" value="Let's go!" text="Let's go!">
                <div class="left-align">
                    <div class="inline-wrapper"><label><input type="checkbox" name="keeploggedin">Keep me signed in.</label></div>
                    <div class="inline-wrapper shift-right small-font">
                        Not a member yet? <a href="signup.php">Sign up.</a>
                        <br/>
                        <a href="restore.php">Forgot your password?</a>
                    </div>
                </div>
            </form>
        </div>
    
    
        <div class="footer-wrapper">
            <div class="footer-list-wrapper">
                <ul class="footer-list">
                    <li><a href="terms.php">Terms of service</a></li>
                    <li><a href="privacy.php">Privacy note</a></li>
                    <li><a href="support.php">Support</a></li>
                    <li><a href="info.php">Informations</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>