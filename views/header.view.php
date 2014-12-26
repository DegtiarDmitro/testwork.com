<!-- Отвечает за отображение верхней части сайта, содержащей: логотип, меню, и форму авторизации-->
<div id="header" class="_container">
    <div id="label">
        <h1><a href="index.php">TestWork</a></h1>
    </div>
    <div id="menu">
        <ul>
            <div id="menu_item">
                <li><a href="index.php?userid=all" accesskey="2" title="">Товары пользователей</a></li>
            </div>
<?php
    if ($validUserName){
?>
            <div id="menu_prof">
                <li><a href="#" accesskey="3" title="">Мой профиль</a></li>
                <li><a href="index.php?page=getmyitem">Мои товары</a></li>
                <li><a href="index.php?page=additem">Добавить товар</a></li>
            </div>
<?php
} else{
?>
            <div id="menu_prof">
                <li><a href="index.php?page=login">Мой профиль</a></li>
            </div>
<?php
}
?>    
        </ul>
    </div>
    <div id="login">
        <?php
            if($validUserName)
                include("validUserViews/logout.view.php");
            else
                include("views/login.view.php");
        ?>
    </div>
</div>