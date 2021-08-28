<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#">Quản lý nhóm quyền</a></li>
            <li class="active"><?php echo $key['update'.$lang];?></li>
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
            <form data-toggle="validator" novalidate="true" method="post" action="">
                <div class="form-group">
                    <label for="inputName" class="control-label">Thư mục gốc</label>
                    <select class="form-control select2" name="parentid" id="parentid">
                        <option>Chọn mục cha</option>
                        <?php if(isset($modules) && $modules != NULL){ ?>
                            <?php foreach ($modules as $key_modules => $val_modules) { ?>
                                <option value="<?php echo $val_modules['id'];?>" <?php if($val_modules['id'] == $module['parentid']){ ?> selected <?php } ?>><?php echo $val_modules['name'];?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Tên</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($module['name']) && $module['name']!=''){ echo $module['name']; }?>">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?php if(isset($module['link']) && $module['link']!=''){ echo $module['link']; }?>">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Controller</label>
                    <input type="text" class="form-control" id="ctr" name="ctr" value="<?php if(isset($module['ctr']) && $module['ctr']!=''){ echo $module['ctr']; }?>">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Action</label>
                    <input type="text" class="form-control" id="act" name="act" value="<?php if(isset($module['act']) && $module['act']!=''){ echo $module['act']; }?>">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Icon</label>
                    <input type="text" class="form-control" id="icon" name="icon" value="<?php if(isset($module['icon']) && $module['icon']!=''){ echo $module['icon']; }?>">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Keys</label>
                    <input type="text" class="form-control" id="keys" name="keys" value="<?php if(isset($module['keys']) && $module['keys']!=''){ echo $module['keys']; }?>">
                </div>
                <div class="checkbox checkbox-danger">
                    <input <?php if($module['publish'] == 1){ ?> checked=""  <?php } ?> id="checkbox6" type="checkbox" name="publish" value="1">
                    <label for="checkbox6"> Hiển thị </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cập nhật</button>
                    <a href="otadmin/module/index" class="btn btn-success"><i class="icon-close"></i> Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
                