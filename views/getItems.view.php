<?php
    if(isset($_GET['userid']) && !empty($_GET['userid'])){
        $userId = $_GET['userid'];
        if (abs((int)$userId) > 0){
            if($products = getItemsByUserId($userId))
                $title = "Товары добавленные пользователем ".$products[0]['login'];
            else
                $title = "У данного пользователя нету товаров";
        }
        else{
            $products = getAllItems();
            $title = "Все товары добавленные пользователями";
        }
    } else{
        $products = getLastAdded();
        $title = "Последние добавленные товары";
    }
    echo "<h2>$title</h2>";
    foreach($products as $product){
?>
    <div id="descr">
        <p>
            <strong><?php echo $product['title']?></strong><br/>Цена: <?php echo $product['price']?><br />
            Товар добавил: <a href="index.php?userid=<?php echo $product['id']?>"><?php echo $product['login']?></a><br />
            <strong>Описание:</strong><?php echo $product['description']?>
        </p>
    </div>
<?php
}
?>