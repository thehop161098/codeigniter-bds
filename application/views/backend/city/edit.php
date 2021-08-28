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
                        <label for="inputName" class="control-label">Tỉnh thành</label>
                        <input required requiredmsg="Vui lòng nhập Tỉnh thành" type="text" class="form-control" id="name" name="name" value="<?php if(isset($datas['name']) && $datas['name']!=''){ echo $datas['name']; }?>" onkeyup="createSlug(this);" data-control="<?php echo $control;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Slug</label>
                        <input type="text" class="form-control" id="alias" name="alias" value="<?php if(isset($datas['alias']) && $datas['alias']!=''){ echo $datas['alias']; }?>">
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
<script type="text/javascript">
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