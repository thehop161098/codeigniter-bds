<?php if(isset($data_index['news_right']) && ! empty($data_index['news_right'])) { ?>
	<?php foreach ($data_index['news_right'] as $key_newsRight => $val_newsRight) { ?>
		<div class="newPost">
			<div class="title"><span><?=$val_newsRight['name']; ?></span></div>
			<div class="clear"></div>
			<div class="contents clearfix">
				<?php foreach ($val_newsRight['child'] as $key_newsRightChild => $val_newsRightChild) { ?>
					<div class="item clearfix">
						<a href="<?=$val_newsRightChild['alias']; ?>" title="<?=$val_newsRightChild['name']; ?>">
							<div class="boxImg lazy" data-src="upload/news/thumb/<?=$val_newsRightChild['thumb']; ?>"></div>
							<h4><?=$val_newsRightChild['name']; ?></h4>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
<?php } ?>
