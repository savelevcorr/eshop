<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/db.inc.php";
?>
<html>
<head>
	<title>Каталог товаров</title>
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>: <?= $count ?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th>Название</th>
		<th>Автор</th>
		<th>Год издания</th>
		<th>Цена, руб.</th>
		<th>В корзину</th>
	</tr>
<?php
	$goods = selectAllItems();
	if(!is_array($goods )){
		echo 'Произошла ошибка при вводе товаров';
		exit;
	}
	if(!$goods){
		echo 'На сегодня товаров нет.';
		exit;
	}
	foreach($goods as $item) {
?>
		<tr>
			<td><?= stripslashes($item['title'])?></td>
			<td><?= $item['author']?></td>
			<td><?= $item['pubyear']?></td>
			<td><?= $item['price']?></td>
			<td><a href="add2basket.php?id=<?=$item['id']?>">В корзину</a></td>
		</tr>
<?
	}
?>
</table>
</body>
</html>