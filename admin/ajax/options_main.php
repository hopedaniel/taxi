<?php

if(get_data('do')=='template') {
	do_query('UPDATE `options` SET `parametr`="'.get_data('template').'" WHERE `title` ="template"');
}

if(get_data('do')=='admin_template') {
	do_query('UPDATE `options` SET `parametr`="'.get_data('template').'" WHERE `title` ="admin_template"');
}

if(get_data('do')=='title') {
	do_query('UPDATE `options` SET `parametr`="'.get_data('title').'" WHERE `title` ="title"');
}
?>