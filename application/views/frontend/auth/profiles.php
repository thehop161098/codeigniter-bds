<link rel="stylesheet" type="text/css" href="public/css/auth.css">
<div class="boxAuth">
    <div class="authMenu">
        <ul class="clearfix">
            <li class="active"><a href="tai-khoan.html"><i class="fas fa-home"></i> Tài khoản</a></li>
            <li><a href="doi-mat-khau.html"><i class="fas fa-lock"></i> Đổi mật khẩu</a></li>
            <li><a href="dang-tin.html"><i class="fas fa-edit"></i> Đăng tin</a></li>
            <li><a href="danh-sach-dang-tin.html"><i class="fas fa-list"></i> Danh sách tin đăng</a></li>
        </ul>
    </div>
    <div class="boxForm clearfix">
        <form action="" method="POST">
            <div class="item">
                <label>Họ tên <span>*</span></label>
                <input type="text" name="Updateinfo[fullname]" value="<?= isset($infoUser['fullname']) ? $infoUser['fullname'] : '' ?>" placeholder="Họ tên">
                <small class="text-red"><?= isset($errors['fullname']) ? $errors['fullname'] : '' ?></small>
            </div>
            <div class="item">
                <label>Email <span>*</span></label>
                <input type="text" name="Updateinfo[email]" value="<?= isset($infoUser['email']) ? $infoUser['email'] : '' ?>" placeholder="Email">
                <small class="text-red"><?= isset($errors['email']) ? $errors['email'] : '' ?></small>
            </div>
            <div class="item">
                <label>Số điện thoại <span>*</span></label>
                <input type="text" name="Updateinfo[phone]" placeholder="Số điện thoại" value="<?= isset($infoUser['phone']) ? $infoUser['phone'] : '' ?>">
                <small class="text-red"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></small>
            </div>
            <?php $message_flashdata = $this->session->flashdata('message_flashdata');
            if(isset($message_flashdata) && count($message_flashdata)){ ?>
                <?php if($message_flashdata['type'] == 'sucess'){?>
                    <div class="alert-custom-forget success-forget"><?=$message_flashdata['message']; ?></div>
                    <?php
                }else if($message_flashdata['type'] == 'error'){
                    ?>
                    <div class="alert-custom-forget"><?=$message_flashdata['message']; ?></div>
                    <?php
                } ?>
            <?php } ?>
            <?php $message_flashdata_old = $this->session->flashdata('message_flashdata_old');
            if(isset($message_flashdata_old) && count($message_flashdata_old)){ ?>
                <?php if($message_flashdata_old['type'] == 'sucess'){?>
                    <div class="alert-custom-forget success-forget"><?=$message_flashdata_old['message']; ?></div>
                    <?php
                }else if($message_flashdata_old['type'] == 'error'){
                    ?>
                    <div class="alert-custom-forget"><?=$message_flashdata_old['message']; ?></div>
                    <?php
                } ?>
            <?php } ?>
            <div class="item">
                <button type="submit" id="btnProfile" data-loading-text="Đang gửi...">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
<script>
    $('#btnProfile').on('click', function () {
        var $btn = $(this).button('loading');
        $('.alert-custom-forget').addClass('hidden');
    })
</script>