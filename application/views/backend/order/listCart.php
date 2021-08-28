<?php if(isset($datas) && $datas != NULL){ ?>
  <?php foreach ($datas as $key => $val) {?>
    <div id="myListCart<?php echo $val['id'];?>" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Thông tin chi tiết đơn hàng: #<?php echo $val['code'];?></h4>
          </div>
          <div class="modal-body clearfix">
            <table id="myTable" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên Sản phẩm</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                    </tr>
                </thead>
                <?php if(isset($val['listCart']) && $val['listCart'] != NULL){ ?>
                <tbody>
                    <?php foreach ($val['listCart'] as $key_listCart => $val_listCart) {
                      $stt = $key_listCart + 1;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $stt;?></td>
                        <td width="300"><?php echo $val_listCart['name'];?></td>
                        <td class="text-center"><img src="upload/product/thumb/<?php echo $val_listCart['thumb'];?>" width="60"></td>
                        <td class="text-center"><?= $val_listCart['price']== 0 ? 'Liên hệ' : number_format($val_listCart['price']). ' vnđ';?></td>
                        <td class="text-center"><?php echo $val_listCart['qty'];?></td>
                        <td class="text-center"><?= $val_listCart['totalPrice'] == 0 ? 'Liên hệ' : number_format($val_listCart['totalPrice']).' vnđ';?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php } ?>
            </table>
            <div class="clear"></div>
            <div class="boxInfoDetail">
                <div class="col-lg-12 col-sm-12 col-xs-12 m-t-10">
                    <h3 class="box-title">Thông tin khách hàng</h3>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            <ul class="list-icons">
                                <li><i class="ti-angle-right"></i>Họ và tên:  <?php echo $val['fullname'];?></li>
                                <li><i class="ti-angle-right"></i>Số điện thoại:  <?php echo $val['phone'];?></li>
                                <li><i class="ti-angle-right"></i>Email:  <?php echo $val['email'];?></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <ul class="list-icons">
                                <li><i class="ti-angle-right"></i>code:  <?php echo $val['code'];?></li>
                                <li><i class="ti-angle-right"></i>HT. Chuyển tiền: <?=$val['money']==1?'Chuyển khoản':'Tiền mặt'?></li>
                                <li><i class="ti-angle-right"></i>Đường:  <?php echo $val['address'];?></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <ul class="list-icons">
                                <li><i class="ti-angle-right"></i>Ghi chú: <?=$val['description']?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  <?php } ?>
<?php } ?>
