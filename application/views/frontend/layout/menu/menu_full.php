<div class="container hidden-xs">
	<div class="row">
		<div class="col-md-3">
			<div id="titleCate" class="title <?php if($data_index['crt'] != 'home'){ ?> loadCate <?php } ?>">CATEGORIES
				<?php $this->load->view('frontend/layout/menu/cateProduct'); ?>
			</div>
		</div>
		<?php if(isset($data_index['cateMain']) && $data_index['cateMain'] != NULL){ ?>
		<div class="col-md-9">
			<div class="menuMain">
				<ul>
					<?php foreach ($data_index['cateMain'] as $key_cateMain => $val_cateMain) { ?>
						<li><a href="<?php echo $val_cateMain['alias'];?>.html"><?php echo $val_cateMain['name'];?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php $this->load->view('frontend/layout/menu/menu_mobi'); ?>
