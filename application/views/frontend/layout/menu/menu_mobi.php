<!-- mmmenu-->
<div class="hidden-lg hidden-md">
	<link type="text/css" rel="stylesheet" href="public/js/mmenu/demo/css/demo.css" />
	<link type="text/css" rel="stylesheet" href="public/js/mmenu/dist/jquery.mmenu.css" />
	<script type="text/javascript" src="public/js/mmenu/dist/jquery.mmenu.js"></script>
	<script type="text/javascript">
		$(function() {
			$('nav#menu').mmenu();
		});
	</script>
</div>
<div class="header hidden-lg hidden-md menuMobi">
	<a href="#menu"><span></span></a>
</div>
<?php if(isset($data_index['menuFull']) && $data_index['menuFull'] != NULL){ ?>
<nav id="menu">
	<ul>
		<?php foreach ($data_index['menuFull'] as $key_menuFull => $val_menuFull) { ?>
		<li>
			<a href="<?=$val_menuFull['url'];?>"><?php echo $val_menuFull['name'];?></a>
			<?php if($val_menuFull['child'] != NULL){ ?>
			<ul>
				<?php foreach ($val_menuFull['child'] as $key_menuFullChild2 => $val_menuFullChild2) {
					// $catemenuFullChild = $val_menuFullChild2['alias'].'/';
					// if($val_menuFullChild2['link'] != ''){
					// 	$catemenuFullChild = $val_menuFullChild2['link'];
					// }
				?>
				<li><a href="<?=$val_menuFullChild2['url'];?>"><?php echo $val_menuFullChild2['name'];?></a>
					<?php if($val_menuFullChild2['child'] != NULL){ ?>
					<ul>
						<?php foreach ($val_menuFullChild2['child'] as $key_menuFullChild3 => $val_menuFullChild3) {
							// $catemenuFullChild3 = $val_menuFullChild3['alias'].'/';
							// if($val_menuFullChild3['link'] != ''){
							// 	$catemenuFullChild3 = $val_menuFullChild3['link'];
							// }
						?>
							<li><a href="<?=$val_menuFullChild3['url'];?>"><?php echo $val_menuFullChild3['name'];?></a></li>
						<?php } ?>
					</ul>
					<?php } ?>
				</li>
				<?php } ?>
			</ul>
			<?php } ?>
		</li>
		<?php } ?>
	</ul>
</nav>
<?php } ?>
