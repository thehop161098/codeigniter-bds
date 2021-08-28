<link rel="stylesheet" type="text/css" href="public/css/auth.css">
<link rel="stylesheet" href="public/plugins/bower_components/dropify/dist/css/dropify.min.css">
<!-- Ckeditor -->
<script type="text/javascript" language="javascript" src="vendors/ckeditor/ckeditor.js" ></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=<?=$data_index['contact']['key_map']; ?>"></script>
<div class="boxAuth">
	<div class="authMenu">
		<ul class="clearfix">
			<li><a href="tai-khoan.html"><i class="fas fa-home"></i> Tài khoản</a></li>
            <li><a href="doi-mat-khau.html"><i class="fas fa-lock"></i> Đổi mật khẩu</a></li>
            <li class="active"><a href="dang-tin.html"><i class="fas fa-edit"></i> Đăng tin</a></li>
            <li><a href="danh-sach-dang-tin.html"><i class="fas fa-list"></i> Danh sách tin đăng</a></li>
		</ul>
	</div>
	<div class="container">
		<div class="boxForm boxFormDangTin clearfix">
			<form method="POST" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="item">
							<label>Tiêu đề <span>*</span></label>
							<input type="text" name="name" required="" value="<?php if(isset($datas['name']) && $datas['name']!=''){ echo $datas['name']; }?>">
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Tỉnh/Thành <span>*</span></label>
									<select required="" class="js-select-tinhthanhpho" name="city_id" id="city_id">
										<?php if(isset($city) && ! empty($city)) { ?>
											<option value="">---Tỉnh---</option>
											<?php foreach ($city as $key_city => $val_city) {?>
												<option <?=$datas['city_id'] == $val_city['id'] ? 'selected' : ''?> value="<?=$val_city['id']?>"><?=$val_city['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Quận/Huyện <span>*</span></label>
									<select required="" class="js-select-quanhuyen" name="district_id" id="district_id">
										<?php if(isset($district) && ! empty($district)) { ?>
											<option value="">---Quận/Huyện---</option>
											<?php foreach ($district as $key_district => $val_district) {?>
												<option <?=$datas['district_id'] == $val_district['id'] ? 'selected' : ''?> value="<?=$val_district['id']?>"><?=$val_district['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Phường/Xã <span>*</span></label>
									<select required="" class="js-select-phuongxa" name="ward_id" id="ward_id">
										<?php if(isset($ward) && ! empty($ward)) { ?>
											<option value="">---Phường/Xã---</option>
											<?php foreach ($ward as $key_ward => $val_ward) {?>
												<option <?=$datas['ward_id'] == $val_ward['id'] ? 'selected' : ''?> value="<?=$val_ward['id']?>"><?=$val_ward['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Đường <span>*</span></label>
									<select required="" class="js-select-duong" name="street_id" id="street_id">
										<?php if(isset($street) && ! empty($street)) { ?>
											<option value="">---Đường---</option>
											<?php foreach ($street as $key_street => $val_street) {?>
												<option <?=$datas['street_id'] == $val_street['id'] ? 'selected' : ''?> value="<?=$val_street['id']?>"><?=$val_street['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="item">
							<label>Địa chỉ chính xác <span>*</span></label>
							<input type="text" required="" name="dia_chi" id="diachi" value="<?php if(isset($datas['dia_chi']) && $datas['dia_chi']!=''){ echo $datas['dia_chi']; }?>">
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<label>Diện tích <span>*</span></label>
									<div class="inputGroup">
										<input type="text" id="area" name="area" required="" value="<?php if(isset($datas['area']) && $datas['area']!=''){ echo $datas['area']; }?>">
										<div class="pro">m<sup>2</sup></div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4"><div class="row paddMobi2">
								<div class="item">
									<label>Đơn giá</label>
									<select name="unit" id="unit" required="">
										<option value="">Chọn đơn giá</option>
										<option <?=$datas['unit'] == 1 ? 'selected' : ''; ?> value="1">VNĐ</option>
										<option <?=$datas['unit'] == 2 ? 'selected' : ''; ?> value="2">VNĐ/tháng</option>
										<option <?=$datas['unit'] == 3 ? 'selected' : ''; ?> value="3">VNĐ/m²</option>
										<option <?=$datas['unit'] == 4 ? 'selected' : ''; ?> value="4">Giá thỏa thuận</option>
									</select>
								</div>
								<input type="hidden" name="deal" id="deal" value="<?php if(isset($datas['deal']) && $datas['deal']!=''){ echo $datas['deal']; }?>">
							</div></div>
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<label>Giá <span>*</span></label>
									<input type="text" onkeyup="return FormatNumber(this)" name="price" id="price" value="<?php if(isset($datas['price']) && $datas['price']!=''){ echo number_format($datas['price']); }?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<label>Số tầng</label>
									<select id="number_floor" name="number_floor">
										<option value="">Số tầng</option>
										<?php for ($i=1; $i < 11 ; $i++) { ?>
											<option <?=$datas['number_floor'] == $i ? 'selected' : ''; ?> value="<?=$i; ?>"><?=$i; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-4"><div class="row paddMobi2">
								<div class="item">
									<label>Số phòng</label>
									<select id="room" name="room">
										<option value="">Số phòng</option>
										<?php for ($i=1; $i < 11 ; $i++) { ?>
											<option <?=$datas['room'] == $i ? 'selected' : ''; ?> value="<?=$i; ?>"><?=$i; ?></option>
										<?php } ?>
									</select>
								</div>
							</div></div>
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<label>Số tolet</label>
									<select id="toliet" name="toliet">
										<option value="">Số tolet</option>
										<?php for ($i=1; $i < 11 ; $i++) { ?>
											<option <?=$datas['toliet'] == $i ? 'selected' : ''; ?> value="<?=$i; ?>"><?=$i; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<label>Hướng nhà <span>*</span></label>
									<select required="" name="direction_id" id="direction_id">
										<?php if(isset($direction) && ! empty($direction)) { ?>
											<option value="">---Hướng---</option>
											<?php foreach ($direction as $key_direction => $val_direction) {?>
												<option <?=$datas['direction_id'] == $val_direction['id'] ? 'selected' : ''?> value="<?=$val_direction['id']?>"><?=$val_direction['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-4"><div class="row paddMobi2">
								<div class="item">
									<label>Mặt tiền </label>
									<div class="inputGroup">
										<input type="text" id="facade" name="facade" value="<?php if(isset($datas['facade']) && $datas['facade']!=''){ echo $datas['facade']; }?>">
										<div class="pro">m</div>
									</div>
								</div>
							</div></div>
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<label>Lộ giới </label>
									<div class="inputGroup">
										<input type="text" id="highway" name="highway" value="<?php if(isset($datas['highway']) && $datas['highway']!=''){ echo $datas['highway']; }?>">
										<div class="pro">m</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clear height10"></div>
						<div>
							<label for="input-file-now">Hình ảnh (width: 604 x height: 400)</label>
							<input type="file" name="image" id="image" class="dropify" data-default-file="<?php echo $path_dir_thumb;?><?php echo $datas['thumb'];?>"/>
						</div>
						<div class="clear height10"></div>
						<div class="image-detail">
							<label for="input-file-now">Hình ảnh chi tiết</label>
							<div action="<?=base_url();?>NewsLandUser/upload" id="MyDropzone" class="dropzone"></div>
							<div class="clear height10"></div>
							<div class="row">
								<?php if(isset($photoList) && $photoList != NULL){ ?>
									<?php foreach ($photoList as $key_photoList => $val_photoList) { ?>
										<div class="col-md-3 col-sm-4 col-xs-6 item_<?php echo $val_photoList['id'];?>">
											<div class="item_drop box-list-img">
												<img src="upload/newsLand/detail/thumb/<?php echo $val_photoList['thumb'];?>" width="100%">
												<a class="btn btn-danger btn-sm btn-block" onclick="delDropzon(<?php echo $val_photoList['id'];?>);"><i class="icon-trash"></i> Xóa</a>
											</div>
										</div>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
						<div class="boxID"></div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Nhu cầu <span>*</span></label>
									<select required="" name="cateParent" id="cateParent">
										<?php if(isset($category) && ! empty($category)) { ?>
											<option value="">Chọn nhu cầu</option>
											<?php foreach ($category as $key_category => $val_category) {?>
												<option <?=$cateidParent == $val_category['id'] ? 'selected' : ''?> value="<?=$val_category['id']?>"><?=$val_category['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Loại nhà đất <span>*</span></label>
									<select required="" name="cateid" id="cateid">
										<?php if(isset($cateChild) && ! empty($cateChild)) { ?>
											<option value="">Chọn loại nhà đất</option>
											<?php foreach ($cateChild as $key_cateChild => $val_cateChild) {?>
												<option <?=$datas['cateid'] == $val_cateChild['id'] ? 'selected' : ''?> value="<?=$val_cateChild['id']?>"><?=$val_cateChild['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" id="map_lat" name="map_lat" value="<?php if(isset($datas['map_lat']) && $datas['map_lat']!=''){ echo $datas['map_lat']; }?>" />
							<input type="hidden" id="map_long" name="map_long" value="<?php if(isset($datas['map_long']) && $datas['map_long']!=''){ echo $datas['map_long']; }?>" />
							<!-- googleMap -->
							<div id="googleMap" style="width: auto; height: 370px; display: none;"></div>
							<!-- google Map Content -->
							<div id="maps_content" data-lat="<?php if(isset($datas['map_lat']) && $datas['map_lat']!=''){ echo $datas['map_lat']; }?>" data-long="<?php if(isset($datas['map_long']) && $datas['map_long']!=''){ echo $datas['map_long']; }?>" data-address="<?php if(isset($datas['dia_chi']) && $datas['dia_chi']!=''){ echo $datas['dia_chi']; }?>" style="width: auto; height: 370px;"></div>
						</div>
						<div class="item">
							<label>Link youtube (https://www.youtube.com/watch?v=<span class="text-danger">vYE2WyHypF0</span>)</label>
							<input type="text" id="video" name="video" value="<?php if(isset($datas['video']) && $datas['video']!=''){ echo $datas['video']; }?>">
						</div>
						<div class="item">
							<label>Thông tin miêu tả </label>
							<textarea rows="6" name="content" id="content"><?php if(isset($datas['content']) && $datas['content']!=''){ echo $datas['content']; }?></textarea>
							<script>
								CKEDITOR.replace( 'content' ,{
									toolbar: [
									['Source'] ,
									['Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About'] ,
									['Syntaxhighlight']
									]
								});
							</script>
						</div>
					</div>
				</div>
				<div class="item">
					<button type="submit">Đăng tin</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="public/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<script src="public/js/dropzone/dropzone.js"></script>
<link rel="stylesheet" href="public/js/dropzone/dropzone.css">
<script src="public/js/select-ajax-google-project.js"></script>
<script type="text/javascript">
	<?php $message_flashdata = $this->session->flashdata('message_flashdata');
    if(isset($message_flashdata) && count($message_flashdata)){ ?>
        <?php if($message_flashdata['type'] == 'sucess'){?>
            toastr.success('<?php echo $message_flashdata['message']; ?>');
        <?php
        }else if($message_flashdata['type'] == 'error'){
            ?>
            toastr.error('<?php echo $message_flashdata['message']; ?>');
            <?php
        } ?>
    <?php } ?>
    ////////
    $(document).ready(function() {
    	//select loại đất
    	$('#cateParent').change(function(event){
            var cateParentID = $('#cateParent').val();
            jQuery.ajax({
                url: '<?= base_url().'NewsLandUser/groundCateID' ?>',
                type: 'POST',
                data: {cateParentID: cateParentID},
                success: function(data) {
                    $('#cateid').html(data);
                },
            });
        });
        var unit = $('#unit').val();
        if(unit == 4){
            $('#price').val(0);
            document.getElementById("price").disabled = true;
            $('#deal').val(1);
        }
        //select Giá
        $('#unit').change(function(event){
            var unitID = $('#unit').val();
            if(unitID == 4) {
                $('#price').val(0);
                document.getElementById("price").disabled = true;
                $('#deal').val(1);
            } else {
                document.getElementById("price").disabled = false;
                $('#deal').val(0);
            }
        });
        //Select Quận/Huyện
        $('#city_id').change(function(event){
            var cityID = $('#city_id').val();
            jQuery.ajax({
                url: '<?= base_url().'NewsLandUser/district' ?>',
                type: 'POST',
                data: {cityID: cityID},
                success: function(data) {
                    $('#district_id').html(data);
                    $('#ward_id').html('<option value="">---Phường/Xã---</option>');
                    $('#street_id').html('<option value="">---Đường---</option>');
                    $("#googleMap").css("display", 'block');
                    $("#maps_content").css("display", 'none');
                },
            });
        });
        //Select Phường/Xã
        $('#district_id').change(function(event){
            var districtID = $('#district_id').val();
            jQuery.ajax({
                url: '<?= base_url().'NewsLandUser/ward' ?>',
                type: 'POST',
                data: {districtID: districtID},
                success: function(data) {
                    $('#ward_id').html(data);
                    $('#street_id').html('<option value="">---Đường---</option>');
                    $("#googleMap").css("display", 'block');
                    $("#maps_content").css("display", 'none');
                },
            });
        });
        //Select Đường
        $('#ward_id').change(function(event){
            var wardID = $('#ward_id').val();
            jQuery.ajax({
                url: '<?= base_url().'NewsLandUser/street' ?>',
                type: 'POST',
                data: {wardID: wardID},
                success: function(data) {
                    $('#street_id').html(data);
                    $("#googleMap").css("display", 'block');
                    $("#maps_content").css("display", 'none');
                },
            });
        });
        //change Đường
        $('#street_id').change(function(event){
            $("#googleMap").css("display", 'block');
            $("#maps_content").css("display", 'none');
        });
        // Basic
        $('.dropify').dropify();
        ////
        Dropzone.options.MyDropzone = {
            addRemoveLinks: true,
            init : function() {
                myDropzone = this;
                this.on("drop", function(event) {
                   //Put your ajax call here for upload image
               });
                this.on("complete", function(file){
                    $('.boxID').append('<input type="hidden" name="photoID[]" value="'+file.upload.uuid+'">')
                });
                /* Called after the file is uploaded and sucessful */
                this.on("sucess", function(file){

                });
                /* Called before the file is being sent */
                this.on("sending", function(file, xhr, formData){
                    formData.append('uuid', file.upload.uuid);
                });
                this.on("removedfile", function(file) {
                    $.ajax({
                        url: "NewsLandUser/deldropzone",
                        type: "POST",
                        data: { uuid: file.upload.uuid}
                    });
                });
            }
        }
    });
	function delDropzon(id){
		if(id != ''){
			$('.item_' + id).fadeOut();
			$.ajax({
				url: "NewsLandUser/deldropzonebyID",
				type: "POST",
				data: { id: id}
			});
		}
	}
</script>