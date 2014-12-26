<?php
    //получаем соединение с базой данных
    function db_connect(){
        $host = "localhost";
        $login = "root";
        $pass = "";
        $db_name = "shop";       
        $connction = mysqli_connect($host, $login, $pass, $db_name) or die(mysqli_connect_errno());
        if (!$connction)
            return false;
        return $connction;
    }
    
    //добавляем нового пользователя в базу
    function addUser($login, $password){
        if (!$connect = db_connect())
            return false;
        $sql = "INSERT into users(login, pass) VALUE (?, ?)";
        if (!$stmt = mysqli_prepare($connect, $sql))
            return false;
        mysqli_stmt_bind_param($stmt, "ss", $login, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }
    
    function isUserExist($login){
        if(!$connect = db_connect())
            return false;
        $sql = "SELECT id, login, pass FROM users WHERE login = '$login'";
        if(!$result = mysqli_query($connect, $sql))
            return false;
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $user;
    }
    
    
    //очищает строку от html-тегов и удаляет пробелы по краям
    function clearStr($data){
        return trim(strip_tags($data));
    }
    
    //добавляет товар определенного пользователя
    function addItem($user_id, $title, $price, $descr, $datetime){
        if (!$connect = db_connect())
            return false;
        $sql = "INSERT into products(user_id, title, price, description, datetime) VALUE (?, ?, ?, ?, ?)";
        if (!$stmt = mysqli_prepare($connect, $sql))
            return false;
        mysqli_stmt_bind_param($stmt, "isdsi", $user_id, $title, $price, $descr, $datetime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }
    
    //редактирует товар определенного пользователя
    function redactItem($prod_id, $title, $price, $descr, $datetime){
        if (!$connect = db_connect())
            return false;
 //       $descr = mysqli_real_escape_string($connect, $descr); 
        $sql = "UPDATE products SET title = '$title', price = $price, description = $descr, datetime = $datetime
                WHERE id = $prod_id";
        if(mysqli_query($connect, $sql))
            return false;
        return true;
    }
    
    //возвращает список всех пользователей
    function getAllUsers(){
        if(!$connect = db_connect())
            return false;
        $sql = "SELECT id, login FROM users";
        if(!$result = mysqli_query($connect, $sql))
            return false;
        $users = array();
        while($user = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $users[] = $user;
        }
        return $users;
    }
    
    //возвращает все товары
    function getAllItems(){
        if(!$connect = db_connect())
            return false;
        $sql = "SELECT title, price, description, login, users.id as id FROM users, products WHERE users.id = products.user_id";
        if(!$result = mysqli_query($connect, $sql))
            return false;
        $products = array();
        while($product = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $products[] = $product;
        }
        return $products;
    }
    
    //возвращает товары определенного пользователя
    function getItemsByUserId($user_id){
        if(!$connect = db_connect())
            return false;
        $sql = "SELECT products.id as prod_id, title, price, description, login, users.id as id FROM users, products 
                WHERE users.id = products.user_id AND user_id = $user_id";
        if(!$resultProd = mysqli_query($connect, $sql))
            return false;
        $products = array();
        while($product = mysqli_fetch_array($resultProd, MYSQLI_ASSOC)){
            $products[] = $product;
        }
        return $products;
    }
    
    //возвращает товары по названию
    function getItemsByTitle($title){
        if(!$connect = db_connect())
            return false;
        $sql = "SELECT products.id as prod_id, title, price, description, login, users.id as id FROM users, products 
                WHERE users.id = products.user_id AND title LIKE '%$title%'";
        if(!$resultProd = mysqli_query($connect, $sql))
            return false;
        $products = array();
        while($product = mysqli_fetch_array($resultProd, MYSQLI_ASSOC)){
            $products[] = $product;
        }
        return $products;
    }
    
    //возвращает товар по указанному id
    function getItemById($item_id){
        if(!$connect = db_connect())
            return false;
        $sql = "SELECT id, title, price, description FROM products 
                WHERE id = $item_id";
        if(!$resultProd = mysqli_query($connect, $sql))
            return false;
        $product = mysqli_fetch_array($resultProd, MYSQLI_ASSOC);
       
        return $product;
    }
    
    //возвращает последние добавленные товары
    function getLastAdded($num = 9){
        if(!$connect = db_connect())
            return false;
        $sql = "SELECT title, price, description, login, users.id as id FROM users, products WHERE users.id = products.user_id 
                ORDER BY datetime DESC LIMIT $num";
        if(!$result = mysqli_query($connect, $sql))
            return false;
        $products = array();
        while($product = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $products[] = $product;
        }
        return $products;
    }
    //удаляет товар по выбранному id
    function deleteItem($id){
        if (!$connect = db_connect())
            return false;
        $sql = "DELETE FROM products WHERE products.id = ?";
        if (!$stmt = mysqli_prepare($connect, $sql))
            return false;
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }
?>