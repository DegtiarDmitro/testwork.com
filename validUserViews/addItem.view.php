<form id="addItem" name="addItem" method="post">
  		<table>
          <tr>
            <td><label for="title">Название товара</label></td>
            <td><input id="title" type="text" name="title" /></td>
          </tr>
          <tr>
            <td><label for="price">Цена, грн</label></td>
            <td><input id="price" type="text" name="price" /></td>
          </tr>
          <tr>
            <td><label for="descr">Описание товара</label></td>
            <td><textarea id="descr" name="descr" cols="40" rows="4"></textarea></td>
          </tr>
        </table>
 			<button type="button" onclick="addItemToBase()" >Добавить товар</button>
  		</div>	
</form>