<?php

$template = fetch_query("SELECT * FROM  `options` WHERE  `title` = 'template'");
$admin_template = fetch_query("SELECT * FROM  `options` WHERE  `title` = 'admin_template'");
$title = fetch_query("SELECT * FROM  `options` WHERE  `title` = 'title'");

echo '<h2>Редактирование параметров сайта</h2>';

	echo '<div class="input-append"><input class="span2 template" id="appendedInput" value="'.$template['parametr'].'" type="text"><span class="add-on">'.$template['title'].'</span> <button type="submit" class="btn" onClick="save_template()">Сохранить</button></div><br>';

	echo '<div class="input-append"><input class="span2 admin_template" id="appendedInput" value="'.$admin_template['parametr'].'" type="text"><span class="add-on">'.$admin_template['title'].'</span> <button type="submit" class="btn" onClick="save_admin_template()">Сохранить</button></div><br>';

	echo '<div class="input-append"><input class="span2 title" id="appendedInput" value="'.$title['parametr'].'" type="text"><span class="add-on">'.$title['title'].'</span> <button type="submit" class="btn" onClick="save_title()">Сохранить</button></div><br>';
	
?>