<?php if(isset($newsLandSame) && $newsLandSame != NULL){ ?>
	<div class="wpBDSList">
		<div class="title"><span>Tin bất động sản khác</span></div>
		<div class="clearfix"></div>
		<div class="contents">
			<div class="row">
				<?php foreach ($newsLandSame as $key_newsLandSame => $val_newsLandSame) { ?>
					<div class="col-md-4 col-sm-4">
						<div class="item">
							<a href="<?=$val_newsLandSame['alias']; ?>" class="link-detail"></a>
							<?php $bg_img = NO_IMG;
							if(is_file('./'.'upload/newsLand/thumb/'.$val_newsLandSame['thumb'])) {
								$bg_img  = 'upload/newsLand/thumb/'.$val_newsLandSame['thumb'];
							} ?>
							<div class="boxImg lazy" data-src="<?=$bg_img; ?>">
								<div class="price">Giá: <strong>
									<?php if($val_newsLandSame['deal'] == 1) { ?>
										Thỏa thuận
									<?php } else { ?>
										<?php if($val_newsLandSame['unit'] == 2) { ?>
											<?=$val_newsLandSame['price_detail']; ?>/Tháng
										<?php } else if($val_newsLandSame['unit'] == 3) { ?>
											<?=$val_newsLandSame['price_detail']; ?>/M<sup>2</sup>
										<?php } else { ?>
											<?=$val_newsLandSame['price_detail']; ?>
										<?php } ?>
									<?php } ?>
								</strong></div>
								<a href="<?=$val_newsLandSame['infoDistrict']['alias']; ?>"><div class="distrist"><i class="fas fa-map-marker-alt"></i><?=$val_newsLandSame['infoDistrict']['name']; ?></div></a>
							</div>
							<div class="info">
								<h3><a href="<?=$val_newsLandSame['alias']; ?>" title="<?=$val_newsLandSame['name']; ?>"><?=$val_newsLandSame['name']; ?></a></h3>
								<div class="row">
									<div class="col-md-8">
										<div class="cate">
											<a href="<?=$val_newsLandSame['infoCate']['alias']; ?>"><i class="fas fa-home"></i><?=$val_newsLandSame['infoCate']['name']; ?></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="acreage">
											<i class="fas fa-ruler-combined"></i><?=$val_newsLandSame['area']; ?>m<sup>2</sup>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-xs-6">
										<div class="timeup">
											<i class="fas fa-calendar-alt"></i><?=date('d/m/Y',strtotime($val_newsLandSame['created_at'])); ?>
										</div>
									</div>
									<div class="col-md-6 col-xs-6">
										<a href="<?=$val_newsLandSame['alias']; ?>" title="<?=$val_newsLandSame['name']; ?>" class="viewDetail">Chi tiết <i class="fas fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if(($key_newsLandSame + 1) % 3 == 0) { ?><div class="clear hidden-xs"></div><?php } ?>
					<?php if(($key_newsLandSame + 1) % 2 == 0) { ?><div class="clear hidden-lg hidden-md hidden-xs hidden-sm"></div><?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>