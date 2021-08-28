<div class="clear"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<?php $this->load->view('frontend/project/boxSearch'); ?>
			<div class="wpProjectList">
				<div class="title"><span><?php echo $name;?></span></div>
				<div class="clearfix"></div>
				<?php if(isset($project) && ! empty($project)){ ?>
					<div class="contents">
						<div class="row">
							<?php foreach ($project as $key_project => $val_project) {?>
								<div class="col-md-4 col-xs-12">
									<?php $bg_img = NO_IMG;
									if(is_file('./'.'upload/project/thumb/'.$val_project['thumb'])) {
										$bg_img  = 'upload/project/thumb/'.$val_project['thumb'];
									} ?>
									<div class="item">
										<a href="<?=$val_project['alias']?>" title="<?=$val_project['name']?>">
											<div class="boxImg lazy" data-src="<?=$bg_img; ?>"></div>
										</a>
										<div class="info">
											<h3><a href="<?=$val_project['alias']?>" title="<?=$val_project['name']?>"><?=$val_project['name']?></a></h3>
											<div class="address"><span>Địa chỉ:</span> <?=$val_project['dia_chi']?></div>
										</div>
									</div>
								</div>
								<?php if(($key_project + 1) % 3 == 0) { ?><div class="clear hidden-sm hidden-xs"></div><?php } ?>
								<?php if(($key_project + 1) % 2 == 0) { ?><div class="clear hidden-lg hidden-md"></div><?php } ?>
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
			<?php $this->load->view('frontend/project/sidebar'); ?>
		</div>
		<link rel="stylesheet" type="text/css" href="public/css/project.css">
	</div>
</div>
