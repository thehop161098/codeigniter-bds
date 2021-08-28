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
            <form data-toggle="validator" novalidate="true" method="post" action="" enctype="multipart/form-data">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputName" class="control-label">Danh mục dịch vụ</label>
                        <select class="form-control select2" name="cateid" id="cateid">
                            <option>Chọn mục cha</option>
                            <?php echo $menus;?>
                        </select>
                    </div>
                    <code>GIÁ THIẾT KẾ</code>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Tiêu đề</label>
                        <input onkeyup="createSlug(this);" type="text" class="form-control" id="title_price" name="title_price" data-control="<?php echo $control;?>" value="<?php if(isset($datas['title_price']) && $datas['title_price']!=''){ echo $datas['title_price']; }?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Liên kết</label>
                        <input type="text" class="form-control" id="link_price" name="link_price" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập tiêu đề')" oninput="setCustomValidity('')" value="<?php if(isset($datas['link_price']) && $datas['link_price']!=''){ echo $datas['link_price']; }?>">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="des_price" rows="5"><?php if(isset($datas['des_price']) && $datas['des_price']!=''){ echo $datas['des_price']; }?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" name="content_price" rows="10"><?php if(isset($datas['content_price']) && $datas['content_price']!=''){ echo $datas['content_price']; }?></textarea>
                        <script>
                            CKEDITOR.replace( 'content_price' ,{        
                              toolbar: []              
                            });
                        </script>
                    </div>
                </div>
                <div class="col-sm-6">
                    <code>HẠNG MỤC THIẾT KẾ</code>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Tiêu đề</label>
                        <input onkeyup="createSlug(this);" type="text" class="form-control" id="title_hangmuc" name="title_hangmuc" data-control="<?php echo $control;?>" value="<?php if(isset($datas['title_hangmuc']) && $datas['title_hangmuc']!=''){ echo $datas['title_hangmuc']; }?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Liên kết</label>
                        <input type="text" class="form-control" id="link_hangmuc" name="link_hangmuc" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập tiêu đề')" oninput="setCustomValidity('')" value="<?php if(isset($datas['link_hangmuc']) && $datas['link_hangmuc']!=''){ echo $datas['link_hangmuc']; }?>">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="des_hangmuc" rows="5"><?php if(isset($datas['des_hangmuc']) && $datas['des_hangmuc']!=''){ echo $datas['des_hangmuc']; }?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" name="content_hangmuc" rows="10"><?php if(isset($datas['content_hangmuc']) && $datas['content_hangmuc']!=''){ echo $datas['content_hangmuc']; }?></textarea>
                        <script>
                            CKEDITOR.replace( 'content_hangmuc' ,{        
                              toolbar: []              
                            });
                        </script>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-sm-6">
                    <code>KHUYẾN MÃI ƯU ĐÃI</code>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Tiêu đề</label>
                        <input onkeyup="createSlug(this);" type="text" class="form-control" id="title_sale" name="title_sale" data-control="<?php echo $control;?>" value="<?php if(isset($datas['title_sale']) && $datas['title_sale']!=''){ echo $datas['title_sale']; }?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Liên kết</label>
                        <input type="text" class="form-control" id="link_sale" name="link_sale" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập tiêu đề')" oninput="setCustomValidity('')" value="<?php if(isset($datas['link_sale']) && $datas['link_sale']!=''){ echo $datas['link_sale']; }?>">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="des_sale" rows="5"><?php if(isset($datas['des_sale']) && $datas['des_sale']!=''){ echo $datas['des_sale']; }?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" name="content_sale" rows="10"><?php if(isset($datas['content_sale']) && $datas['content_sale']!=''){ echo $datas['content_sale']; }?></textarea>
                        <script>
                            CKEDITOR.replace( 'content_sale' ,{        
                              toolbar: []              
                            });
                        </script>
                    </div>
                    <div class="clear height20"></div>
                    <div class="checkbox checkbox-danger">
                        <input <?php if($datas['publish'] == 1){ ?> checked=""  <?php } ?> id="checkbox6" type="checkbox" name="publish" value="1">
                        <label for="checkbox6"> Hiển thị </label>
                    </div>
                </div>
                <div class="clear"></div>
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
                