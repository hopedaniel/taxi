<?php


function auth_user($login,$password) {
	global $soul_site;
	
	$password = md5($password).$soul_site;

	
	if (num_query("SELECT * FROM `user` WHERE `login` = '".$login."' AND `password` = '".$password."' LIMIT 0, 1 ") == 1) {
		$sql = fetch_query("SELECT * FROM `user` WHERE `login` = '".$login."' AND `password` = '".$password."' LIMIT 0, 1 ");
		$y2k = mktime(0,0,0,1,1,2020);
		$keyc = base64_encode(md5('yes'));
		$usid = $sql['id'];
		setcookie('usid', $usid, $y2k);
		setcookie('keyc', $keyc, $y2k);
		echo 1;
	} else {echo "";}
	
}


function unauth_user() {
	setcookie('usid');
	setcookie('keyc');
}


function auth() {
	if(@$_COOKIE['keyc']==base64_encode(md5('yes')) && $_COOKIE['usid']!='') {
		return TRUE;
	}else{
		return false;
	}
}
function get_user_data($id){		
	$check = num_query("SELECT * FROM `user` WHERE `id` =".$id);
	if ($check==0) {$data['login'] = 'guest'; return $data;}
	$data = fetch_query("SELECT * FROM `user` WHERE `id` =".$id);
return $data; 

}
function currient_user_data () {
	if (!auth()) {return false ;}
	$user_bd = fetch_query("SELECT * FROM `user` WHERE `id` = '".$_COOKIE['usid']."'");
	return $user_bd;
	}
	
function user_login($id=false) {
	 if ($id =="" ) { 	$user_bd = currient_user_data (); } else   { $user_bd = get_user_data($id); } 
	return $user_bd['login'];
	}	

?>