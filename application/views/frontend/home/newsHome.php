<?php if(isset($newsHome) && ! empty($newsHome)) { ?>
	<div class="newsHome">
		<div class="title"><span>Tin bất động sản</span></div>
		<div class="clearfix"></div>
		<div class="contents">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="itemOne">
						<a href="<?=$newsHome[0]['alias']; ?>" title="<?=$newsHome[0]['name']; ?>">
							<div class="boxImg lazy" data-src="upload/news/thumb/<?=$newsHome[0]['thumb']; ?>"></div>
							<h4><?=$newsHome[0]['name']; ?></h4>
						</a>
						<div class="des"><?=character_limiter($newsHome[0]['des'],220); ?></div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<?php foreach ($newsHome as $key_newsHome => $val_newsHome) {
						if($key_newsHome == 0){continue;}
					?>
						<div class="item">
							<a href="<?=$val_newsHome['alias']; ?>" title="<?=$val_newsHome['name']; ?>">
								<div class="boxImg lazy" data-src="upload/news/thumb/<?=$val_newsHome['thumb']; ?>"></div>
								<h4><?=$val_newsHome['name']; ?></h4>
							</a>
							<div class="des"><?=character_limiter($val_newsHome['des'],60); ?></div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>