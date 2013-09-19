<?php
if (!isset($_GET['page'])) {
$dirpages = "../core/pages/";
if (is_dir($dirpages)) {
   if ($dhpages = opendir($dirpages)) {
       while (($filepages = readdir($dhpages)) !== false) {
		   if ($filepages!='' & $filepages!='.' & $filepages!='..' & $filepages!='.DS_Store'){
          $dat = file_get_contents($dirpages.$filepages);
		  echo "<textarea>".$dat."</textarea>";
		   }
       }
       closedir($dhpages);
   }
}
}
?>