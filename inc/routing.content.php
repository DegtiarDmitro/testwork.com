<?php
        switch($page){
            case 'registr': include("views/registration.view.php"); break;
            case 'getbytitle': include("views/getItemsByTitle.php"); break;
            case 'login': include("views/login.view.php"); break;
            case 'additem': include("validUserViews/addItem.view.php"); break;
            case 'redactitem': include("validUserViews/redactItem.view.php"); break;
            case 'getmyitem':include("validUserViews/getMyItems.view.php"); break;
            default: include("views/getItems.view.php");
        }
?>