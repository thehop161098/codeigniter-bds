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
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title m-b-0"><?php echo isset($title)?$title:'';?></h3>
            <div class="clear height10"></div>
            <form data-toggle="validator" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputName" class="control-label">Title</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($datas['name']) && $datas['name']!=''){ echo $datas['name']; }?>">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?php if(isset($datas['link']) && $datas['link']!=''){ echo $datas['link']; }?>">
                </div>
                <div>
                    <label for="input-file-now">Hình ảnh (width: 270 x height: auto)</label>
                    <input type="file" name="image" id="image" class="dropify" data-default-file="<?php echo $path_dir_thumb;?><?php echo $datas['thumb'];?>" />
                </div>
                <div class="clear height20"></div>
                <div class="checkbox checkbox-danger">
                    <input <?php if($datas['publish'] == 1){ ?> checked=""  <?php } ?> id="checkbox6" type="checkbox" name="publish" value="1">
                    <label for="checkbox6"> Hiển thị </label>
                </div>
                <div class="clear height20"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cập nhật</button>
                    <a href="<?php echo $path_url;?>index" class="btn btn-success"><i class="icon-close"></i> Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="public/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<!-- Sweet-Alert  -->
<script src="public/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="public/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
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
    });
</script>
