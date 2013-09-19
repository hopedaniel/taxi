<?php


if(is_file("config.php")) {include "config.php";}

/*функции*/
$dirfunc = "core/function/";
if (is_dir($dirfunc)) {
   if ($dhfunc = opendir($dirfunc)) {
       while (($filefunc = readdir($dhfunc)) !== false) {
		   if ($filefunc!='' & $filefunc!='.' & $filefunc!='..'){
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
		   if ($fileconf!='' & $fileconf!='.' & $fileconf!='..'){
          include "core/config/".$fileconf;
		   }
       }
       closedir($dhconf);
   }
}
if (!isset($_GET['p'])) {echo 'Ошибка нужно указать';}else{
$url = filter_text(filter_sql($_GET['p'])).'.php';
$i=0;
$dirpage = "core/ajax/";
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
	include("core/ajax/".$dat_file);
	$datapage = ob_get_contents();
	ob_end_clean(); echo $datapage;}else{
	echo 'err';}
}


?>