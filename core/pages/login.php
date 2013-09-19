<?php
if (auth()) {
echo 'Алоха '.user_login().'. Ты уже вошел!'; }
else{
?>
<style>

#main {
	height:210px;
	min-height:210px;
	width:255px; text-align: left;
	position: absolute;
	margin: auto;
	top: 0px;
	right: 0px;
	bottom: 0px;
	left: 0px;
	overflow:auto;
	padding:0px;
}

.login-form {
	margin:15px;	
	text-align:left;
}

.viewpass {
	height:20px;
	margin-top:14px;
	position:absolute;
	margin-left:-30px;
	cursor:pointer;
	opacity:0.7;
}

.viewpass:hover {
	opacity:1;
}

input[type="text"], input[type="password"], textarea, select {
	background: none repeat scroll 0% 0% rgb(233, 233, 233);
    border-right: 1px solid rgb(254, 253, 253);
    border-width: 1px;
    border-style: solid;
    border-color: rgb(191, 191, 191) rgb(254, 253, 253) rgb(254, 253, 253);
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    border-image: none;
    padding: 6px 10px;
    font-size: 13px;
    box-shadow: 0px 2px 6px rgb(228, 228, 228) inset;
    text-shadow: 1px 1px 0px rgb(255, 255, 255);
    border-radius: 4px 4px 4px 4px;
    width: 260px;
    margin: 7px 0px;
}
.widget-header {
    position: relative;
    height: 40px;
    line-height: 40px;
    background: -moz-linear-gradient(center top , rgb(250, 250, 250) 0%, rgb(233, 233, 233) 100%) repeat scroll 0% 0% transparent;
    border: 1px solid rgb(213, 213, 213);
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}
.widget-header h3 {
    top: 2px;
    position: relative;
    left: 10px;
    display: inline-block;
    margin-right: 3em;
    font-size: 14px;
    font-weight: 600;
    color: rgb(85, 85, 85);
    line-height: 18px;
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);
}
.widget-header [class^="icon-"], .widget-header [class*=" icon-"] {
    display: inline-block;
    margin-left: 13px;
    margin-right: -2px;
    font-size: 16px;
    color: rgb(85, 85, 85);
    vertical-align: middle;
}
.alert {display:none; position:absolute; width:200px; text-align:center; font-size:10px;}
</style>
<script>
$(document).ready(function(){
	$('.viewpass').tooltip();
	
});

function loginin() {
	login = $('#login').val();
	pass = $('#pass').val();	
	
	if (login=='' || pass==''){
		$(".alert").fadeIn().delay(1000).fadeOut();	return false;
	}
	$.ajax({
		type: "POST",
		url: "ajax.php?p=user",
		data: "login="+login+"&password="+pass,
		success: function(msg){
			if (msg == 1) {
				location.href = 'index.php';
			} else {
				$('.alert').html("Неверный логин или пароль.");
				$(".alert").fadeIn().delay(1000).fadeOut();
			}
		}
	});
}

</script>
<div class="widget-header">
					<i class="icon-user"></i>
					<h3>Вход</h3>
                    <div class="btn btn-inverse btn-mini " style="float:right;" onClick="location.href = 'index.php?p=register'">Регистрация<i class="icon-circle-arrow-right icon-white"></i></div>
				</div>
                <div class="alert">Заполните все поля правильно!</div>
<div class="login-form">
<form action="" onSubmit="">
<input type="text" placeholder="Логин" id="login" style="width:200px;" value="<?php echo get_data('login'); ?>"><br>
<input type="password" placeholder="Пароль" id="pass" style="width:200px;" value="<?php echo get_data('pass'); ?>"><img src="core/templates/pony/img/eye.png" class="viewpass" onMouseOver="$('#pass').attr({type: 'text'});" onMouseOut="$('#pass').attr({type: 'password'});" rel="tooltip" title="Все верно?"><br>

<div style="text-align:center;"><input type="submit" hidden="hidden"><input onClick="loginin();" type="button" value="Войти" class="btn btn-primary" ></div>
</form>
</div>
<?php } ?>