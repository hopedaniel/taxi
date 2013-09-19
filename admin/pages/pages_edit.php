<?php
$file = filter_text($_GET['file']);
$dirpages = "../core/pages/";
if ($_GET['type']=='save' && $_POST["text"] != '') {
	if (file_exists($dirpages.$file)) {
		$handle = fopen($dirpages.$file, "wb");
		fwrite($handle, $_POST["text"]);
		header('location: ?p=pages&file='.$file);
	}
}
if (file_exists($dirpages.$file)) {
	$dat = file_get_contents($dirpages.$file);
	echo "<form method='post' action='?p=pages&file=".$file."&type=save'><textarea id='code' name='text' style='width:100%; min-height:250px;'>".$dat."</textarea><input type='submit' class='btn btn-success' value='Сохранить'></form>";
}else {
	echo 'Файл страницы не найден.';
}

	
?>
<script type="text/javascript">
  var editor = CodeMirror.fromTextArea('code', {
    height: "350px",
    parserfile: ["parsexml.js", "parsecss.js", "tokenizejavascript.js", "parsejavascript.js", "parsehtmlmixed.js", "tokenizephp.js", "parsephp.js", "parsephphtmlmixed.js"],
    stylesheet: ["../css/xmlcolors.css", "../css/jscolors.css", "../css/csscolors.css", "../css/phpcolors.css"],
    path: "../js/"
  });
</script>