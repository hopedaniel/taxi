<div class="progress progress-striped active">
  <div class="bar" style="width: 0px;"></div>
</div>
<script>
	$(document).ready(function(e) {
		
		
		setInterval(function(){widthbar = parseInt($('.bar').width()); widthbard = widthbar + 50; $('.bar').animate({width:widthbard+'px'},50)},200);
    });
</script>