<!DOCTYPE html>
<html>
    <head>
<?php
    $RETURNSTATE_REGISTRATION_ABORTED = 2;

    $returnstate = ($_GET["returnstate"])?: 0;

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

        <title>MyWebsite - Sign up</title>

        <link href="https://fonts.googleapis.com/css?family=Asul" rel="stylesheet">

        <link rel="stylesheet" href="css/general-style.css">
        <link rel="stylesheet" href="css/signup-style.css">

        <style type="text/css">
body {
    background-image: url(<?php print "\"" . $img_path . "\"";?>);
}
        </style>
        <script language="javascript" type="text/javascript" src="js/registrationvalidation.js"></script>
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
            <!--

            <span class="giant-title">
                You want to sign up for MyWebsite?
            </span>
            <span class="huge-title">
                Well first let me tell you a little about this site:
            </span>

            <img src="img/background014.jpg">
            <img src="img/election_badge.png">

            We here at MyWebsite believe that gaming is just as equally fun as creating the games and equipment for gaming! Thus we created a website with one intent: To share your experience with games, coding and modding.

            <br clear="both"/>
            <span class="huge-title">
                You might think what this gets you?
            </span>

            <img src="img/election_badge.png">

            Well it gives you for one the ability to simply share the awesome stuff you created, and reaching out to other people that are just like you! Moreover this website is also intended to give game studios the possibility to quickly see what might be good, or bad about their game. Also if you run into problems concerning the topics mentioned earlier, feel free to post your problem and let other people help you out!

            <span class="huge-title">
                Why would we provide you with such awesomeness?
            </span>

            Because we know, as we are developers ourselves, that some problems are very hard to solve on your own, and your friends don't always have the time for you and your problems; or might not even get along with what you're doing in general. As for that we've been looking for a solution for a long time, and then finally decided to simply create the solution to our problems ourselves.

            <span class="huge-title">
                Enough chit-chat! Let's get you right in.
            </span>

            -->

            <span class="giant-title">
                You want to sign up for MyWebsite?
            </span>
            <span class="huge-title">
                Well first let me tell you a little about this site:
            </span>

            <img src="img/background014.jpg">
            <img src="img/election_badge.png">

            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

            <br clear="both"/>
            <span class="huge-title">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr
            </span>

            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br/>
            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

            <span class="huge-title">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr
            </span>

            <img src="img/election_badge.png">

            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br/>

            <span class="huge-title">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr
            </span>

            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br/>
            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

            <span class="huge-title">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr
            </span>

            <div class="registrationform-wrapper">
                <form name="registrationform" action="sendregistration.php" onsubmit="return validateRegistration();" method="POST">
                    <span id="register-error"><?php if($returnstate == $RETURNSTATE_REGISTRATION_ABORTED) print "The username you selected is already taken.";?></span>
                    <input class="registration-stretch-textfield" type="text" name="username" placeholder="Username">
                    <input class="registration-stretch-textfield" type="email" name="email" placeholder="E-Mail">
                    <input class="registration-stretch-textfield" type="password" name="pw1" placeholder="Password">
                    <input class="registration-stretch-textfield" type="password" name="pw2" placeholder="Repeat password">
                    <label class="accept-tos-checkbox-label">
                        <input type="checkbox" name="acceptstos">
                        I have read, understood and accept the <a href="terms.php">Terms of service</a>
                    </label>
                    <button type="submit" class="register-button">Register for MyWebsite</button>
                </form>
            </div>
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