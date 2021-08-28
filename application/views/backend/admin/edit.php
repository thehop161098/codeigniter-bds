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
            <form data-toggle="validator" novalidate="true" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputName" class="control-label">Nhóm quyền</label>
                    <select class="form-control select2" name="role_id" id="role_id">
                        <?php if(isset($role) && ! empty($role)) { ?>
                            <option value="">---Nhóm quyền---</option>
                            <?php foreach ($role as $key_role => $val_role) {?>
                                <option <?=$datas['role_id'] == $val_role['id'] ? 'selected' : ''?> value="<?=$val_role['id']?>"><?=$val_role['name'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Tài khoản</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php if(isset($datas['username']) && $datas['username']!=''){ echo $datas['username']; }?>" disabled>
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Họ và tên</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php if(isset($datas['fullname']) && $datas['fullname']!=''){ echo $datas['fullname']; }?>">
                </div>
                <div class="checkbox checkbox-danger">
                    <input <?php if($datas['active'] == 1){ ?> checked=""  <?php } ?> id="checkbox6" type="checkbox" name="active" value="1">
                    <label for="checkbox6"> Kích hoạt </label>
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
                