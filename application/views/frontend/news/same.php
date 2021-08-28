<?php if(isset($newsSame) && ! empty($newsSame)) { ?>
	<div class="wpNews wpNewsSame">
		<h1 class="title"><span>Có thể bạn quan tâm</span></h1>
		<div class="clearfix"></div>
		<div class="contents">
			<div class="row">
				<?php foreach ($newsSame as $key_newsSame => $val_newsSame) { ?>
					<div class="col-md-3 col-sm-4 col-xs-6">
						<div class="item">
							<a href="<?=$val_newsSame['alias']; ?>" title="<?=$val_newsSame['name']; ?>">
								<div class="boxImg lazy" data-src="upload/news/thumb/<?=$val_newsSame['thumb']; ?>"></div>
							</a>
							<div class="info">
								<h3><a href="<?=$val_newsSame['alias']; ?>" title="<?=$val_newsSame['name']; ?>"><?=$val_newsSame['name']; ?></a></h3>
							</div>
						</div>
					</div>
					<?php if(($key_newsSame + 1) % 4 == 0) { ?><div class="clear hidden-sm hidden-xs"></div><?php } ?>
					<?php if(($key_newsSame + 1) % 3 == 0) { ?><div class="clear hidden-lg hidden-md hidden-xs"></div><?php } ?>
					<?php if(($key_newsSame + 1) % 2 == 0) { ?><div class="clear hidden-lg hidden-md hidden-sm"></div><?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>