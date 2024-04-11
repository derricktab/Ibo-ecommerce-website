<?php

session_start();
session_destroy();
header('location: /ibo/login.php');
?>
