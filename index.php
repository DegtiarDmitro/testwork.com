<?php
    include("inc/head.inc.php");
?>

<div id="header-wrapper">
	<?php include("views/header.view.php");?>
</div>

<div id="banner-wrapper">
	<form id="form">
        <input type="hidden" name="page" value="getbytitle"/>
        <input id="search" type="text" name="search" value="Поиск товаров по названию" size="50"/>
        <button class="active" type="button" onclick="getItemsByTitle()">Поиск</button>
    </form>
</div>

<div id="page-wrapper">
    <div id="page" class="container">
        <div id="items">
            <?php include("inc/routing.content.php");?>
        </div>  
        <div id="sidebar">
            <?php include("views/sidebar.view.php");?>
        </div>
	</div>
</div>

<div id="copyright" class="container">
	<p>&copy; Design by TEMPLATED and Me</p>
</div>
</body>
</html>
