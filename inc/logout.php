<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        setcookie("userName", "", time()-3600, '/');
        setcookie("userId", "", time()-3600, "/");
        header("Location: http://testwork.com");
    }
?>