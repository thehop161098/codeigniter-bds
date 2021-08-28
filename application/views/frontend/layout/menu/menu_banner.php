<div class="menuBanner hidden-xs">
	<ul>
		<?php foreach ($data_index['cateMain'] as $key_cateMain => $val_cateMain) {
			$cateMainUrl = $val_cateMain['alias'].'/';
			if($val_cateMain['link'] != ''){
				$cateMainUrl = $val_cateMain['link'];
			}
		?>
			<li><a href="<?php echo $cateMainUrl;?>"><?php echo $val_cateMain['name'];?></a>
				<?php if($val_cateMain['child'] != NULL){ ?>
					<ul>
						<?php foreach ($val_cateMain['child'] as $key_cateChild => $val_cateChild) { 
							$cateChildUrl = $val_cateChild['alias'].'/';
							if($val_cateChild['link'] != ''){
								$cateChildUrl = $val_cateChild['link'];
							}
						?>
							<li><a href="<?php echo $cateChildUrl;?>"><?php echo $val_cateChild['name'];?></a>
								<?php if($val_cateChild['child'] != NULL){ ?>
									<ul>
										<?php foreach ($val_cateChild['child'] as $key_cateChild2 => $val_cateChild2) { 
											$cateChildUrl2 = $val_cateChild2['alias'].'/';
											if($val_cateChild2['link'] != ''){
												$cateChildUrl2 = $val_cateChild2['link'];
											}
										?>
											<li><a href="<?php echo $cateChildUrl2;?>"><?php echo $val_cateChild2['name'];?></a>
												
											</li>
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
</div>	

