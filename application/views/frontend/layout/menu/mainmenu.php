<?php if(isset($data_index['cateMain']) && $data_index['cateMain'] !=NULL) {
	$current_url = $this->uri->uri_string();
?>
	<div class="wp-menu clearfix hidden-xs">
		<div class="container"><div class="row">
			<div class="col-md-12">
				<ul>
					<?php foreach ($data_index['cateMain'] as $key_cateMain => $val_cateMain) {
						$classArrDown = ! empty($val_cateMain['child']) ? '<span class="arrowDown"></span>' : '';
						$icon_home = $val_cateMain['url'] == '' ? '<i class="fas fa-home"></i>' : '';
						$active = $val_cateMain['url'] == $current_url ? 'active' : '';
					?>
						<li class="<?=$active;?>"><a href="<?=$val_cateMain['url']?>"><?=$icon_home;?><?= $val_cateMain['name'];?><?=$classArrDown;?></a>
							<?php if($val_cateMain['child'] != NULL){?>
								<ul>
									<?php foreach ($val_cateMain['child'] as $key_cateChild => $val_cateChild){ ?>
										<li><a href="<?=$val_cateChild['url']?>"><?= $val_cateChild['name'];?></a></li>
									<?php } ?>
								</ul>
							<?php } ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div></div>
	</div>
<?php } ?>