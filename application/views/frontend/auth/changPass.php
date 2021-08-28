<link rel="stylesheet" type="text/css" href="public/css/auth.css">
<div class="boxAuth">
    <div class="authMenu">
        <ul class="clearfix">
            <li><a href="tai-khoan.html"><i class="fas fa-home"></i> Tài khoản</a></li>
            <li class="active"><a href="doi-mat-khau.html"><i class="fas fa-lock"></i> Đổi mật khẩu</a></li>
            <li><a href="dang-tin.html"><i class="fas fa-edit"></i> Đăng tin</a></li>
            <li><a href="danh-sach-dang-tin.html"><i class="fas fa-list"></i> Danh sách tin đăng</a></li>
        </ul>
    </div>
	<div class="boxForm clearfix">
		<form action="" method="POST">
			<div class="item">
				<label>Mật khẩu củ <span>*</span></label>
				<input type="password" name="ChangPass[password]" value="<?= isset($old_data['password']) ? $old_data['password'] : '' ?>">
				<small class="text-red"><?= isset($errors['password']) ? $errors['password'] : '' ?></small>
			</div>
			<div class="item">
				<label>Mật khẩu mới <span>*</span></label>
				<input type="password" name="ChangPass[new-password]" value="<?= isset($old_data['new-password']) ? $old_data['new-password'] : '' ?>">
				<small class="text-red"><?= isset($errors['new-password']) ? $errors['new-password'] : '' ?></small>
			</div>
			<div class="item">
				<label>Nhập lại mật khẩu mới <span>*</span></label>
				<input type="password" name="ChangPass[re-new-password]" value="<?= isset($old_data['re-new-password']) ? $old_data['re-new-password'] : '' ?>">
				<small class="text-red"><?= isset($errors['re-new-password']) ? $errors['re-new-password'] : '' ?></small>
			</div>
			<div class="item">
				<button type="submit">Đổi mật khẩu</button>
			</div>
		</form>
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