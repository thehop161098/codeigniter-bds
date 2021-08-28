<?php if(isset($bdsHome) && ! empty($bdsHome)) { ?>
	<?php foreach ($bdsHome as $key_bdsHome => $val_bdsHome) { ?>
		<div class="wpBDS">
			<div class="title clearfix"><h2><?=$val_bdsHome['name']?></h2><a href="<?=$val_bdsHome['alias']?>" title="<?=$val_bdsHome['name']?>">Xem thêm</a></div>
			<div class="clearfix"></div>
			<div class="contents">
				<?php if(! empty($val_bdsHome['child'])) { ?>
					<?php foreach ($val_bdsHome['child'] as $key_child => $val_child) { ?>
						<div class="item clearfix">
							<div class="row">
								<div class="col-md-3 col-sm-3">
									<?php $bg_img = NO_IMG;
									if(is_file('./'.'upload/newsLand/thumb/'.$val_child['thumb'])) {
										$bg_img  = 'upload/newsLand/thumb/'.$val_child['thumb'];
									} ?>
									<a href="<?=$val_child['alias']; ?>"><div class="boxImg lazy" data-src="<?=$bg_img; ?>"></div></a>
								</div>
								<div class="col-md-6 col-sm-6"><div class="row paddMobi">
									<div class="box">
										<h3><a href="<?=$val_child['alias']; ?>"><?=$val_child['name']; ?></a></h3>
										<div class="row">
											<div class="col-md-7 col-sm-7">
												<div class="cate">
													<a href="<?=$val_child['infoCate']['alias']; ?>"><i class="fas fa-home"></i><?=$val_child['infoCate']['name']; ?></a>
												</div>
												<div class="distrist"><i class="fas fa-map-marker-alt"></i><?=$val_child['infoDistrict']['name']; ?></div>
											</div>
											<div class="col-md-5 col-sm-5">
												<div class="acreage">
													<i class="fas fa-ruler-combined"></i><?=$val_child['area']; ?>m<sup>2</sup>
												</div>
												<div class="timeup">
													<i class="fas fa-calendar-alt"></i><?=date('d/m/Y',strtotime($val_child['created_at'])); ?>
												</div>
											</div>
										</div>
									</div>
								</div></div>
							</div>
							<div class="price">Giá: <strong>
								<?php if($val_child['deal'] == 1) { ?>
									Thỏa thuận
								<?php } else { ?>
									<?php if($val_child['unit'] == 2) { ?>
										<?=$val_child['price_detail']; ?>/Tháng
									<?php } else if($val_child['unit'] == 3) { ?>
										<?=$val_child['price_detail']; ?>/M<sup>2</sup>
									<?php } else { ?>
										<?=$val_child['price_detail']; ?>
									<?php } ?>
								<?php } ?>
							</strong></div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
<?php } ?>