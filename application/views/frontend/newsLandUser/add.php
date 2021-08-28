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
							<input type="text" name="name" required="">
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Tỉnh/Thành <span>*</span></label>
									<select required="" class="js-select-tinhthanhpho" name="city_id" id="city_id">
										<?php if(isset($city) && ! empty($city)) { ?>
											<option value="">---Tỉnh---</option>
											<?php foreach ($city as $key_city => $val_city) {?>
												<option value="<?=$val_city['id']?>"><?=$val_city['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Quận/Huyện <span>*</span></label>
									<select required="" class="js-select-quanhuyen" name="district_id" id="district_id">
										<option value="">Chọn Quận/Huyện</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Phường/Xã <span>*</span></label>
									<select required="" class="js-select-phuongxa" name="ward_id" id="ward_id">
										<option>Chọn Phường/Xã</option>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Đường <span>*</span></label>
									<select required="" class="js-select-duong" name="street_id" id="street_id">
										<option>Chọn Đường</option>
									</select>
								</div>
							</div>
						</div>
						<div class="item">
							<label>Địa chỉ chính xác <span>*</span></label>
							<input type="text" name="dia_chi" id="diachi" required="">
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<label>Diện tích <span>*</span></label>
									<div class="inputGroup">
										<input type="text" id="area" name="area" required="">
										<div class="pro">m<sup>2</sup></div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4"><div class="row paddMobi2">
								<div class="item">
									<label>Đơn giá <span>*</span></label>
									<select name="unit" id="unit" required="">
										<option value="">Chọn đơn giá</option>
										<option value="1">VNĐ</option>
										<option value="2">VNĐ/tháng</option>
										<option value="3">VNĐ/m2</option>
										<option value="4">Giá thỏa thuận</option>
									</select>
								</div>
								<input type="hidden" name="deal" id="deal" value="0">
							</div></div>
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<label>Giá <span>*</span></label>
									<input type="text" onkeyup="return FormatNumber(this)" name="price" id="price" value="<?= isset($data_old['price']) ? $data_old['price'] : '' ?>">
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
											<option value="<?=$i; ?>"><?=$i; ?></option>
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
											<option value="<?=$i; ?>"><?=$i; ?></option>
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
											<option value="<?=$i; ?>"><?=$i; ?></option>
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
											<option value="">---Hướng Nhà---</option>
											<?php foreach ($direction as $key_direction => $val_direction) {?>
												<option value="<?=$val_direction['id']?>"><?=$val_direction['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-4"><div class="row paddMobi2">
								<div class="item">
									<label>Mặt tiền</label>
									<div class="inputGroup">
										<input type="text" id="facade" name="facade">
										<div class="pro">m</div>
									</div>
								</div>
							</div></div>
							<div class="col-md-4 col-sm-4">
								<div class="item">
									<label>Lộ giới</label>
									<div class="inputGroup">
										<input type="text" id="highway" name="highway">
										<div class="pro">m</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clear height10"></div>
						<div>
							<label for="input-file-now">Hình ảnh (width: 604 x height: 400)</label>
							<input type="file" name="image" id="image" class="dropify" />
						</div>
						<div class="clear height10"></div>
						<div class="image-detail">
							<label for="input-file-now">Hình ảnh chi tiết</label>
							<div action="<?=base_url();?>NewsLandUser/upload" id="MyDropzone" class="dropzone"></div>
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
												<option value="<?=$val_category['id']?>"><?=$val_category['name'] ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="item">
									<label>Loại nhà đất <span>*</span></label>
									<select required="" name="cateid" id="cateid">
										<option value="">Chọn loại nhà đất</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" id="map_lat" name="map_lat" />
							<input type="hidden" id="map_long" name="map_long" />
							<div id="googleMap" style="width: auto; height: 330px;"></div>
						</div>
						<div class="item">
							<label>Link youtube (https://www.youtube.com/watch?v=<span class="text-danger">vYE2WyHypF0</span>)</label>
							<input type="text" id="video" name="video">
						</div>
						<div class="item">
							<label>Thông tin miêu tả</label>
							<textarea rows="6" name="content" id="content"></textarea>
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
                },
            });
        });
        // $("#city_id").trigger("change");
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
                },
            });
        });
        // $("#district_id").trigger("change");
        //Select Đường
        $('#ward_id').change(function(event){
            var wardID = $('#ward_id').val();
            jQuery.ajax({
                url: '<?= base_url().'NewsLandUser/street' ?>',
                type: 'POST',
                data: {wardID: wardID},
                success: function(data) {
                    $('#street_id').html(data);
                },
            });
        });
        // Basic
        $('.dropify').dropify();
        //////
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
</script>