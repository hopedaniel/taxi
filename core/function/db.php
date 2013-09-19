<?php

// db config 
if ($c_db["location"] == "") {echo "MySQL error<br />database location not set";}
if ($c_db["user"] == "") {echo "MySQL error<br />user not set";}
//db try port
if ($c_db["try_port"] == 1) {
$is_open_db = fsockopen($c_db["location"], $c_db["port"], $errno_db, $errstr_db, 30);
if (!$is_open_db) {echo "$errstr_db ($errno_db)<br />\n";}
} 
// db connection 
try {
$dbcnx = mysql_connect($c_db["location"], $c_db["user"], $c_db["passwd"]);
} catch (Exception $e) {
    echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
}

if(!$dbcnx) {  echo "MySQL error<br />coudn't connect". mysql_error(); }
if(!mysql_select_db($c_db["name"], $dbcnx)) { echo "MySQL error<br />database not found"; }
if($c_db["names"] !="") {  mysql_query("SET NAMES ".$c_db["names"]." ;"); } 


//обработчик запросов
function do_query($query){
	@$_SESSION["query_count"]++;
    $time_start = microtime(1);
	 $result = mysql_query($query);
 	$query_time = microtime(1) - $time_start;
    @$_SESSION["query_time"] += $query_time;
	@$_SESSION["sql_query"][] =  $query_time;
	if (mysql_errno()) {   echo "MySQL error",$debug="".mysql_errno().": ".mysql_error()."<br>When executing:<br>$query<br>"; }
	@$_SESSION["query_debug"][$_SESSION["query_count"]]["query"] = $query;
	@$_SESSION["query_debug"][$_SESSION["query_count"]]["time"] = $query_time;
    return $result;
}
//fetch 1 line mysql query
function fetch_query($quer) {
return mysql_fetch_array(do_query($quer)); 	
	}
	
//count rows in query
	function num_query($quer) {
return mysql_num_rows(do_query($quer)); 	
	}
	
//fetch muliline query to array
	function array_query($query) {
		$sql = do_query($query);
		while ($dat =mysql_fetch_array($sql)) {$d[]=$dat;}
		return $d;
		}
?>