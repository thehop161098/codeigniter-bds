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
            <a id="del-all" class="btn btn-success waves-effect waves-light" data-control="<?php echo $control;?>"><i class="ti-trash"></i>Xóa tất cả</a>
            <a href="<?php echo $path_url;?>index" class="btn btn-info waves-effect waves-light"><i class="icon-refresh"></i></a>
            <div class="clear height20"></div>
            <table id="myTable" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" class="text-center no-sort width_check">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox2" type="checkbox" class="check-all">
                                <label for="checkbox2"></label>
                            </div>
                        </th>
                        <th class="text-center">Mã đơn hàng</th>
                        <th class="text-center">Tên KH</th>
                        <th class="text-center">Số điện thoại</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Ngày tạo</th>
                        <th class="text-center no-sort">Hiển thị</th>
                        <th class="text-center no-sort">Chức năng</th>
                    </tr>
                </thead>
                <?php if(isset($datas) && $datas != NULL){ ?>
                <tbody>
                    <?php foreach ($datas as $key => $val) { ?>
                    <tr>
                        <td class="text-center">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox2<?php echo $val['id'];?>" type="checkbox" name="chon" class="checkbox-list" value="<?php echo $val['id'];?>">
                                <label for="checkbox2<?php echo $val['id'];?>"></label>
                            </div>
                        </td>
                        <td>#<?php echo $val['code'];?></td>
                        <td class="text-center"><?php echo $val['fullname'];?></td>
                        <td class="text-center"><?php echo $val['phone'];?></td>
                        <td class="text-center"><?php echo $val['email'];?></td>
                        <td class="text-center"><?php echo date('d/m/Y',strtotime($val['created_at']));?></td>
                        <td class="text-center">
                            <div class="form-group">
                                <select onchange="updateStatus(this,<?php echo $val['id'];?>);" class="form-control select2">
                                    <option value="0" <?php if($val['status'] == 0){ ?> selected <?php } ?>>Mới</option>
                                    <option value="1" <?php if($val['status'] == 1){ ?> selected <?php } ?>>Đã xác nhận</option>
                                    <option value="2" <?php if($val['status'] == 2){ ?> selected <?php } ?>>Đã giao</option>
                                    <option value="3" <?php if($val['status'] == 3){ ?> selected <?php } ?>>Hoàn thành</option>
                                    <option value="4" <?php if($val['status'] == 4){ ?> selected <?php } ?>>Đã hủy</option>
                                </select>
                            </div>
                        </td>
                        <td class="text-center">
                            <a data-toggle="modal" data-target="#myListCart<?php echo $val['id'];?>" class="btn btn-sm btn-info waves-effect waves-light"> <div data-icon="G" class="linea-icon linea-ecommerce"></div> </a>
                            <a onclick="del(<?php echo $val['id'];?>);" class="btn btn-sm btn-youtube waves-effect waves-light delete<?php echo $val['id'];?>" data-control="<?php echo $control;?>"> <i class="ti-trash"></i> </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('backend/order/listCart'); ?>
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
    function updateStatus(status,id){
        status = status.value;
        if(status){
            $.ajax
            ({
                method: "POST",
                url: "otadmin/order/updateStatus",
                data: { id:id,status:status},
            });
        }
    }
</script>

