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
<form data-toggle="validator" novalidate="true" method="post" action="" enctype="multipart/form-data">
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
                        <label for="inputName" class="control-label">Tiêu đề</label>
                        <input type="text" required="" onkeyup="createSlug(this);" class="form-control" id="name" name="name" value="<?php if(isset($datas['name']) && $datas['name']!=''){ echo $datas['name']; }?>" data-control="<?php echo $control;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Slug</label>
                        <input type="text" class="form-control" id="alias" name="alias" value="<?php if(isset($datas['alias']) && $datas['alias']!=''){ echo $datas['alias']; }?>">
                    </div>
                    <div>
                        <label for="input-file-now">Hình ảnh (width: 420 x height: 260)</label>
                        <input type="file" name="image" id="image" class="dropify" data-default-file="<?php echo $path_dir_thumb;?><?php echo $datas['thumb'];?>" />
                    </div>
                    <div class="clear height20"></div>
                    <div class="checkbox checkbox-danger">
                        <input <?php if($datas['publish'] == 1){ ?> checked=""  <?php } ?> id="checkbox6" type="checkbox" name="publish" value="1">
                        <label for="checkbox6"> Hiển thị </label>
                    </div>
                    <div class="clear height20"></div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="des" rows="5"><?php if(isset($datas['des']) && $datas['des']!=''){ echo $datas['des']; }?></textarea>
                    </div>
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
                    <div class="form-group">
                        <label for="inputName" class="control-label">Tags</label>
                        <input type="text" class="form-control" id="tags" name="tags" data-role="tagsinput" value="<?php echo $datas['tags'];?>">
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
<script type="text/javascript">
    $(document).ready(function() {
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
