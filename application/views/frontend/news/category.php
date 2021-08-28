<div class="clear"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="wpNews">
				<h1 class="title"><span><?=$name; ?></span></h1>
				<div class="clearfix"></div>
				<div class="box-cate-content">
					<?=$content; ?>
				</div>
				<?php if(isset($news) && ! empty($news)){ ?>
					<div class="contents">
						<div class="row">
							<?php foreach ($news as $key_news => $val_news) {?>
								<div class="col-md-4 col-sm-4">
									<div class="item">
										<a href="<?=$val_news['alias']; ?>" title="<?=$val_news['name']; ?>">
											<div class="boxImg lazy" data-src="upload/news/thumb/<?=$val_news['thumb']; ?>"></div>
										</a>
										<div class="info">
											<h3><a href="<?=$val_news['alias']; ?>" title="<?=$val_news['name']; ?>"><?=$val_news['name']; ?></a></h3>
											<div class="des"><?=character_limiter($val_news['des'],95); ?></div>
										</div>
									</div>
								</div>
								<?php if(($key_news + 1) % 3 == 0) { ?><div class="clear hidden-sm hidden-xs"></div><?php } ?>
								<?php if(($key_news + 1) % 2 == 0) { ?><div class="clear hidden-lg hidden-md hidden-sm"></div><?php } ?>
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
			<?php $this->load->view('frontend/news/sidebar'); ?>
		</div>
		<link rel="stylesheet" type="text/css" href="public/css/news.css">
	</div>
</div>