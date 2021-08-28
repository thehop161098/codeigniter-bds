<div class="cateNotHome">
	<?php if(isset($data_index['menu_left']) && $data_index['menu_left'] != NULL){ ?>
	<ul class="cateProduct">
		<?php foreach ($data_index['menu_left'] as $key_menuLeft => $val_menuLeft) { ?>
			<li><a href="<?php echo $val_menuLeft['alias'];?>.html"><i class="fas fa-sign-in-alt"></i> <?php echo $val_menuLeft['name'];?></a>
				<?php if($val_menuLeft['child'] != NULL){ ?>
				<div class="boxCateChild2">
					<ul>
						<?php foreach ($val_menuLeft['child'] as $key_menuLeftChild2 => $val_menuLeftChild2) { ?>
							<li class="col-md-4"><a href="<?php echo $val_menuLeftChild2['alias'];?>.html"><?php echo $val_menuLeftChild2['name'];?></a>
							<?php if($val_menuLeftChild2['child'] != NULL){ ?>
								<ul>
									<?php foreach ($val_menuLeftChild2['child'] as $key_menuLeftChild3 => $val_menuLeftChild3) { ?>
										<li><a href="<?php echo $val_menuLeftChild3['alias'];?>.html"><i class="fas fa-angle-right"></i> <?php echo $val_menuLeftChild3['name'];?></a></li>
									<?php } ?>
								</ul>
							<?php } ?>
							</li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
			</li>
		<?php } ?>
	</ul>
	<?php } ?>
</div>