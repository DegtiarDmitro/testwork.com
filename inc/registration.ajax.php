<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include("dbLib.php");
        $login = clearStr($_POST['user']);
        $pass1 = clearStr($_POST['pass1']);
        $pass2 = clearStr($_POST['pass2']);
        $email = clearStr($_POST['email']);
        if (!isValidDataInForm($login, $pass1, $pass2, $email)){
            echo "<h2>Форма заполнена не правильно</h2>";
            return;
        }
        if (isUserExist($login)){
            echo "<h2>Такой пользователь уже существует</h2>";
            return;
        } else{
            addUser($login, $pass1);
            mail($email, "Test", "Text");
            echo "<h2>Вы зарегистрированы. Можете войти в систему</h2>";
        }
    }
    
    function isValidDataInForm($log, $pass1, $pass2, $email){
        if(!$log || !$pass1 || !$pass2 || !$email || ($pass1 !== $pass2))
            return false;
        return true;
    }
?>