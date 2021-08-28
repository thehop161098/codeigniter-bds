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
                        <input type="text" onkeyup="createSlug(this);" required="" requiredmsg="Vui lòng nhập tiêu đề" class="form-control" id="name" name="name" value="<?= isset($data_old['name']) ? $data_old['name'] : '' ?>" data-control="<?php echo $control;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Slug (<span class="text-red">*</span>)</label>
                        <input type="text" class="form-control" id="alias" name="alias" required="" requiredmsg="Vui lòng nhập tiêu đề" value="<?= isset($data_old['alias']) ? $data_old['alias'] : '' ?>">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Đơn giá (<span class="text-red">*</span>)</label>
                                <select class="form-control select2" name="unit" id="unit" required="">
                                    <option value="1">VNĐ</option>
                                    <option value="2">VNĐ/tháng</option>
                                    <option value="3">VNĐ/m²</option>
                                    <option value="4">Giá thỏa thuận</option>
                                </select>
                            </div>
                            <input type="hidden" name="deal" id="deal" value="0">
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Giá bán</label>
                                <input type="text" onkeyup="return FormatNumber(this)" class="form-control" name="price" id="price" placeholder="100,000,000" value="<?= isset($data_old['price']) ? $data_old['price'] : '' ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Diện tích (<span class="text-red">*</span>)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="area" name="area" required="" placeholder="1,000">
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
                        <label for="inputName" class="control-label">Địa chỉ chính xác</label>
                        <input type="text" readonly class="form-control" name="dia_chi" id="diachi">
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Mặt tiền</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="facade" name="facade"  placeholder="20">
                                    <div class="input-group-addon">m</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Lộ giới</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="highway" name="highway"  placeholder="8">
                                    <div class="input-group-addon">m</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Số tầng</label>
                                <input type="text" class="form-control" id="number_floor" name="number_floor">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Số phòng ngủ</label>
                                <input type="text" class="form-control" id="room" name="room">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Số Toliet</label>
                                <input type="text" class="form-control" id="toliet" name="toliet">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Hướng (<span class="text-red">*</span>)</label>
                                <select required="" class="form-control select2" name="direction_id" id="direction_id">
                                    <?php if(isset($direction) && ! empty($direction)) { ?>
                                        <option value="">---Hướng---</option>
                                        <?php foreach ($direction as $key_direction => $val_direction) {?>
                                            <option value="<?=$val_direction['id']?>"><?=$val_direction['name'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Video quảng cáo: (https://www.youtube.com/watch?v=<span class="text-danger">vYE2WyHypF0</span>)</label>
                        <input type="text" class="form-control" id="video" name="video" value="<?= isset($data_old['video']) ? $data_old['video'] : '' ?>">
                    </div>
                    <div>
                        <label for="input-file-now">Hình ảnh (width: 604 x height: 400)</label>
                        <input type="file" name="image" id="image" class="dropify" />
                    </div>
                    <div class="clear height20"></div>
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
                        <input onkeyup="countNumberTitle()" type="text" class="form-control" id="title" name="title" value="<?= isset($data_old['title']) ? $data_old['title'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Meta keywords</label>
                        <textarea class="form-control" name="meta_keyword" rows="3"><?= isset($data_old['meta_keyword']) ? $data_old['meta_keyword'] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Meta Descriptions</label>
                        <div class="clear"></div>
                        <span class="text-info">(Descriptions trang hiệu quả nhất dài khoảng 160-300 ký tự, bao gồm cả khoảng trắng.)</span>
                        <strong><span id="numDescriptions">0</span></strong> ký tự
                        <textarea onkeyup="countNumberDescriptions()" class="form-control" name="meta_description" id="meta_description" rows="3"><?= isset($data_old['meta_description']) ? $data_old['meta_description'] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="map_lat" name="map_lat" />
                        <input type="hidden" id="map_long" name="map_long" />
                        <div id="googleMap" style="width: auto; height: 370px;"></div>
                    </div>
                    <div class="m-t-15 m-b-15">
                        <label for="input-file-now">Hình ảnh chi tiết</label>
                        <div action="<?php echo ADMIN_URL;?>newsLand/upload" id="MyDropzone" class="dropzone"></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Nội dung</label>
                        <div>
                            <textarea class="form-control ckeditor" rows="5" name="content" id="content"><?= isset($data_old['content']) ? $data_old['content'] : '' ?></textarea>
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
<script src="public/js/dropzone/dropzone.js"></script>
<link rel="stylesheet" href="public/js/dropzone/dropzone.css">
<script src="public/theme.v1/js/jquery.slimscroll.js"></script>
<script src="public/js/select-ajax-google-project.js"></script>
<script type="text/javascript">
    //////////
    $(document).ready(function() {
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
                },
            });
        });
        $("#city_id").trigger("change");
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
                },
            });
        });
        $("#district_id").trigger("change");
        //Select Đường
        $('#ward_id').change(function(event){
            var wardID = $('#ward_id').val();
            jQuery.ajax({
                url: '<?= base_url().'otadmin/newsLand/street' ?>',
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
    ////
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
