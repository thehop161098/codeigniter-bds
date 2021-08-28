<?php if(isset($data_index['menuCity']) && ! empty($data_index['menuCity'])) { ?>
	<div class="catePro">
		<div class="title"><span>Tỉnh/thành</span></div>
		<div class="contents">
			<ul>
				<?php foreach ($data_index['menuCity'] as $key_menuCity => $val_menuCity) { ?>
					<li><a href="<?=$val_menuCity['alias']; ?>"><i class="fas fa-chevron-right"></i><?=$val_menuCity['name']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php } ?>