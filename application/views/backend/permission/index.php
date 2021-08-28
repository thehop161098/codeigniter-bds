<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#">Phân quyền hệ thống</a></li>
        </ol>
    </div>
</div>
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
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nhóm quyền</th>
                        <?php if(isset($role) && $role != NULL){ ?>
                            <?php foreach ($role as $key_role => $val_role) { ?>
                                <th class="text-center"><?php echo $val_role['name'];?></th>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                </thead>
                <?php if(isset($module) && $module != NULL){ ?>
                <tbody>
                    <?php foreach ($module as $key => $val) { ?>
                    <tr>
                        <td><?php echo $val['name'];?></td>
                        <?php if(isset($role) && $role != NULL){ ?>
                            <?php foreach ($role as $key_role => $val_role) { ?>
                                <td class="text-center">
                                    <div class="checkbox checkbox-primary">
                                        <input <?php if($permission[$val['id'].$val_role['id']] == 1){ ?> checked <?php } ?> onclick="permission(<?php echo $val['id'];?>,<?php echo $val_role['id'];?>);" type="checkbox" value="1" class="active<?php echo $val['id'];?><?php echo $val_role['id'];?>">
                                        <label for="checkbox2"></label>
                                    </div>
                                </td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                        <?php if($val['child'] != NULL){ ?>
                        <?php foreach ($val['child']  as $key_child => $val_child) { ?>
                        <tr>
                            <td>|----- <?php echo $val_child['name'];?></td>
                            <?php if(isset($role) && $role != NULL){ ?>
                                <?php foreach ($role as $key_role => $val_role) { ?>
                                    <td class="text-center">
                                        <div class="checkbox checkbox-primary">
                                            <input <?php if($permission[$val_child['id'].$val_role['id']] == 1){ ?> checked <?php } ?> onclick="permission(<?php echo $val_child['id'];?>,<?php echo $val_role['id'];?>);" type="checkbox" value="1" class="active<?php echo $val_child['id'];?><?php echo $val_role['id'];?>">
                                            <label for="checkbox2"></label>
                                        </div>
                                    </td>
                                <?php } ?>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                        <?php } ?>
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
        
    });
    function permission(moduleid,roleid){
        active = $('.active' + moduleid + roleid + ':checked').val();
        if(active == 'undefined'){
            active = 0;
        }
        if(moduleid != '' && roleid != '')  
        { 
            $.ajax
            ({
                method: "POST",
                url: "otadmin/permission/permission",
                data: { moduleid:moduleid,roleid:roleid,active:active},
            });
        }
    }
</script>

