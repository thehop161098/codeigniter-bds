<link rel="stylesheet" type="text/css" href="public/css/auth.css">
<link href="public/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<div class="boxAuth">
	<div class="authMenu">
		<ul class="clearfix">
			<li><a href="tai-khoan.html"><i class="fas fa-home"></i> Tài khoản</a></li>
            <li><a href="doi-mat-khau.html"><i class="fas fa-lock"></i> Đổi mật khẩu</a></li>
            <li><a href="dang-tin.html"><i class="fas fa-edit"></i> Đăng tin</a></li>
            <li class="active"><a href="danh-sach-dang-tin.html"><i class="fas fa-list"></i> Danh sách tin đăng</a></li>
		</ul>
	</div>
	<div class="container">
		<div class="boxListBDS clearfix">
			<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>STT</th>
						<th>Hình ảnh</th>
						<th>Tiêu đề</th>
						<th>Nhu cầu</th>
						<th>Loại nhà đất</th>
						<th>Tỉnh/thành</th>
						<th>Diện tích</th>
						<th>Giá</th>
						<th>Trạng thái</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<?php if(isset($datas) && $datas != NULL){ ?>
					<tbody>
						<?php $stt = 1; ?>
						<?php foreach ($datas as $key => $val) { ?>
							<tr>
								<td><?=$stt++; ?></td>
								<?php $bg_img = NO_IMG;
								if(is_file('./'.'upload/newsLand/thumb/'.$val['thumb'])) {
									$bg_img  = 'upload/newsLand/thumb/'.$val['thumb'];
								} ?>
								<td><img src="<?=$bg_img ;?>" height="50"></td>
								<td width="240"><a class="name" href="dang-tin-cap-nhat/<?=$val['id'];?>"><?=$val['name'];?></a></td>
								<td><?=$val['cate_name_parent'];?></td>
								<td><?=$val['cate_name'];?></td>
								<td><?=$val['city_name']['name'];?></td>
								<td><?=$val['area'];?>m<sup>2</sup></td>
								<td><strong>
									<?php if($val['price'] == 0) { ?>
                                        Thỏa thuận
                                    <?php } else { ?>
                                        <?=$val['price_detail']; ?>
                                    <?php } ?>
								</strong></td>
								<td><span>
									<?php if($val['publish'] == 0) { ?>
										Chờ duyệt
									<?php } else { ?>
										Đã duyệt
									<?php } ?>
								</span></td>
								<td class="text-center tools">
									<a class="text-warning" href="dang-tin-cap-nhat/<?=$val['id'];?>" title="Sửa">
										<i class="fas fa-edit"></i>
									</a>
									<a class="text-danger delete<?=$val['id'];?>" onclick="del(<?=$val['id'];?>);" title="Xóa" data-control="newsLandUser">
										<i class="fas fa-times-circle"></i>
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				<?php } else { ?>
					<tr>
						<td colspan="10" class="text-center">Không có bài tin</td>
					</tr>
				<?php } ?>
			</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	<?php $message_flashdata = $this->session->flashdata('message_flashdata');
    if(isset($message_flashdata) && count($message_flashdata)){ ?>
        <?php if($message_flashdata['type'] == 'sucess'){?>
            toastr.success('<?php echo $message_flashdata['message']; ?>');
        <?php
        }else if($message_flashdata['type'] == 'error'){
            ?>
            toastr.error('<?php echo $message_flashdata['message']; ?>');
            <?php
        } ?>
    <?php } ?>
</script>
<!-- Sweet-Alert  -->
<script src="public/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="public/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
