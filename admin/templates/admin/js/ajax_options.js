function save_template() {
$.ajax({
   type: "POST",
   url: "index.php?ajax=options_main",
   data: "do=template&template="+$('.template').val(),
   success: function(msg){
     alert( "Data Saved" );
   }
 });
}

function save_admin_template() {
$.ajax({
   type: "POST",
   url: "index.php?ajax=options_main",
   data: "do=template&template="+$('.admin_template').val(),
   success: function(msg){
     alert( "Data Saved" );
   }
 });
}

function save_title() {
$.ajax({
   type: "POST",
   url: "index.php?ajax=options_main",
   data: "do=title&title="+$('.title').val(),
   success: function(msg){
     alert( "Data Saved" );
   }
 });
}

function save_userdata(id) {
$.ajax({
   type: "POST",
   url: "index.php?ajax=options_user_data",
   data: "do=save&login="+$('.login'+id).val()+"&email="+$('.email'+id).val()+"&password="+$('.password'+id).val()+"&id="+id,
   success: function(msg){
     alert( "Data Saved" );
   }
 });
}


