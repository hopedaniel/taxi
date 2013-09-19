<?php 

function filter_text($text){ return htmlspecialchars($text); }
function filter_sql($text){ return mysql_real_escape_string($text); }	
function filter_numbers($p) { 
$p = filter_var($p, FILTER_SANITIZE_NUMBER_INT);  
return $p; }
function get_data($var){
	if (get_magic_quotes_gpc()) {
  if(isset($_POST[$var])) { $var= stripslashes($_POST[$var]); } elseif(isset($_GET[$var])) { $var = stripslashes($_GET[$var]); } else { $var = false; }
} else {
   if(isset($_POST[$var])) { $var= $_POST[$var]; } elseif(isset($_GET[$var])) { $var = $_GET[$var]; } else { $var = false; }
}
return $var;
	}

?>