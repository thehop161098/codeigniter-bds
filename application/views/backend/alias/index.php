<div class="row bg-title">
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#"><?php echo $title;?></a></li>
        </ol>
    </div>
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
<!-- /row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title"><?php echo isset($title)?$title:'';?></h3>
            <div class="clear height20"></div>
            <table id="myTable" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Ngày tạo</th>
                    </tr>
                </thead>
                <?php if(isset($datas) && $datas != NULL){ ?>
                <tbody>
                    <?php foreach ($datas as $key => $val) { ?>
                    <tr>
                        <td><a href="<?php echo $val['alias'];?><?php if($val['type'] < 3){ ?>/<?php } ?>"><?php echo $val['alias'];?></a></td>
                        <td class="text-center"><?php echo date('d/m/Y',strtotime($val['created_at']));?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<!-- datatables JS -->
<script src="public/plugins/bower_components/jquery-datatables-editable/jquery.dataTables.js"></script>
<script src="public/plugins/bower_components/datatables/dataTables.bootstrap.js"></script>
<script src="public/plugins/bower_components/tiny-editable/mindmup-editabletable.js"></script>
<script src="public/plugins/bower_components/tiny-editable/numeric-input-example.js"></script>
<!-- jQuery peity -->
<script src="public/plugins/bower_components/tablesaw-master/dist/tablesaw.js"></script>
<script src="public/plugins/bower_components/tablesaw-master/dist/tablesaw-init.js"></script>
<!--Wave Effects -->
<script src="public/theme.v1/js/waves.js"></script>
<script src="public/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<script src="public/theme.v1/js/toastr.js"></script>
<!-- Sweet-Alert  -->
<script src="public/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="public/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
<!-- Switchery  -->
<script src="public/plugins/bower_components/switchery/dist/switchery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "columnDefs": [ {
                  "targets": 'no-sort',
                  "orderable": false,
            }]
        });
        setTimeout(function(){ 
            $("#alerttopfix").fadeToggle(350);
        }, 3000);
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());

        });
    });
</script>

