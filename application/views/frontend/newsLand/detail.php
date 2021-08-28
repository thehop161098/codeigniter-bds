<div class="clear"></div>
<div class="container">
	<div class="row">
		<?php if(isset($newsLand) && ! empty($newsLand)){ ?>
			<div class="col-md-9">
				<div class="bdsDetail">
					<?php $this->load->view('frontend/newsLand/share'); ?>
					<div class="boxInfo">
						<h1 class="title"><?=$newsLand['name']; ?></h1>
						<div class="boxTabs">
							<div class="tab-content">
								<div id="photo" class="tab-pane fade in active">
									<div class="boxPhoto">
										<div class="photoOneSlick">
											<?php if($newsLand['image'] != '') { ?>
												<div class="item">
													<img src="upload/newsLand/<?=$newsLand['image']; ?>" alt="<?=$newsLand['name']; ?>">
												</div>
											<?php } ?>
											<?php if(isset($newsLandPhoto) && ! empty($newsLandPhoto)){ ?>
												<?php foreach ($newsLandPhoto as $key_newsLandPhoto => $val_newsLandPhoto) { ?>
													<div class="item">
														<img src="upload/newsLand/detail/<?=$val_newsLandPhoto['image'];?>" alt="">
													</div>
												<?php } ?>
											<?php } ?>
										</div>
										<div class="photoSlick">
											<?php if($newsLand['thumb'] != '') { ?>
												<div class="boxImg" style="background-image: url('upload/newsLand/thumb/<?=$newsLand['thumb']; ?>');"></div>
											<?php } ?>
											<?php if(isset($newsLandPhoto) && ! empty($newsLandPhoto)){ ?>
												<?php foreach ($newsLandPhoto as $key_newsLandPhoto => $val_newsLandPhoto) { ?>
													<div class="boxImg" style="background-image: url('upload/newsLand/detail/thumb/<?=$val_newsLandPhoto['thumb'];?>');"></div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
								</div>
								<div id="video" class="tab-pane fade">
									<?php if($newsLand['video'] != '') { ?>
										<iframe width="100%" height="500" src="https://www.youtube.com/embed/<?=$newsLand['video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<?php } ?>
								</div>
								<div id="map" class="tab-pane fade">
									<?php if($newsLand['map_lat'] != '' && $newsLand['map_long'] != '') { ?>
										<iframe src="https://maps.google.com/maps?q=<?=$newsLand['map_lat'];?>, <?=$newsLand['map_long'];?>&z=15&output=embed" width="100%" height="400" frameborder="0" style="border:0"></iframe>
									<?php } ?>
								</div>
							</div>
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#photo">Hình ảnh</a></li>
								<li><a data-toggle="tab" href="#video">Video</a></li>
								<li><a data-toggle="tab" href="#map">Bản đồ</a></li>
							</ul>
						</div>
						<div class="boxPriceCate clearfix">
							<div class="cate">
								<a href="<?=$newsLand['infoCate']['alias'];?>/tai/<?=$newsLand['infoCity']['alias'];?>">
									<?=$newsLand['infoCate']['name'];?> tại <?=$newsLand['infoCity']['name'];?>
								</a>
							</div>
							<div class="price">Giá: <strong>
								<?php if($newsLand['deal'] == 1) { ?>
									Thỏa thuận
								<?php } else { ?>
									<?php if($newsLand['unit'] == 2) { ?>
										<?=$newsLand['price_detail']; ?>/Tháng
									<?php } else if($newsLand['unit'] == 3) { ?>
										<?=$newsLand['price_detail']; ?>/M<sup>2</sup>
									<?php } else { ?>
										<?=$newsLand['price_detail']; ?>
									<?php } ?>
								<?php } ?>
							</strong></div>
						</div>
						<div class="boxContent">
							<div class="infoUser clearfix">
								<div class="avater lazy" data-src="public/images/user.jpg"></div>
								<div class="info">
									<a href="tin-bds-user/<?=$newsLand['id_user']; ?>"><div class="name"><?=$newsLand['fullname']; ?></div></a>
									<a href="tel:<?=$data_index['contact']['phone_sp_detail']; ?>" class="phone"><i class="fas fa-phone-alt"></i> <?=$data_index['contact']['phone_sp']; ?> </a>
								</div>
							</div>
							<div class="clear"></div>
							<div class="boxUtility clearfix">
								<?php if($newsLand['area'] != '') { ?>
									<div class="col-md-3 col-sm-3"><div class="row">
										<div class="item ">
											<i class="fas fa-ruler-combined"></i> Diện tích: <?=$newsLand['area']; ?>m2
										</div>
									</div></div>
								<?php } ?>
								<?php if($newsLand['direction_name'] != '') { ?>
									<div class="col-md-3 col-sm-3"><div class="row">
										<div class="item">
											<i class="fas fa-compass"></i> Hướng: <?=$newsLand['direction_name']; ?>
										</div>
									</div></div>
								<?php } ?>
								<?php if($newsLand['facade'] != '') { ?>
									<div class="col-md-3 col-sm-3"><div class="row">
										<div class="item">
											<i class="fas fa-arrows-alt-h"></i> Mặt tiền: <?=$newsLand['facade']; ?>m
										</div>
									</div></div>
								<?php } ?>
								<?php if($newsLand['highway'] != '') { ?>
									<div class="col-md-3 col-sm-3"><div class="row">
										<div class="item">
											<i class="fas fa-exchange-alt"></i> Lộ giới: <?=$newsLand['highway']; ?>m
										</div>
									</div></div>
								<?php } ?>
								<?php if($newsLand['number_floor'] != '') { ?>
									<div class="col-md-3 col-sm-3"><div class="row">
										<div class="item">
											<i class="fas fa-layer-group"></i> Số tầng: <?=$newsLand['number_floor']; ?>
										</div>
									</div></div>
								<?php } ?>
								<?php if($newsLand['room'] != '') { ?>
									<div class="col-md-3 col-sm-3"><div class="row">
										<div class="item">
											<i class="fas fa-bed"></i> Số phòng ngủ: <?=$newsLand['room']; ?>
										</div>
									</div></div>
								<?php } ?>
								<?php if($newsLand['toliet'] != '') { ?>
									<div class="col-md-3 col-sm-3"><div class="row">
										<div class="item">
											<i class="fas fa-toilet"></i> Số toilet: <?=$newsLand['toliet']; ?>
										</div>
									</div></div>
								<?php } ?>
								<div class="col-md-3 col-sm-3"><div class="row">
									<div class="item">
										<i class="fas fa-clock"></i> <?=date('d/m/Y',strtotime($newsLand['created_at'])); ?>
									</div>
								</div></div>
							</div>
							<div class="address"><i class="fas fa-map-marker-alt"></i> <?=$newsLand['address_name']; ?></div>
							<?=$newsLand['content']; ?>
						</div>
						<?php $this->load->view('frontend/newsLand/share'); ?>
					</div>
				</div>
				<?php $this->load->view('frontend/newsLand/newsLandSame'); ?>
				<div class="clear"></div>
			</div>
			<div class="col-md-3 hidden-sm">
				<?php $this->load->view('frontend/newsLand/sidebar'); ?>
			</div>
		<?php } ?>
		<link rel="stylesheet" type="text/css" href="public/css/bds.css">
	</div>
</div>
