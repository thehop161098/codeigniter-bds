<div class="wpProjecSearch">
	<div class="title"><span>Tìm kiếm dự án</span></div>
	<div class="clear"></div>
	<div class="box clearfix">
		<form action="tim-kiem-project.html" method="GET">
			<div class="col-md-12">
				<div class="itemInput">
					<input type="text" value="<?=isset($_GET['s_keyproject'])?$_GET['s_keyproject']:''?>" name="s_keyproject" placeholder="Nhập từ khóa để tìm kiếm...">
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="item">
					<select name="cate_projectID" id="cate_projectID">
						<?php if(isset($category_project) && ! empty($category_project)) { ?>
							<option value="">Chọn lĩnh vực</option>
							<?php foreach ($category_project as $key_cateProject => $val_cateProject) {
								$selected_cateid = isset($_GET['cate_projectID']) && $_GET['cate_projectID'] == $val_cateProject['id'] ? 'selected' : '';
								?>
								<option <?=$selected_cateid;?> value="<?=$val_cateProject['id']?>"><?=$val_cateProject['name'] ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-3 col-sm-3"><div class="row paddMobi2">
				<div class="item">
					<select name="proCity_id" id="proCity_id">
						<?php if(isset($city) && ! empty($city)) { ?>
							<option value="">Tỉnh/thành phố</option>
							<?php foreach ($city as $key_city => $val_city) {
								$selected_city = isset($_GET['proCity_id']) && $_GET['proCity_id'] == $val_city['id'] ? 'selected' : '';
								?>
								<option <?=$selected_city; ?> value="<?=$val_city['id']?>"><?=$val_city['name'] ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div></div>
			<div class="col-md-3 col-sm-3">
				<div class="item">
					<select name="proDistrict_id" id="proDistrict_id">
						<?php if(isset($district) && ! empty($district)) { ?>
							<option value="">Quận/Huyện</option>
							<?php foreach ($district as $key_district => $val_district) {
								$selected_district = isset($_GET['proDistrict_id']) && $_GET['proDistrict_id'] == $val_district['id'] ? 'selected' : '';
								?>
								<option <?=$selected_district;?> value="<?=$val_district['id']?>"><?=$val_district['name'] ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="itemBtn">
					<button type="submit">Tìm kiếm</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
    	var vars = {};
    	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    		vars[key] = value;
    	});
        //Select Quận/Huyện
        $('#proCity_id').change(function(event){
            var proCity_id = $('#proCity_id').val();
            jQuery.ajax({
                url: '<?= base_url().'Home/district' ?>',
                type: 'POST',
                data: {cityID: proCity_id},
                success: function(data) {
                    $('#proDistrict_id').html(data);
                },
            });
        });
        if(! vars['proCity_id']){
    		$("#proCity_id").trigger("change");
    	}
    });
</script>