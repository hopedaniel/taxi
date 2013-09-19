<?php
if (!isset($_GET['file'])) {
$dirpages = "../core/pages/";
echo '<div style="width:20%; padding-right:20px; display:inline-block; vertical-align:top;"><h4>Страницы сайта.</h4><ul>';
if (is_dir($dirpages)) {
   if ($dhpages = opendir($dirpages)) {
       while (($filepages = readdir($dhpages)) !== false) {
		   if ($filepages!='' & $filepages!='.' & $filepages!='..' & $filepages!='.DS_Store'){
          $dat = file_get_contents($dirpages.$filepages);
		  echo "<li><a href='?p=pages&file=".$filepages."'>".$filepages."</a></li>";
		   }
       }
       closedir($dhpages);
   }
}
echo '</ul></div>';
} else {
$dirpages = "../core/pages/";
echo '<div style="width:20%; padding-right:20px; display:inline-block; vertical-align:top;"><h4>Страницы сайта.</h4><ul>';
if (is_dir($dirpages)) {
   if ($dhpages = opendir($dirpages)) {
       while (($filepages = readdir($dhpages)) !== false) {
		   if ($filepages!='' & $filepages!='.' & $filepages!='..' & $filepages!='.DS_Store'){
          $dat = file_get_contents($dirpages.$filepages);
		  echo "<li><a href='?p=pages&file=".$filepages."'>".$filepages."</a></li>";
		   }
       }
       closedir($dhpages);
   }
}
echo '</ul></div><div style="width:75%; padding-left:20px; display:inline-block; vertical-align:top; border-left:1px solid #ccc;"><h4>Редактирование страницы.</h4>';
include 'pages_edit.php';
echo '</div>';
}
?>