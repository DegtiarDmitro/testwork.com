<?php
    if($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_GET['id']) && $validUserName){
        $title = "Редактируем товар!!!";
        $prod_id = abs((int)$_GET['id']);
        $product = getItemById($prod_id);
        
        echo "<h2>$title</h2>";
        if(is_array($product)){
?>
    <form id="redItem" name="addItem" method="post">
        <input type="hidden" id="id" type="text" name="id" value="<?echo $product['id']?>"/></td>
  		<table>
          <tr>
            <td><label for="title">Название товара</label></td>
            <td><input id="title" type="text" name="title" value="<?echo $product['title']?>"/></td>
          </tr>
          <tr>
            <td><label for="price">Цена, грн</label></td>
            <td><input id="price" type="text" name="price" value="<?echo $product['price']?>"/></td>
          </tr>
          <tr>
            <td><label for="descr">Описание товара</label></td>
            <td><textarea id="descr" name="descr" cols="40" rows="4">"<?echo $product['description']?>"</textarea></td>
          </tr>
        </table>
 			<button type="button" onclick="redactItem()" >Редактировать товар</button>
  		</div>	
    </form>
<?php
}}
?>