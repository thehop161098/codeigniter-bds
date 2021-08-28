<?php if(isset($slide) && ! empty($slide)) { ?>
	<div class="slider">
		<div class="slideSlick">
			<?php foreach ($slide as $key_slide => $val_slide) {
				$link_slide = $val_slide['link'] != '' ? $val_slide['link'] : 'javascript:void(0)';
			?>
				<div class="item">
					<a href="<?=$link_slide; ?>"><img src="upload/slide/thumb/<?=$val_slide['thumb']; ?>" alt="<?=$val_slide['name']; ?>"> </a>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>