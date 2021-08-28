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
                        <input onkeyup="createSlug(this);" type="text" class="form-control" id="title_price" name="title_price" data-control="<?php echo $control;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Liên kết</label>
                        <input type="text" class="form-control" id="link_price" name="link_price" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập tiêu đề')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="des_price" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" name="content_price" rows="10"></textarea>
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
                        <input onkeyup="createSlug(this);" type="text" class="form-control" id="title_hangmuc" name="title_hangmuc" data-control="<?php echo $control;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Liên kết</label>
                        <input type="text" class="form-control" id="link_hangmuc" name="link_hangmuc" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập tiêu đề')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="des_hangmuc" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" name="content_hangmuc" rows="10"></textarea>
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
                        <input onkeyup="createSlug(this);" type="text" class="form-control" id="title_sale" name="title_sale" data-control="<?php echo $control;?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="control-label">Liên kết</label>
                        <input type="text" class="form-control" id="link_sale" name="link_sale" required="" oninvalid="this.setCustomValidity('Bạn chưa nhập tiêu đề')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="des_sale" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" name="content_sale" rows="10"></textarea>
                        <script>
                            CKEDITOR.replace( 'content_sale' ,{        
                              toolbar: []              
                            });
                        </script>
                    </div>
                    <div class="clear height20"></div>
                    <div class="checkbox checkbox-danger">
                        <input id="checkbox6" type="checkbox" checked="" name="publish" value="1">
                        <label for="checkbox6"> Hiển thị </label>
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
<script src="public/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
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
                