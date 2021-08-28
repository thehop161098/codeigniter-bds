<link rel="stylesheet" href="public/plugins/bower_components/dropify/dist/css/dropify.min.css">
<link href="public/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
<div class="row bg-title">
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#"><?php echo isset($title)?$title:'';?></a></li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<form data-toggle="validator" method="post" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0"><?php echo isset($title)?$title:'';?></h3>
                <div class="clear height10"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputName" class="control-label">Thư mục gốc</label>
                        <select class="form-control select2" name="cateid" id="cateid">
                            <option>Chọn mục cha</option>
                            <?php echo $menus;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Tiêu đề (<span class="text-red">*</span>)</label>
                        <input type="text" required="" onkeyup="createSlug(this);" class="form-control" id="name" name="name" value="<?php if(isset($datas['name']) && $datas['name']!=''){ echo $datas['name']; }?>" data-control="<?php echo $control;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Slug (<span class="text-red">*</span>)</label>
                        <input type="text" required="" class="form-control" id="alias" name="alias" value="<?php if(isset($datas['alias']) && $datas['alias']!=''){ echo $datas['alias']; }?>">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Tỉnh thành (<span class="text-red">*</span>)</label>
                                <select required="" class="form-control select2 js-select-tinhthanhpho" name="city_id" id="city_id">
                                    <?php if(isset($city) && ! empty($city)) { ?>
                                        <option value="">---Tỉnh---</option>
                                        <?php foreach ($city as $key_city => $val_city) {?>
                                            <option <?=$datas['city_id'] == $val_city['id'] ? 'selected' : ''?> value="<?=$val_city['id']?>"><?=$val_city['name'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Quận/Huyện (<span class="text-red">*</span>)</label>
                                <select required="" class="form-control select2 js-select-quanhuyen" name="district_id" id="district_id">
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Phường/Xã (<span class="text-red">*</span>)</label>
                                <select required="" class="form-control select2 js-select-phuongxa" name="ward_id" id="ward_id">
                                    <?php if(isset($ward) && ! empty($ward)) { ?>
                                        <option value="">---Phường/Xã---</option>
                                        <?php foreach ($ward as $key_ward => $val_ward) {?>
                                            <option <?=$datas['ward_id'] == $val_ward['id'] ? 'selected' : ''?> value="<?=$val_ward['id']?>"><?=$val_ward['name'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Đường (<span class="text-red">*</span>)</label>
                                <select required="" class="form-control select2 js-select-duong" name="street_id" id="street_id">
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
                    <div class="form-group">
                        <label for="inputName" class="control-label">Địa chỉ ( <span style="color: red;">*Có thể điền thêm địa chỉ xác định cụ thể</span> )</label>
                        <input type="text" required="" class="form-control" name="dia_chi" id="diachi" value="<?php if(isset($datas['dia_chi']) && $datas['dia_chi']!=''){ echo $datas['dia_chi']; }?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="map_lat" name="map_lat" value="<?php if(isset($datas['map_lat']) && $datas['map_lat']!=''){ echo $datas['map_lat']; }?>" />
                        <input type="hidden" id="map_long" name="map_long" value="<?php if(isset($datas['map_long']) && $datas['map_long']!=''){ echo $datas['map_long']; }?>" />
                        <!-- googleMap -->
                        <div id="googleMap" style="width: auto; height: 300px; display: none;"></div>
                        <!-- google Map Content -->
                        <div id="maps_content" data-lat="<?php if(isset($datas['map_lat']) && $datas['map_lat']!=''){ echo $datas['map_lat']; }?>" data-long="<?php if(isset($datas['map_long']) && $datas['map_long']!=''){ echo $datas['map_long']; }?>" data-address="<?php if(isset($datas['dia_chi']) && $datas['dia_chi']!=''){ echo $datas['dia_chi']; }?>" style="width: auto; height: 300px;"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php if(isset($datas['phone']) && $datas['phone']!=''){ echo $datas['phone']; }?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Website</label>
                                <input type="text" class="form-control" id="website" name="website" value="<?php if(isset($datas['website']) && $datas['website']!=''){ echo $datas['website']; }?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($datas['email']) && $datas['email']!=''){ echo $datas['email']; }?>">
                            </div>
                        </div>
                    </div>
                    <div class="checkbox checkbox-danger">
                        <input <?php if($datas['publish'] == 1){ ?> checked=""  <?php } ?> id="checkbox6" type="checkbox" name="publish" value="1">
                        <label for="checkbox6"> Hiển thị </label>
                    </div>
                    <div class="clear height20"></div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputName" class="control-label">Title</label>
                        <span class="text-info">(Tiêu đề trang hiệu quả nhất dài khoảng 10-70 ký tự, bao gồm cả khoảng trắng.)</span>
                        <strong><span id="numTitle">0</span></strong> ký tự
                        <input onkeyup="countNumberTitle()" type="text" class="form-control" id="title" name="title" value="<?php if(isset($datas['title']) && $datas['title']!=''){ echo $datas['title']; }?>">
                    </div>
                    <div class="form-group">
                        <label>Meta keywords</label>
                        <textarea class="form-control" name="meta_keyword" rows="5"><?php if(isset($datas['meta_keyword']) && $datas['meta_keyword']!=''){ echo $datas['meta_keyword']; }?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Meta Descriptions</label>
                        <div class="clear"></div>
                        <span class="text-info">(Descriptions trang hiệu quả nhất dài khoảng 160-300 ký tự, bao gồm cả khoảng trắng.)</span>
                        <strong><span id="numDescriptions">0</span></strong> ký tự
                        <textarea onkeyup="countNumberDescriptions()" class="form-control" id="meta_description" name="meta_description" rows="5"><?php if(isset($datas['meta_description']) && $datas['meta_description']!=''){ echo $datas['meta_description']; }?></textarea>
                    </div>
                    <div>
                        <label for="input-file-now">Hình ảnh (width: 410 x height: 259)</label>
                        <input type="file" name="image" id="image" class="dropify" data-default-file="<?php echo $path_dir_thumb;?><?php echo $datas['thumb'];?>" />
                    </div>
                    <div class="clear height20"></div>
                </div>
                <div class="clear"></div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nội dung</label>
                        <div>
                            <textarea class="form-control ckeditor" rows="5" name="content" id="content"><?php if(isset($datas['content']) && $datas['content']!=''){ echo $datas['content']; }?></textarea>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
                    <button type="reset" class="btn btn-success"><i class="fa fa-refresh"></i> Hủy</button>
                    <a href="<?php echo $path_url;?>" class="btn btn-success"><i class="fa fa-arrow-right"></i> Trở về</a>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="public/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="public/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<!-- Sweet-Alert  -->
<script src="public/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="public/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
<script src="public/theme.v1/js/jquery.slimscroll.js"></script>
<script src="public/js/select-ajax-google-project.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //Select Quận/Huyện
        $(document).ready(function() {
            $('#city_id').change(function(event){
                var cityID = $('#city_id').val();
                jQuery.ajax({
                    url: '<?= base_url().'otadmin/project/district' ?>',
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
        });
        //Select Phường/Xã
        $('#district_id').change(function(event){
            var districtID = $('#district_id').val();
            jQuery.ajax({
                url: '<?= base_url().'otadmin/project/ward' ?>',
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
                url: '<?= base_url().'otadmin/project/street' ?>',
                type: 'POST',
                data: {wardID: wardID},
                success: function(data) {
                    $('#street_id').html(data);
                    $("#googleMap").css("display", 'block');
                    $("#maps_content").css("display", 'none');
                },
            });
        });
        //change đường
        $('#street_id').change(function(event){
            $("#googleMap").css("display", 'block');
            $("#maps_content").css("display", 'none');
        });
        // Basic
        var drEvent = $('#image').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            var image_name = element.file.name;
            swal({title: "Are you sure?",showCancelButton: true, }
                , function(isConfirm){
                    if (isConfirm) { 
                        $.ajax
                        ({
                            method: "POST",
                            url: "<?php echo $path_url;?>delete_image",
                            data: { image:image_name},
                        });
                    }

                });
        });

        $('#slimtest').slimScroll({
            height: '200px'
        });
    });
    Str = $('#title').val();
    var count = Str.length;
    if(count >= 10 && count <=70){
        $('#numTitle').addClass('text-success');
        $('#numTitle').html(count);
    }else{
        $('#numTitle').removeClass('text-success');
        $('#numTitle').addClass('text-danger');
        $('#numTitle').html(count);
    }
    Str = $('#meta_description').val();
    var count = Str.length;
    if(count >= 160 && count <=300){
        $('#numDescriptions').addClass('text-success');
        $('#numDescriptions').html(count);
    }else{
        $('#numDescriptions').removeClass('text-success');
        $('#numDescriptions').addClass('text-danger');
        $('#numDescriptions').html(count);
    }
    function countNumberTitle(){
        Str = $('#title').val();
        var count = Str.length;
        if(count >= 10 && count <=70){
            $('#numTitle').addClass('text-success');
            $('#numTitle').html(count);
        }else{
            $('#numTitle').removeClass('text-success');
            $('#numTitle').addClass('text-danger');
            $('#numTitle').html(count);
        }
    }
    function countNumberDescriptions(Str){
        Str = $('#meta_description').val();
        var count = Str.length;
        if(count >= 160 && count <=300){
            $('#numDescriptions').addClass('text-success');
            $('#numDescriptions').html(count);
        }else{
            $('#numDescriptions').removeClass('text-success');
            $('#numDescriptions').addClass('text-danger');
            $('#numDescriptions').html(count);
        }
    }
</script>
<style type="text/css">
    #slimtest{
        border: 1px solid #e4e7ea;
        padding: 10px 0px 10px 10px;
    }
</style>
