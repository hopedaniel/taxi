<?php
error_reporting (55);
session_start(); 
if(is_file("../config.php")) {include "../config.php";}


/*функции*/
$dirfunc = "../core/function/";
if (is_dir($dirfunc)) {
   if ($dhfunc = opendir($dirfunc)) {
       while (($filefunc = readdir($dhfunc)) !== false) {
		   if ($filefunc!='' & $filefunc!='.' & $filefunc!='..' & $fileconf!='.DS_Store'){
          include "../core/function/".$filefunc;
		   }
       }
       closedir($dhfunc);
   }
}
if (!auth()) {die( header("Location: .."));}
if (!isset($_GET['p'])) {
	ob_start();
	include('pages/index.php');
	$datapage = ob_get_contents();
	ob_end_clean();
} else {
$url = filter_text(filter_sql($_GET['p'])).'.php';
$i=0;
$dirpage = "pages/";
if (is_dir($dirpage)) {
   if ($dhpage = opendir($dirpage)) {
       while (($filepage = readdir($dhpage)) !== false) {
		   if ($filepage!='' & $filepage!='.' & $filepage!='..'){
			   if ($url == $filepage) {
				   $dat_file = $filepage;
				   
				 $i=1;  
			   }
		  else{
         
		  
		  }
		   }
       }
       closedir($dhpage);
   }
}

if($i==1) {
	ob_start();
	include("pages/".$dat_file);
	$datapage = ob_get_contents();
	ob_end_clean();}else{		
	ob_start();
	include("pages/404.php");
	$datapage = ob_get_contents();
	ob_end_clean();}
	}
/* формирование */

$admin_templates = fetch_query("SELECT * FROM `options` WHERE `title` = 'admin_template'");

$datcss = '';
$datjs = '';
$dircss = 'templates/'.$admin_templates["parametr"].'/css/';
$dirjs = 'templates/'.$admin_templates["parametr"].'/js/';
$dirjslib = 'templates/'.$admin_templates["parametr"].'/jslib/';
$dirlib = 'lib/';
if (is_dir($dircss)) {
   if ($dhcss = opendir($dircss)) {
       while (($filecss = readdir($dhcss)) !== false) {
		   if ($filecss!='' & $filecss!='.' & $filecss!='..' & $fileconf!='.DS_Store'){
          $datcss .= '<link rel="stylesheet" href="templates/'.$admin_templates["parametr"].'/css/'.$filecss.'" />';
		  
		   }
       }
       closedir($dhcss);
   }
}

if (is_dir($dirlib)) {
   if ($dhlib = opendir($dirlib)) {
       while (($filelib = readdir($dhlib)) !== false) {
		   if ($filelib!='' & $filelib!='.' & $filelib!='..' & $fileconf!='.DS_Store'){
          $datjs .= '<script src="lib/'.$filelib.'" ></script>';
		   }
       }
       closedir($dhlib);
   }
}

if (is_dir($dirjslib)) {
   if ($dhjs = opendir($dirjslib)) {
       while (($filejs = readdir($dhjs)) !== false) {
		   if ($filejs!='' & $filejs!='.' & $filejs!='..' & $fileconf!='.DS_Store'){
          $datjs .= '<script src="templates/'.$admin_templates["parametr"].'/jslib/'.$filejs.'" ></script>';
		   }
       }
       closedir($dhjs);
   }
}

if (is_dir($dirjs)) {
   if ($dhjs = opendir($dirjs)) {
       while (($filejs = readdir($dhjs)) !== false) {
		   if ($filejs!='' & $filejs!='.' & $filejs!='..' & $fileconf!='.DS_Store'){
          $datjs .= '<script src="templates/'.$admin_templates["parametr"].'/js/'.$filejs.'" ></script>';
		   }
       }
       closedir($dhjs);
   }
}



include 'templates/'.$admin_templates["parametr"].'/header.php';

include 'templates/'.$admin_templates["parametr"].'/main.php';
include 'templates/'.$admin_templates["parametr"].'/footer.php';

if (!isset($_GET['ajax'])) {}else{
$url = filter_text(filter_sql($_GET['ajax'])).'.php';
$i=0;
$dirpage = "ajax/";
if (is_dir($dirpage)) {
   if ($dhpage = opendir($dirpage)) {
       while (($filepage = readdir($dhpage)) !== false) {
		   if ($filepage!='' & $filepage!='.' & $filepage!='..'){
			   if ($url == $filepage) {
				   $dat_file = $filepage;
				   
				 $i=1;  
			   }
		  else{
         
		  
		  }
		   }
       }
       closedir($dhpage);
   }
}

if($i==1) {		
	ob_start();
	include("ajax/".$dat_file);
	$datapage = ob_get_contents();
	ob_end_clean(); echo $datapage;}else{
	echo 'err';}
}
?>