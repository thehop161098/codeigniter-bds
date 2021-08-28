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
            <form data-toggle="validator" novalidate="true" method="post" action="" enctype="multipart/form-data">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputName" class="control-label">Title</label>
                        <input required requiredmsg="Vui lòng nhập title" type="text" class="form-control" id="name" name="name" value="<?php if(isset($datas['name']) && $datas['name']!=''){ echo $datas['name']; }?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Mô tả</label>
                        <textarea name="des" id="des" class="form-control" rows="3"><?php if(isset($datas['des']) && $datas['des']!=''){ echo $datas['des']; }?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Số điện thoại</label>
                        <input type="number" requiredmsg="Vui lòng nhập số" class="form-control" id="phone" name="phone" value="<?php if(isset($datas['phone']) && $datas['phone']!=''){ echo $datas['phone']; }?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Link map (iframe google)</label>
                        <textarea name="link" id="link" class="form-control" rows="5"><?php if(isset($datas['link']) && $datas['link']!=''){ echo $datas['link']; }?></textarea>
                    </div>
                    <div class="checkbox checkbox-danger">
                        <input <?php if($datas['publish'] == 1){ ?> checked=""  <?php } ?> id="checkbox6" type="checkbox" name="publish" value="1">
                        <label for="checkbox6"> Hiển thị </label>
                    </div>
                    <div class="clear height20"></div>
                </div>
                <div class="clear"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
                    <button type="reset" class="btn btn-success"><i class="fa fa-refresh"></i> Hủy</button>
                    <a href="<?php echo $path_url;?>" class="btn btn-success"><i class="fa fa-arrow-right"></i> Trở về</a>
                </div>
            </form>
        </div>
    </div>
</div>
