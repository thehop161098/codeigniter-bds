<?php if(isset($datas) && $datas != NULL){ ?>
    <?php foreach ($datas as $key => $val) {?>
        <div id="myListNewsLand<?php echo $val['id'];?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Danh sách đăng tin của <?=$val['fullname'] ?></h4>
                    </div>
                    <div class="modal-body clearfix">
                        <table id="myTable" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Hình ảnh</th>
                                    <th class="text-center">Tên tin</th>
                                    <th class="text-center">Loại tin</th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Trạng thái</th>
                                </tr>
                            </thead>
                            <?php if(isset($val['listNewsLand']) && $val['listNewsLand'] != NULL){ ?>
                                <tbody>
                                    <?php foreach ($val['listNewsLand'] as $key_listNewsLand => $val_listNewsLand) {
                                        ?>
                                        <tr>
                                            <?php $bg_img = NO_IMG;
                                            if(is_file('./'.'upload/newsLand/thumb/'.$val_listNewsLand['thumb'])) {
                                                $bg_img  = 'upload/newsLand/thumb/'.$val_listNewsLand['thumb'];
                                            } ?>
                                            <td class="text-center"><img src="<?=$bg_img; ?>" width="60"></td>
                                            <td class="text-left"><?=$val_listNewsLand['name'];?></td>
                                            <td class="text-left"><?=$val_listNewsLand['cate_name'];?></td>
                                            <td class="text-center">
                                                <?php if($val_listNewsLand['price'] == 0) { ?>
                                                    Thỏa thuận
                                                <?php } else { ?>
                                                    <?=number_format($val_listNewsLand['price']);?>đ
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($val_listNewsLand['publish'] == 1) { ?>
                                                    Đã duyệt
                                                <?php } else { ?>
                                                    Chờ duyệt
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center">Không có bài tin</td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
