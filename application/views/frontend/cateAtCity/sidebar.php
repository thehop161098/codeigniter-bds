<div class="sidebar">
	<div class="row">
		<div class="col-md-12 col-sm-6 col-xs-12">
			<div class="searchSidebar">
				<div class="title"><span><i class="fas fa-search mr-2"></i> Tìm nhiều hơn</span></div>
				<div class="clear"></div>
				<form role="search" method="GET" action="tim-kiem-bds.html">
					<div class="contents clearfix">
						<div class="choose-cate clearfix">
							<?php if(isset($category) && ! empty($category)) { ?>
								<?php foreach ($category as $key_category => $val_category) {
									$classActiveCate = $key_category == 0 ? 'active' : '';
								?>
									<a id="selectCate<?=$val_category['id']; ?>" href="javascript:void(0)" onclick="chooseTypeBDS(<?=$val_category['id']; ?>),selectGround(<?=$val_category['id']; ?>)" class="chooseType chooseType<?=$val_category['id']; ?> <?=$classActiveCate;?>"><?=$val_category['name']; ?></a>
								<?php } ?>
							<?php } ?>
						</div>
						<?php
							if(empty($_GET['cate_parent'])){
								$value_cateParent = $category[0]['id'];
							} else {
								$value_cateParent = $_GET['cate_parent'];
							}
						?>
						<input type="hidden" id="type" name="cate_parent" value="<?=$value_cateParent;?>">
						<div class="box-sel">
							<div class="item-sel">
								<select name="cateid" id="cateid">
									<?php if(isset($cateChild) && ! empty($cateChild)) { ?>
										<option value="">Chọn loại nhà đất</option>
										<?php foreach ($cateChild as $key_cateChild => $val_cateChild) {
											$selected_cateid = isset($_GET['cateid']) && $_GET['cateid'] == $val_cateChild['id'] ? 'selected' : '';
										?>
											<option <?=$selected_cateid;?> value="<?=$val_cateChild['id']?>"><?=$val_cateChild['name'] ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
							<div class="item-sel">
								<select name="city_id" id="city_id">
									<?php if(isset($city) && ! empty($city)) { ?>
										<option value="">Chọn Tỉnh/thành</option>
										<?php foreach ($city as $key_city => $val_city) {
											$selected_city = isset($_GET['city_id']) && $_GET['city_id'] == $val_city['id'] ? 'selected' : '';
										?>
											<option <?=$selected_city; ?> value="<?=$val_city['id']?>"><?=$val_city['name'] ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
							<div class="item-sel">
								<select name="district_id" id="district_id">
									<?php if(isset($district) && ! empty($district)) { ?>
										<option value="">Chọn Quận/Huyện</option>
										<?php foreach ($district as $key_district => $val_district) {
											$selected_district = isset($_GET['district_id']) && $_GET['district_id'] == $val_district['id'] ? 'selected' : '';
										?>
											<option <?=$selected_district;?> value="<?=$val_district['id']?>"><?=$val_district['name'] ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
							<div class="item-sel">
								<select name="ward_id" id="ward_id">
									<?php if(isset($ward) && ! empty($ward)) { ?>
										<option value="">Chọn Quận/Huyện</option>
										<?php foreach ($ward as $key_ward => $val_ward) {
											$selected_ward = isset($_GET['ward_id']) && $_GET['ward_id'] == $val_ward['id'] ? 'selected' : '';
										?>
											<option <?=$selected_ward;?> value="<?=$val_ward['id']?>"><?=$val_ward['name'] ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
							<div class="item-sel">
								<select name="direction_id" id="direction_id">
									<?php if(isset($direction) && ! empty($direction)) { ?>
										<option value="">Chọn hướng nhà</option>
										<?php foreach ($direction as $key_direction => $val_direction) {
											$selected_direction = isset($_GET['direction_id']) && $_GET['direction_id'] == $val_direction['id'] ? 'selected' : '';
										?>
											<option <?=$selected_direction;?> value="<?=$val_direction['id']?>"><?=$val_direction['name'] ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-6"><div class="row">
								<div class="item-sel left">
									<select name="price_min" id="price_min">
										<?php if(isset($searchPrice) && ! empty($searchPrice)) { ?>
											<option value="">Giá thấp nhất</option>
											<?php foreach ($searchPrice as $key_searchPrice => $val_searchPrice) {
												$selected_pricemin = isset($_GET['price_min']) && $_GET['price_min'] == $val_searchPrice['price'] ? 'selected' : '';
											?>
												<option <?=$selected_pricemin;?> value="<?=$val_searchPrice['price']?>"><?=$val_searchPrice['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div></div>
							<div class="col-md-6"><div class="row">
								<div class="item-sel right">
									<select name="price_max" id="price_max">
										<?php if(isset($searchPrice) && ! empty($searchPrice)) { ?>
											<option value="">Giá cao nhất</option>
											<?php foreach ($searchPrice as $key_searchPrice => $val_searchPrice) {
												$selected_pricemax = isset($_GET['price_max']) && $_GET['price_max'] == $val_searchPrice['price'] ? 'selected' : '';
											?>
												<option <?=$selected_pricemax; ?> value="<?=$val_searchPrice['price']?>"><?=$val_searchPrice['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div></div>
						</div>
						<button type="submit">Tìm kiếm</button>
					</div>
				</form>
			</div>
			<div class="clear"></div>
		</div>
		<div class="col-md-12 col-sm-6 col-xs-12">
			<?php if(isset($district) && ! empty($district)) { ?>
				<div class="catePro">
					<div class="title"><span>Quận/Huyện</span></div>
					<div class="contents">
						<ul>
							<?php foreach ($district as $key_district => $val_district) { ?>
								<li><a href="<?=$val_district['alias']; ?>"><i class="fas fa-chevron-right"></i><?=$val_district['name']; ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="col-md-12 col-sm-6 col-xs-12">
			<?php $this->load->view('frontend/layout/sidebar/banner'); ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	//select loại đất
	function selectGround(id)
	{
		jQuery.ajax({
			url: '<?= base_url().'Home/groundCateID' ?>',
			type: 'POST',
			data: {cateParentID: id},
			success: function(data) {
				$('#cateid').html(data);
			},
		});
	}
	//////
    $(document).ready(function() {
    	var vars = {};
    	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    		vars[key] = value;
    	});
    	let idCate = $('#type').val();
    	if(! vars['cate_parent'] && ! vars['cateid']){
    		$("#selectCate"+idCate).trigger("click");
    	}else {
    		$('.chooseType').removeClass('active');
    		$("#selectCate"+idCate).addClass("active");
    	}
        //Select Quận/Huyện
        $('#city_id').change(function(event){
            var cityID = $('#city_id').val();
            jQuery.ajax({
                url: '<?= base_url().'Home/district' ?>',
                type: 'POST',
                data: {cityID: cityID},
                success: function(data) {
                    $('#district_id').html(data);
                    $('#ward_id').html('<option value="">---Phường/Xã---</option>');
                },
            });
        });
        if(! vars['city_id']){
    		$("#city_id").trigger("change");
    	}
        //Select Phường/Xã
        $('#district_id').change(function(event){
            var districtID = $('#district_id').val();
            jQuery.ajax({
                url: '<?= base_url().'Home/ward' ?>',
                type: 'POST',
                data: {districtID: districtID},
                success: function(data) {
                    $('#ward_id').html(data);
                },
            });
        });
        if(! vars['district_id']){
    		$("#district_id").trigger("change");
    	}
    });
</script>