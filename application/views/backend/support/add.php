<link rel="stylesheet" href="public/plugins/bower_components/dropify/dist/css/dropify.min.css">
<div class="row bg-title">
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#"><?php echo isset($title)?$title:'';?></a></li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<link href="public/plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
<!-- Info Submit -->
<?php $message_flashdata = $this->session->flashdata('message_flashdata');
    if(isset($message_flashdata) && count($message_flashdata)){ ?>
    <div id="alerttopfix" class="myadmin-alert alert-success myadmin-alert-top-right" style="display: block;">
    <?php if($message_flashdata['type'] == 'sucess'){
      ?> 
        <i class="icon-check"></i> <?php echo $message_flashdata['message']; ?>
      <?php
      }else if($message_flashdata['type'] == 'error'){
      ?>
        <i class="icon-close"></i> <?php echo $message_flashdata['message']; ?>
      <?php
      } ?>
      </div>
<?php } ?> 
<!-- .row -->
<?php $ViewData = $this->session->userdata('ViewData');?>

<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <h3 class="box-title m-b-0"><?php echo isset($title)?$title:'';?></h3>
            <div class="clear height10"></div>
            <form data-toggle="validator"  method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputName" class="control-label">Title</label>
                    <input type="text" required="" class="form-control" id="name" name="name" value="<?php if($ViewData){echo $ViewData['name'];}?>">
                </div>
                <div class="form-group">
                    <label for="inputName" class="control-label">Liên hệ</label>
                    <input type="text" class="form-control" id="des" name="des" value="<?php if($ViewData){echo $ViewData['des'];}?>">
                </div>
                <div>
                    <label for="input-file-now">Hình ảnh (width: 100 x height: 100)</label>
                    <input type="file" name="image" id="image" class="dropify" />
                </div>
                <div class="clear height20"></div>
                <div class="checkbox checkbox-danger">
                    <input id="checkbox6" type="checkbox" checked="" name="publish" value="1">
                    <label for="checkbox6"> Hiển thị </label>
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
    });
</script>
