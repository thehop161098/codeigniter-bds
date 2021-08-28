<div class="container">
	<div class="row">
		<div class="col-md-9 f_right">
			<div style="" class="clearfix">
				<div class="box-cate">
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="col-md-12" style="padding: 0px;">
					<div class="boxCate">
						<div class="title-category"><?= $title?></div>
					</div>
					<?php if(isset($news) && $news != NULL) { ?>
						<?php foreach ($news as $key_3 => $val_3) { ?>
							<div class="col-md-4 col-sm-6" style="padding-left: 0px;">
								<div class="itemCateNews clearfix">
									<div class="box_ImgNews">
										<a href="<?= $val_3['alias'] ?>" title="<?= $val_3['title'] ?>">
											<div class="boxImg lazy" data-src="upload/news/thumb/<?= $val_3['thumb'] ?>"></div>
											<h3><?=$val_3['name']; ?></h3>
										</a>
										<div class="des text-justify"><?= character_limiter($val_3['des'],110); ?></div>
										<div class="datenews">
											<span class="author vcard">
												<i class="fa fa-calendar-o"></i>
												<?= date('d/m/Y', strtotime($val_3['created_at'])); ?>
											</span>
										</div>
										<a class="readmore" href="<?= $val_3['alias'] ?>">
											Đọc tiếp
										</a>
									</div>
								</div>
							</div>
							<?php if(($key_3 + 1) % 3==0){?><div class="clear hidden-sm hidden-xs"></div><?php } ?>
							<?php if(($key_3 + 1) % 2==0){?><div class="clear hidden-lg hidden-md hidden-xs"></div><?php } ?>
						<?php } ?>
						<div class="clear"></div>
						<div class="pt_phantrang"><?php echo isset($list_pagination)?$list_pagination:''; ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="clear hidden-lg"></div>
		<div class="col-md-3">
			<div class="PaddingTop25">
				<?php $this->load->view('frontend/news/sidebar'); ?>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="public/css/news.css">
