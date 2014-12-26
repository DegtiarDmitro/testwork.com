<?php
    //обработка запроса на авторизацию
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include("dbLib.php");
        $login = clearStr($_POST['user']);
        $pass = clearStr($_POST['pass']);
        if (!isValidDataInForm($login, $pass) || !$user = isUserExist($login)){
            header("Location: http://testwork.com/index.php?page=login");
            exit;
        } else{
            if ($pass == $user['pass']){
                setcookie("userName", $user['login'], 0x7FFFFFFF, "/");
                setcookie("userId", $user['id'], 0x7FFFFFFF, "/");
            } 
        }
        header("Location: http://testwork.com");
    }
    
    function isValidDataInForm($log, $pass){
        if(!$log || !$pass)
            return false;
        return true;
    }
?>