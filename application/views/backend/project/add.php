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
<form data-toggle="validator"  method="post" action="" enctype="multipart/form-data">
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
                        <input onkeyup="createSlug(this);" type="text" class="form-control" id="name" name="name" required="" requiredmsg="Vui lòng nhập tiêu đề" data-control="<?php echo $control;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Slug (<span class="text-red">*</span>)</label>
                        <input type="text" class="form-control" id="alias" name="alias" required="" requiredmsg="Vui lòng nhập tiêu đề">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Tỉnh thành (<span class="text-red">*</span>)</label>
                                <select required="" class="form-control select2 js-select-tinhthanhpho" name="city_id" id="city_id">
                                    <?php if(isset($city) && ! empty($city)) { ?>
                                        <option value="">---Tỉnh---</option>
                                        <?php foreach ($city as $key_city => $val_city) {?>
                                            <option value="<?=$val_city['id']?>"><?=$val_city['name'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Quận/Huyện (<span class="text-red">*</span>)</label>
                                <select required="" class="form-control select2 js-select-quanhuyen" name="district_id" id="district_id">
                                    <option value="">---Quận/Huyện---</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Phường/Xã (<span class="text-red">*</span>)</label>
                                <select required="" class="form-control select2 js-select-phuongxa" name="ward_id" id="ward_id">
                                    <option value="">---Phường/Xã---</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Đường (<span class="text-red">*</span>)</label>
                                <select required="" class="form-control select2 js-select-duong" name="street_id" id="street_id">
                                    <option value="">---Đường---</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="diachi" class="col-form-label">Địa chỉ ( <span style="color: red;">*Có thể điền thêm địa chỉ xác định cụ thể</span> )</label>
                        <input type="text" class="form-control" name="dia_chi" id="diachi" required="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="map_lat" name="map_lat" />
                        <input type="hidden" id="map_long" name="map_long" />
                        <div id="googleMap" style="width: auto; height: 300px;"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Website</label>
                                <input type="text" class="form-control" id="website" name="website">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="checkbox checkbox-danger">
                        <input id="checkbox6" type="checkbox" checked="" name="publish" value="1">
                        <label for="checkbox6"> Hiển thị </label>
                    </div>
                    <div class="clear height20"></div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputName" class="control-label">Title</label>
                        <span class="text-info">(Tiêu đề trang hiệu quả nhất dài khoảng 10-70 ký tự, bao gồm cả khoảng trắng.)</span>
                        <strong><span id="numTitle">0</span></strong> ký tự
                        <input onkeyup="countNumberTitle()" type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label>Meta keywords</label>
                        <textarea class="form-control" name="meta_keyword" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Meta Descriptions</label>
                        <div class="clear"></div>
                        <span class="text-info">(Descriptions trang hiệu quả nhất dài khoảng 160-300 ký tự, bao gồm cả khoảng trắng.)</span>
                        <strong><span id="numDescriptions">0</span></strong> ký tự
                        <textarea onkeyup="countNumberDescriptions()" class="form-control" name="meta_description" id="meta_description" rows="5"></textarea>
                    </div>
                    <div>
                        <label for="input-file-now">Hình ảnh (width: 410 x height: 259)</label>
                        <input type="file" name="image" id="image" class="dropify" />
                    </div>
                    <div class="clear height20"></div>
                </div>
                <div class="clear"></div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nội dung</label>
                        <div>
                            <textarea class="form-control ckeditor" rows="5" name="content" id="content"></textarea>
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
                    },
                });
            });
            $("#city_id").trigger("change");
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
                },
            });
        });
        $("#district_id").trigger("change");
        //Select Đường
        $('#ward_id').change(function(event){
            var wardID = $('#ward_id').val();
            jQuery.ajax({
                url: '<?= base_url().'otadmin/project/street' ?>',
                type: 'POST',
                data: {wardID: wardID},
                success: function(data) {
                    $('#street_id').html(data);
                },
            });
        });
        // Basic
        $('.dropify').dropify();
        $('#slimtest').slimScroll({
            height: '200px'
        });
    });
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
