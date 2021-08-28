<?php if($data_index['logo'] != NULL){
	if($data_index['logo']['link'] == ''){
		$data_index['logo']['link'] = base_url();
	}
	?>
	<div class="boxLogo">
		<a href="<?=$data_index['logo']['link']?>">
			<img src="upload/logo/thumb/<?=$data_index['logo']['thumb'];?>">
		</a>
	</div>
<?php } ?>
