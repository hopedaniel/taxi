<?php

	$login = filter_text(get_data('login'));
	$password = filter_text(get_data('password'));
	$mail = filter_text(get_data('mail'));
	$password = md5($password).$soul_site;



if (num_query("SELECT * FROM `user` WHERE `login` = '".$login."';")!=0) {
	echo 'index.php?p=login&login='.$login;
} else {
	if (do_query("INSERT INTO `user` (`login`, `password`, `email`) VALUES ('".$login."', '".$password."', '".$mail."');")) {if(auth_user($login,$password)) { echo 1; } else {echo 'index.php?p=login&auth=0&login='.$login;}}
}

?> 