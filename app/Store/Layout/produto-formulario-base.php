<tr>
	<td>Nome</td>
	<td> <input class="form-control" type="text" name="nome" value="<?=$product['nome']?>"></td>
</tr>
<tr>
	<td>Preço</td>
	<td><input  class="form-control" type="number" name="preco" 
		value="<?=$product['preco']?>"></td>
</tr>
<tr>
	<td>Descrição</td>
	<td><textarea class="form-control" name="descricao"><?=$product['descricao']?></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado
</tr>
<tr>
	<td>Categoria</td>
	<td>
		<select name="categoria_id" class="form-control">
		<?php foreach($categories as $category) :
			$essaEhACategoria = $product['categoria_id'] == $category['id'];
			$selecao = $essaEhACategoria ? "selected='selected'" : "";
			?>

			<option value="<?=$category['id']?>" <?=$selecao?>>
					<?=$category['nome']?>
			</option>
		<?php endforeach ?>
		</select>
	</td>
</tr>