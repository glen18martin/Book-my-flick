<?php

session_start();
$checklog = 'off';
$_SESSION["checklog"] = "$checklog";

header("Location:signinup.html");

?>