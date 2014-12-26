<?php
    if($validUserName){
        $title = "Мои товары";
        
        $products = getItemsByUserId($validUserId);
        
        echo "<h2>$title</h2>";
        if(is_array($products)){
            foreach($products as $product){
?>
    <div id="descr">
        <p>
            <strong><?php echo $product['title']?></strong><br/>Цена: <?php echo $product['price']?><br />
            <strong>Описание: </strong><?php echo $product['description']?><br />
            <a href="<?echo "/inc/deleteItem.php?id={$product['prod_id']}"?>">Удалить</a>
            <a href="<?echo "?page=redactitem&id={$product['prod_id']}"?>">Редактировать</a>
        </p>
    </div>
<?php
}}}
?>