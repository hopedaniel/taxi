<?php 
$soul_sites = fetch_query("SELECT * FROM `options` WHERE `title` = 'soul_site'");
$soul_site = $soul_sites['parametr'];

$data_site_title = fetch_query("SELECT * FROM `options` WHERE `title` = 'title'");
$title_site=$data_site_title['parametr'];
?>