<div class="clear"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<?php $this->load->view('frontend/project/boxSearch'); ?>
			<div class="wpProjectDetail">
				<?php if(isset($project) && ! empty($project)){ ?>
					<div class="box">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="boxImg">
									<img class="lazy" data-src="upload/project/<?=$project['image']; ?>" alt="<?=$project['name']; ?>">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="info">
									<h1><?=$project['name']; ?></h1>
									<div class="item"><span>Địa chỉ:</span><?=$project['dia_chi']; ?></div>
									<div class="item"><span>Điện thoại:</span>
										<?php if($project['phone'] != '') { ?>
											<?=$project['phone']; ?>
										<?php } else { ?>
											Đang cập nhật
										<?php } ?>
									</div>
									<div class="item"><span>Website:</span>
										<?php if($project['website'] != '') { ?>
											<?=$project['website']; ?>
										<?php } else { ?>
											Đang cập nhật
										<?php } ?>
									</div>
									<div class="item"><span>Email:</span>
										<?php if($project['email'] != '') { ?>
											<?=$project['email']; ?>
										<?php } else { ?>
											Đang cập nhật
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="contents">
							<div class="title"><i class="fas fa-map-marker-alt"></i> Bản đồ</div>
							<?php if($project['map_lat'] != '' && $project['map_long'] != '') { ?>
								<iframe src="https://maps.google.com/maps?q=<?=$project['map_lat'];?>, <?=$project['map_long'];?>&z=15&output=embed" width="500" height="300" frameborder="0" style="border:0"></iframe>
							<?php } ?>
							<div class="clearfix"></div>
							<div class="title">Tổng quan</div>
							<div class="clearfix"></div>
							<?=$project['content']; ?>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="col-md-3 hidden-sm">
			<?php $this->load->view('frontend/project/sidebar'); ?>
		</div>
		<link rel="stylesheet" type="text/css" href="public/css/project.css">
	</div>
</div>