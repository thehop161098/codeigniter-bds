<?php if($data_index['crt'] != 'home'){ ?>
	<?php if(isset($data_index['breadcrumb']['name']) && ! empty($data_index['breadcrumb']['name']) ){?>
		<div class="container">
			<ul id="breadcrumb" class="breadcrumb">
				<li class="breadcrumb-item home"><a href="<?php base_url();?>" title="Trang chủ">Trang chủ</a></li>
				<?php if($data_index['breadcrumb']['dataCate']['cate_name3'] != ''){ ?>
					<li class="breadcrumb-item"><a href="<?php base_url();?><?php echo $data_index['breadcrumb']['dataCate']['cate_alias3'];?>/"><?php echo $data_index['breadcrumb']['dataCate']['cate_name3'];?></a></li>
				<?php } ?>
				<?php if($data_index['breadcrumb']['dataCate']['cate_name2'] != ''){ ?>
					<li class="breadcrumb-item"><a href="<?php base_url();?><?php echo $data_index['breadcrumb']['dataCate']['cate_alias2'];?>/"><?php echo $data_index['breadcrumb']['dataCate']['cate_name2'];?></a></li>
				<?php } ?>
				<?php if($data_index['breadcrumb']['dataCate']['cate_name1'] != ''){ ?>
					<li class="breadcrumb-item"><a href="<?php base_url();?><?php echo $data_index['breadcrumb']['dataCate']['cate_alias1'];?>/"><?php echo $data_index['breadcrumb']['dataCate']['cate_name1'];?></a></li>
				<?php } ?>
				<?php if($data_index['breadcrumb']['cate_name'] != ''){ ?>
					<li class="breadcrumb-item"><a href="<?php base_url();?><?php echo $data_index['breadcrumb']['cate_alias'];?>/"><?php echo $data_index['breadcrumb']['cate_name'];?></a></li>
				<?php } ?>
				<li class="breadcrumb-item active"><?php echo $data_index['breadcrumb']['name'];?></li>
			</ul>
		</div>
	<?php } ?>
<?php } ?>