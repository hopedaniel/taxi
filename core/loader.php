<?php

if(is_file("config.php")) {include "config.php";}

/*функции*/
$dirfunc = "core/function/";
if (is_dir($dirfunc)) {
   if ($dhfunc = opendir($dirfunc)) {
       while (($filefunc = readdir($dhfunc)) !== false) {
		   if ($filefunc!='' & $filefunc!='.' & $filefunc!='..' & $filefunc!='.DS_Store'){
          include "core/function/".$filefunc;
		   }
       }
       closedir($dhfunc);
   }
}

/*конфиги*/
$dirconf = "core/config/";
if (is_dir($dirconf)) {
   if ($dhconf = opendir($dirconf)) {
       while (($fileconf = readdir($dhconf)) !== false) {
		   if ($fileconf!='' & $fileconf!='.' & $fileconf!='..' & $fileconf!='.DS_Store'){
          include "core/config/".$fileconf;
		   }
       }
       closedir($dhconf);
   }
}
if(!auth()){if ($_GET['p']!='login') {header("Location: index.php?p=login");}} 
if (!isset($_GET['p'])) {
	ob_start();
	include('core/pages/index.php');
	$datapage = ob_get_contents();
	ob_end_clean();
} else {
$url = filter_text(filter_sql($_GET['p'])).'.php';
$i=0;
$dirpage = "core/pages/";
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
	include("core/pages/".$dat_file);
	$datapage = ob_get_contents();
	ob_end_clean();}else{		
	ob_start();
	include("core/pages/404.php");
	$datapage = ob_get_contents();
	ob_end_clean();}
	}
/* формирование */
$datcss = '';
$datjs = '';
$dircss = 'core/templates/'.$tpl_name.'/css/';
$dirjs = 'core/templates/'.$tpl_name.'/js/';
$dirjslib = 'core/templates/'.$tpl_name.'/jslib/';
$dirlib = 'core/lib/';
if (is_dir($dircss)) {
   if ($dhcss = opendir($dircss)) {
       while (($filecss = readdir($dhcss)) !== false) {
		   if ($filecss!='' & $filecss!='.' & $filecss!='..' & $filecss!='.DS_Store'){
          $datcss .= '<link rel="stylesheet" href="core/templates/'.$tpl_name.'/css/'.$filecss.'" />';
		   }
       }
       closedir($dhcss);
   }
}

if (is_dir($dirlib)) {
   if ($dhlib = opendir($dirlib)) {
       while (($filelib = readdir($dhlib)) !== false) {
		   if ($filelib!='' & $filelib!='.' & $filelib!='..' & $filelib!='.DS_Store'){
          $datjs .= '<script src="core/lib/'.$filelib.'" ></script>';
		   }
       }
       closedir($dhlib);
   }
}

if (is_dir($dirjs)) {
   if ($dhjs = opendir($dirjs)) {
       while (($filejs = readdir($dhjs)) !== false) {
		   if ($filejs!='' & $filejs!='.' & $filejs!='..' & $filejs!='.DS_Store'){
          $datjs .= '<script src="core/templates/'.$tpl_name.'/js/'.$filejs.'" ></script>';
		   }
       }
       closedir($dhjs);
   }
}

if (is_dir($dirjslib)) {
   if ($dhjslib = opendir($dirjslib)) {
       while (($filejslib = readdir($dhjslib)) !== false) {
		   if ($filejslib!='' & $filejslib!='.' & $filejslib!='..' & $filejslib!='.DS_Store'){
          $datjslib .= '<script src="core/templates/'.$tpl_name.'/jslib/'.$filejslib.'" ></script>';
		   }
       }
       closedir($dhjslib);
   }
}

include 'core/templates/'.$tpl_name.'/header.php';

include 'core/templates/'.$tpl_name.'/main.php';
include 'core/templates/'.$tpl_name.'/footer.php';



?>