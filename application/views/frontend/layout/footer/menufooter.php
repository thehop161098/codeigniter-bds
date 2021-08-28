<?php if(isset($data_index['menu_footer']) && ! empty($data_index['menu_footer'])) { ?>
	<?php foreach ($data_index['menu_footer'] as $key_menufooter => $val_menufooter) { ?>
		<div class="col-md-4 col-sm-4">
			<div class="menuFooter">
				<div class="title"><?=$val_menufooter['name']; ?></div>
				<?php if(! empty($val_menufooter['child'])) { ?>
					<ul>
						<?php foreach ($val_menufooter['child'] as $key_menuChild => $val_menuChild) { ?>
							<li><a href="<?=$val_menuChild['url']; ?>"><?=$val_menuChild['name']; ?></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
<?php } ?>