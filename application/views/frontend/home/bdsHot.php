<?php if(isset($bdsHot) && ! empty($bdsHot)) { ?>
	<div class="wpBDSVip">
		<div class="title"><span>Nhà đất bán - tin VIP</span></div>
		<div class="clearfix"></div>
		<div class="contents">
			<div class="bdsVipSlick">
				<?php foreach ($bdsHot as $key_bdsHot => $val_bdsHot) { ?>
					<div class="item">
						<div class="box">
							<a href="<?=$val_bdsHot['alias']; ?>" class="link-detail"></a>
							<?php $bg_img = NO_IMG;
							if(is_file('./'.'upload/newsLand/thumb/'.$val_bdsHot['thumb'])) {
								$bg_img  = 'upload/newsLand/thumb/'.$val_bdsHot['thumb'];
							} ?>
							<div class="boxImg" style="background-image: url('<?=$bg_img; ?>');">
								<div class="price">Giá: <strong>
									<?php if($val_bdsHot['deal'] == 1) { ?>
										Thỏa thuận
									<?php } else { ?>
										<?php if($val_bdsHot['unit'] == 2) { ?>
											<?=$val_bdsHot['price_detail']; ?>/Tháng
										<?php } else if($val_bdsHot['unit'] == 3) { ?>
											<?=$val_bdsHot['price_detail']; ?>/M<sup>2</sup>
										<?php } else { ?>
											<?=$val_bdsHot['price_detail']; ?>
										<?php } ?>
									<?php } ?>
									</strong></div>
								<a href="<?=$val_bdsHot['infoDistrict']['alias']; ?>"><div class="distrist"><i class="fas fa-map-marker-alt"></i><?=$val_bdsHot['infoDistrict']['name']; ?></div></a>
							</div>
							<div class="info">
								<h3><a href="<?=$val_bdsHot['alias']; ?>" title="<?=$val_bdsHot['name']; ?>"><?=$val_bdsHot['name']; ?></a></h3>
								<div class="row">
									<div class="col-md-8">
										<div class="cate">
											<a href="<?=$val_bdsHot['infoCate']['alias']; ?>"><i class="fas fa-home"></i><?=$val_bdsHot['infoCate']['name']; ?></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="acreage">
											<i class="fas fa-ruler-combined"></i><?=$val_bdsHot['area']; ?>m<sup>2</sup>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="timeup">
											<i class="fas fa-calendar-alt"></i><?=date('d/m/Y',strtotime($val_bdsHot['created_at'])); ?>
										</div>
									</div>
									<div class="col-md-6">
										<a href="<?=$val_bdsHot['alias']; ?>" title="<?=$val_bdsHot['name']; ?>" class="viewDetail">Chi tiết <i class="fas fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>