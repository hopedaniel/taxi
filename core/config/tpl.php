<?php
$data_site_template = fetch_query("SELECT * FROM `options` WHERE `title` = 'template'");
$tpl_name=$data_site_template['parametr'];

?>