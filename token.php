<?php

$username = "6dbd2c15-59a7-4f6a-8c24-35c2b9b9963c";
$password = "0470ea1105a44666884e044cd04b060b";

	$str = $username.':'.$password;
	$auth  = base64_encode($str);
    echo($auth);

?>