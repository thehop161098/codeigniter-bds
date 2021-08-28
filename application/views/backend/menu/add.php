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
<form data-toggle="validator" novalidate="true" method="post" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0"><?php echo isset($title)?$title:'';?></h3>
                <div class="clear height10"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputName" class="control-label">Thư mục gốc</label>
                        <select class="form-control select2" name="parentid" id="parentid">
                            <option>Chọn mục cha</option>
                            <?php echo $menus;?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Loại danh mục</label>
                                <select class="form-control select2" name="type" id="type">
                                    <option value="0">Liên kết</option>
                                    <option value="1">Bài viết</option>
                                    <option value="2">Tin BDS</option>
                                    <option value="8">Dự án</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div id="resShowType">
                                    <label for="inputName" class="control-label">Link</label>
                                    <input type="text" class="form-control" id="link" name="link">
                                </div>
                                <div id="selectCategory">
                                    <label for="inputName" class="control-label">Thư mục gốc</label>
                                    <select class="form-control select2" name="categoryid" id="categoryid">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox checkbox-danger">
                        <input id="checkbox6" type="checkbox" checked="" name="publish" value="1">
                        <label for="checkbox6"> Hiển thị </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputName" class="control-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div>
                        <label for="input-file-now">Hình ảnh</label>
                        <input type="file" name="image" id="image" class="dropify" />
                    </div>
                    <div class="clear height20"></div>
                </div>
                <div class="clear height20"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
                    <button type="reset" class="btn btn-success"><i class="fa fa-refresh"></i> Hủy</button>
                    <a href="<?php echo $path_url;?>" class="btn btn-success"><i class="fa fa-arrow-right"></i> Trở về</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="public/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
        //Select type
        $('#selectCategory').hide();
        $('#type').change(function(event){
            var type = $('#type').val();
            if(type == 0){
                $('#resShowType').show();
                $('#selectCategory').hide();
            }else{
                jQuery.ajax({
                    url: '<?= base_url().'otadmin/menu/showType' ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {type: type},
                    success: function(res) {
                        if(res.success > 0){
                            $('#selectCategory').show();
                            $('#resShowType').hide();
                            $('#categoryid').html(res.resDataSelect);
                        }
                    },
                });
            }
        });
    });
</script>
