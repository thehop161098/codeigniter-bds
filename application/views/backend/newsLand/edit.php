<link rel="stylesheet" href="public/plugins/bower_components/dropify/dist/css/dropify.min.css">
<div class="row bg-title">
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#"><?php echo isset($title)?$title:'';?></a></li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0"><?php echo isset($title)?$title:'';?></h3>
            <div class="clear height10"></div>
            <form data-toggle="validator" method="post" action="" enctype="multipart/form-data">
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
                        <input type="text" onkeyup="createSlug(this);" required="" class="form-control" id="name" name="name" value="<?php if(isset($datas['name']) && $datas['name']!=''){ echo $datas['name']; }?>" data-control="<?php echo $control;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Slug (<span class="text-red">*</span>)</label>
                        <input type="text" required="" class="form-control" id="alias" name="alias" value="<?php if(isset($datas['alias']) && $datas['alias']!=''){ echo $datas['alias']; }?>">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Đơn giá (<span class="text-red">*</span>)</label>
                                <select class="form-control select2" name="unit" id="unit" required="">
                                    <option <?=$datas['unit'] == 1 ? 'selected' : ''; ?> value="1">VNĐ</option>
                                    <option <?=$datas['unit'] == 2 ? 'selected' : ''; ?> value="2">VNĐ/tháng</option>
                                    <option <?=$datas['unit'] == 3 ? 'selected' : ''; ?> value="3">VNĐ/m²</option>
                                    <option <?=$datas['unit'] == 4 ? 'selected' : ''; ?> value="4">Giá thỏa thuận</option>
                                </select>
                            </div>
                            <input type="hidden" name="deal" id="deal" value="<?php if(isset($datas['deal']) && $datas['deal']!=''){ echo $datas['deal']; }?>">
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Giá bán</label>
                                <input type="text" onkeyup="return FormatNumber(this)" class="form-control" name="price" id="price" placeholder="100,000,000" value="<?php if(isset($datas['price']) && $datas['price']!=''){ echo number_format($datas['price']); }?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Diện tích (<span class="text-red">*</span>)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="area" name="area" required="" placeholder="1,000" value="<?php if(isset($datas['area']) && $datas['area']!=''){ echo $datas['area']; }?>">
                                    <div class="input-group-addon">m²</div>
                                </div>
                            </div>
                        </div>
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
                        <label for="inputName" class="control-label">Địa chỉ chính xác</label>
                        <input type="text" readonly class="form-control" name="dia_chi" id="diachi" value="<?php if(isset($datas['dia_chi']) && $datas['dia_chi']!=''){ echo $datas['dia_chi']; }?>">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Mặt tiền</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="facade" name="facade"  placeholder="20" value="<?php if(isset($datas['facade']) && $datas['facade']!=''){ echo $datas['facade']; }?>">
                                    <div class="input-group-addon">m</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Lộ giới</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="highway" name="highway"  placeholder="8" value="<?php if(isset($datas['highway']) && $datas['highway']!=''){ echo $datas['highway']; }?>">
                                    <div class="input-group-addon">m</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Số tầng</label>
                                <input type="text" class="form-control" id="number_floor" name="number_floor" value="<?php if(isset($datas['number_floor']) && $datas['number_floor']!=''){ echo $datas['number_floor']; }?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Số phòng ngủ</label>
                                <input type="text" class="form-control" id="room" name="room" value="<?php if(isset($datas['room']) && $datas['room']!=''){ echo $datas['room']; }?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Số Toliet</label>
                                <input type="text" class="form-control" id="toliet" name="toliet" value="<?php if(isset($datas['toliet']) && $datas['toliet']!=''){ echo $datas['toliet']; }?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Hướng (<span class="text-red">*</span>)</label>
                                <select required="" class="form-control select2" name="direction_id" id="direction_id">
                                    <?php if(isset($direction) && ! empty($direction)) { ?>
                                        <option value="">---Hướng---</option>
                                        <?php foreach ($direction as $key_direction => $val_direction) {?>
                                            <option <?=$datas['direction_id'] == $val_direction['id'] ? 'selected' : ''?> value="<?=$val_direction['id']?>"><?=$val_direction['name'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Video quảng cáo: (https://www.youtube.com/watch?v=<span class="text-danger">vYE2WyHypF0</span>)</label>
                        <input type="text" class="form-control" id="video" name="video" value="<?php if(isset($datas['video']) && $datas['video']!=''){ echo $datas['video']; }?>">
                    </div>
                    <div>
                        <label for="input-file-now">Hình ảnh (width: 604 x height: 400)</label>
                        <input type="file" name="image" id="image" class="dropify" data-default-file="<?php echo $path_dir_thumb;?><?php echo $datas['thumb'];?>" />
                    </div>
                    <div class="clear height20"></div>
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
                        <textarea class="form-control" name="meta_keyword" rows="3"><?php if(isset($datas['meta_keyword']) && $datas['meta_keyword']!=''){ echo $datas['meta_keyword']; }?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Meta Descriptions</label>
                        <div class="clear"></div>
                        <span class="text-info">(Descriptions trang hiệu quả nhất dài khoảng 160-300 ký tự, bao gồm cả khoảng trắng.)</span>
                        <strong><span id="numDescriptions">0</span></strong> ký tự
                        <textarea onkeyup="countNumberDescriptions()" class="form-control" name="meta_description" id="meta_description" rows="3"><?php if(isset($datas['meta_description']) && $datas['meta_description']!=''){ echo $datas['meta_description']; }?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="map_lat" name="map_lat" value="<?php if(isset($datas['map_lat']) && $datas['map_lat']!=''){ echo $datas['map_lat']; }?>" />
                        <input type="hidden" id="map_long" name="map_long" value="<?php if(isset($datas['map_long']) && $datas['map_long']!=''){ echo $datas['map_long']; }?>" />
                        <!-- googleMap -->
                        <div id="googleMap" style="width: auto; height: 370px; display: none;"></div>
                        <!-- google Map Content -->
                        <div id="maps_content" data-lat="<?php if(isset($datas['map_lat']) && $datas['map_lat']!=''){ echo $datas['map_lat']; }?>" data-long="<?php if(isset($datas['map_long']) && $datas['map_long']!=''){ echo $datas['map_long']; }?>" data-address="<?php if(isset($datas['dia_chi']) && $datas['dia_chi']!=''){ echo $datas['dia_chi']; }?>" style="width: auto; height: 370px;"></div>
                    </div>
                    <div class="m-t-15 m-b-15">
                        <label for="input-file-now">Hình ảnh chi tiết</label>
                        <div action="<?php echo ADMIN_URL;?>newsLand/upload" id="MyDropzone" class="dropzone"></div>
                        <div class="clear m-t-15"></div>
                        <div class="row">
                            <?php if(isset($photoList) && $photoList != NULL){ ?>
                                <?php foreach ($photoList as $key_photoList => $val_photoList) { ?>
                                    <div class="col-md-3 item_<?php echo $val_photoList['id'];?>">
                                        <div class="item_drop box-list-img">
                                            <img src="upload/newsLand/detail/thumb/<?php echo $val_photoList['thumb'];?>" width="100%">
                                            <a class="btn btn-danger btn-sm btn-block" onclick="delDropzon(<?php echo $val_photoList['id'];?>);"><i class="icon-trash"></i> Xóa</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
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
                <div class="boxID"></div>
            </form>
        </div>
    </div>
</div>
<script src="public/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<!-- Sweet-Alert  -->
<script src="public/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="public/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
<script src="public/js/dropzone/dropzone.js"></script>
<link rel="stylesheet" href="public/js/dropzone/dropzone.css">
<script src="public/theme.v1/js/jquery.slimscroll.js"></script>
<script src="public/js/select-ajax-google-project.js"></script>
<script type="text/javascript">
    //////////
    $(document).ready(function() {
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
                url: '<?= base_url().'otadmin/newsLand/district' ?>',
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
                url: '<?= base_url().'otadmin/newsLand/ward' ?>',
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
                url: '<?= base_url().'otadmin/newsLand/street' ?>',
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
        ///
        $('#slimtest').slimScroll({
            height: '200px'
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
                        url: "otadmin/newsLand/deldropzone",
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
                url: "otadmin/newsLand/deldropzonebyID",
                type: "POST",
                data: { id: id}
            });
        }
    }
    ////
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
    #slimtest, #slimtest2, #slimtest3{
        border: 1px solid #e4e7ea;
        padding: 10px 0px 10px 10px;
    }
</style>
