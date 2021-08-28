<div class="container">
	<ul id="breadcrumb" class="breadcrumb">
		<li class="breadcrumb-item home"><a href="<?=base_url();?>" title="Trang chủ">Trang chủ</a></li>
		<li class="breadcrumb-item"><a href="<?=$aliasCate['alias']; ?>"><?=$aliasCate['name']; ?></a></li>
		<li class="breadcrumb-item active"><?=$aliasCity['name']; ?></li>
	</ul>
</div>
<div class="clear"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="wpBDSList">
				<div class="title"><span><?php echo $name;?></span></div>
				<div class="clearfix"></div>
				<?php if(isset($newsLand) && ! empty($newsLand)){ ?>
					<div class="contents">
						<div class="row">
							<?php foreach ($newsLand as $key_newsLand => $val_newsLand) {?>
								<div class="col-md-4 col-sm-4">
									<div class="item">
										<a href="<?=$val_newsLand['alias']; ?>" class="link-detail"></a>
										<?php $bg_img = NO_IMG;
										if(is_file('./'.'upload/newsLand/thumb/'.$val_newsLand['thumb'])) {
											$bg_img  = 'upload/newsLand/thumb/'.$val_newsLand['thumb'];
										} ?>
										<div class="boxImg lazy" data-src="<?=$bg_img; ?>">
											<div class="price">Giá: <strong>
												<?php if($val_newsLand['deal'] == 1) { ?>
													Thỏa thuận
												<?php } else { ?>
													<?php if($val_newsLand['unit'] == 2) { ?>
														<?=$val_newsLand['price_detail']; ?>/Tháng
													<?php } else if($val_newsLand['unit'] == 3) { ?>
														<?=$val_newsLand['price_detail']; ?>/M<sup>2</sup>
													<?php } else { ?>
														<?=$val_newsLand['price_detail']; ?>
													<?php } ?>
												<?php } ?>
											</strong></div>
											<a href="<?=$val_newsLand['infoDistrict']['alias']; ?>"><div class="distrist"><i class="fas fa-map-marker-alt"></i><?=$val_newsLand['infoDistrict']['name']; ?></div></a>
										</div>
										<div class="info">
											<h3><a href="<?=$val_newsLand['alias']; ?>" title="<?=$val_newsLand['name']; ?>"><?=$val_newsLand['name']; ?></a></h3>
											<div class="row">
												<div class="col-md-8">
													<div class="cate">
														<a href="<?=$val_newsLand['infoCate']['alias']; ?>"><i class="fas fa-home"></i><?=$val_newsLand['infoCate']['name']; ?></a>
													</div>
												</div>
												<div class="col-md-4">
													<div class="acreage">
														<i class="fas fa-ruler-combined"></i><?=$val_newsLand['area']; ?>m<sup>2</sup>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 col-xs-6">
													<div class="timeup">
														<i class="fas fa-calendar-alt"></i><?=date('d/m/Y',strtotime($val_newsLand['created_at'])); ?>
													</div>
												</div>
												<div class="col-md-6 col-xs-6">
													<a href="<?=$val_newsLand['alias']; ?>" title="<?=$val_newsLand['name']; ?>" class="viewDetail">Chi tiết <i class="fas fa-chevron-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php if(($key_newsLand + 1) % 3 == 0) { ?><div class="clear hidden-xs"></div><?php } ?>
								<?php if(($key_newsLand + 1) % 2 == 0) { ?><div class="clear hidden-lg hidden-md hidden-sm hidden-xs"></div><?php } ?>
							<?php } ?>
						</div>
						<div class="clear"></div>
						<div class="pt_phantrang"><?php echo isset($list_pagination)?$list_pagination:''; ?></div>
					</div>
				<?php } else { ?>
					<p>Không có kết quả nào thỏa mãn yêu cầu của bạn.</p>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="col-md-3 hidden-sm">
			<?php $this->load->view('frontend/cateAtCity/sidebar'); ?>
		</div>
		<link rel="stylesheet" type="text/css" href="public/css/bds.css">
	</div>
</div>