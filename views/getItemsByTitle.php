<?php 
    if($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_GET['search'])){
        $search = $_GET['search'];   
        if($products = getItemsByTitle($search))
            $title = "Товары по запросу: $search";
        else
            $title = "По вашему запросу ничего не найдено";
    
        echo "<h2>$title</h2>";
        if (is_array($products))
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
}}
?>