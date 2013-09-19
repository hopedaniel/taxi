<section id="middle">

	<div id="container">
		<div id="content">
					<a class="btn btn-inverse" style="position:fixed; top:30px; right:20px;" href=".." target="_blank"><i class="icon-home"></i> Перейти на сайт</a>
			<div id="content_main">
            

            	<?php echo $datapage; ?>
            </div>
		</div>
	</div>
    <!-- #container-->

	<aside id="sideLeft">
			<div align="center"><a href="index.php?p=index"><img src="templates/admin/img/kyattsu.png"></a></div>
    		<ul class="side-nav">
            <?php 
			$menu_admin = do_query("SELECT * FROM `menu` where `id_menu` = 1 and `subid` = 0");
			while ($menu_admin_data = mysql_fetch_array($menu_admin)) {
            $submenu_admin = fetch_query("SELECT * FROM `menu` where `id_menu` = 1 and `subid` = ".$menu_admin_data['id'].";");
			?>
            <li class="<?php if ($submenu_admin != '') {echo 'dropdown';} ?>">
            <a class="<?php if ($submenu_admin != '') {echo 'dropdown-toggle';} ?>" href="<?=$menu_admin_data['url'];?>"><?=$menu_admin_data['name'];?></a>
            <?php
			if ($submenu_admin != '') {
				echo '<ul id="members-dropdown">';
			$submenu_admin_d = do_query("SELECT * FROM `menu` where `id_menu` = 1 and `subid` = ".$menu_admin_data['id'].";");
			while ($submenu_admin_data = mysql_fetch_array($submenu_admin_d)) { ?>
            	<li><a href="<?=$submenu_admin_data['url'];?>"><?=$submenu_admin_data['name'];?></a></li>
            <?php } echo '</ul>'; } ?>
            </li>
            <?php } ?>
			</ul>
	</aside>
    <!-- #sideLeft -->

</section>