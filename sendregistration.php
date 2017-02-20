<!DOCTYPE html>
<html>
    <head>
<?php
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



    // TODO: Try to add the user to the database

    // print "<meta http-equiv=\"refresh\" content=\"0; url=signup.php?returnstate=2\"/>";
?>
        <title>MyWebsite - Sending Registration</title>
        
        <link href="https://fonts.googleapis.com/css?family=Asul" rel="stylesheet">

        <link rel="stylesheet" href="css/general-style.css">

        <style type="text/css">
body {
    background-image: url(<?php print "\"" . $img_path . "\"";?>);
}

.error-icon {
    width: 70px;
    margin-right: 12px; 
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
    
        <div class="content">
            <img src="img/error_icon.png" class="error-icon">

            <span class="giant-title">
                501 - NOT_IMPLEMENTED
            </span>
            <span class="huge-title">
                That's the error code you just received
            </span>

            <br clear="both"/>

            <p>This is supposed to tell you that the action you just tried to execute (register for this website) is not yet implemented.</p>
            <p>This has happened since our service is very young, and thus we haven't had any time to implement said function.</p>
            <p>We're very sorry for any inconveniences that might have occurred, and want to tell you that you can try again later, since we might have found the time to finally create the requested function.</p>

        </div>
    
        <div class="footer-wrapper">
            <div class="footer-list-wrapper">
                <ul class="footer-list">
                    <li><a href="terms.php">Terms of service</a></li>
                    <li><a href="privacy.php">Privacy note</a></li>
                    <li><a href="support.php">Support</a></li>
                    <li><a href="info.php">Information</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>