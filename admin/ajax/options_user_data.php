<?php
$soul_site = fetch_query("SELECT * FROM `options` WHERE `title` = 'soul_site'");
if(get_data('do')=='save') {
	do_query('UPDATE `user` SET `login`="'.get_data('login').'", `email`="'.get_data('email').'", `password`="'.md5(get_data('password')).$soul_site["parametr"].'" WHERE `id` ="'.get_data('id').'"');
}
?>