<?php if(isset($data_index['bannerSide']) && ! empty($data_index['bannerSide'])) { ?>
	<div class="ads">
		<?php foreach ($data_index['bannerSide'] as $key_bannerSide => $val_bannerSide) {
			$link_banner = $val_bannerSide['link'] != '' ? $val_bannerSide['link'] : 'javascript:void(0)';
		?>
			<a href="<?=$link_banner; ?>" title="<?=$val_bannerSide['name']; ?>"><img class="lazy" data-src="upload/banner/thumb/<?=$val_bannerSide['thumb']; ?>" alt="<?=$val_bannerSide['name']; ?>"></a>
		<?php } ?>
	</div>
<?php } ?>