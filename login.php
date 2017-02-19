<!DOCTYPE html>
<html>
	<head>
		<title>Redirect</title>
<?php 

	$name = $_POST["name"];
	$pw = $_POST["pw"];
	$keeploggedin = ($_POST["keeploggedin"])? : false;

	$forwardURL = "";
	
	function checkCredentials($username, $password) {
		return ($username == "bitchyprincefun") && ($password == "ParryHotter05Keuerfelch");
	}

	function unsuccessfullLogin() {
		global $forwardURL;
		$forwardURL = "index.php?loginaborted=1";
	}
	
	function successfullLogin( $username ) {
		global $forwardURL;
		$forwardURL = "content.php?username=" . $username;
	}
	
	if ($name && $pw) {
		if (checkCredentials($name, $pw)) {
			successfullLogin($name);
		} else {
			unsuccessfullLogin();
		}
	} else {
		unsuccessfullLogin();
	}
	
	print "<meta http-equiv=\"refresh\" content=\"0; url=" . $forwardURL . "\"/>";
?>
        <script type="text/javascript">
            window.location.href = <?php print "\"" . $forwardURL . "\"";?>;
        </script>
	</head>
	<body>
        <!-- Note: don't tell people to `click` the link, just tell them that it is a link. -->
        If you are not redirected automatically, follow this <a href='<?php print $forwardURL;?>'>link</a>.
    </body>
</html>