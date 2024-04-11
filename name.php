<?php

    if(isset($_GET["c"])){
        $category = $_GET["c"];
        echo $category;
    }

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        echo $name;
    }


?>