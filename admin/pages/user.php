<?php

$user_data = array_query("SELECT * FROM  `user`");

echo '<input id="searcnamedat" value="" onkeypress="return runsearcnamedat(event)"><button type="submit" class="btn" onClick="searcnamedat()">Поиск</button><br><br>';

foreach ($user_data as $item) {
	echo '<div style="float:left; margin:7px; padding:7px; border:#ccc solid 1px;" id="'.$item['login'].'" class="nameloginuser"><div class="input-append">
	<input class="span2 login'.$item['id'].'" id="appendedInput" value="'.$item['login'].'" type="text">
	<span class="add-on">Логин</span> 
	</div><br>
	<div class="input-append">
	<input class="span2 email'.$item['id'].'" id="appendedInput" value="'.$item['email'].'" type="text">
	<span class="add-on">Email</span> 
	</div><br>
	<div class="input-append">
	<input class="span2 password'.$item['id'].'" id="appendedInput" value="" type="text">
	<span class="add-on">Пароль</span> 
	</div><br>
	<button type="submit" class="btn" onClick="save_userdata(\''.$item['id'].'\')">Сохранить</button><br></div>';
	
}
echo '<div style="clear:both;"></div>'.$soul_site;

?>

<script>

function searcnamedat() {
	val = $('#searcnamedat').val();
	
	if ($('body').find('[id*='+val+']')) {
	$('.nameloginuser').fadeOut(0);
	$('.nameloginuser[id*='+val+']').fadeIn(0);}
	if($('#searcnamedat').val()=='') {
	$('.nameloginuser').fadeIn(0);
	}
}

function onblursearchuser(){
	if($('#searcnamedat').val()=='') {
	$('.nameloginuser').fadeIn(0);
	}
}

function runsearcnamedat(e) {
    if (e.keyCode == 13) {
        val = $('#searcnamedat').val();
	
	if ($('body').find('[id*='+val+']')) {
	$('.nameloginuser').fadeOut(0);
	$('.nameloginuser[id*='+val+']').fadeIn(0);}
	if($('#searcnamedat').val()=='') {
	$('.nameloginuser').fadeIn(0);
	}
    }
}
</script>