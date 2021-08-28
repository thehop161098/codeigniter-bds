<header>
	<?php $this->load->view('frontend/layout/menu/menu_mobi'); ?>
	<div id="banner">
		<div class="container"><div class="row">
			<div class="col-md-3 col-sm-6 col-xs-11">
				<?php $this->load->view('frontend/layout/header/logo'); ?>
			</div>
			<div class="col-md-9 col-sm-6 col-xs-1">
				<?php if(! $this->session->userdata('userID')) { ?>
					<a class="site-login" data-toggle="modal" href="#myLogin"> <i class="fas fa-edit"></i><span class="text hidden-sm hidden-xs">Đăng tin miễn phí</span> </a>
				<?php } else { ?>
					<button class="avatarUser" type="button" data-toggle="dropdown" aria-expanded="false">
						<img alt="" src="public/images/user.jpg" height="36" width="36">
					</button>
					<div class="dropdown-menu dropdown-menu-right box-dropdown-item">
						<a class="dropdown-item" href="tai-khoan.html">Tài khoản </a>
						<a class="dropdown-item" href="dang-tin.html">Đăng tin</a>
						<a class="dropdown-item" href="danh-sach-dang-tin.html">Danh sách tin đăng</a>
						<a class="dropdown-item" href="dang-xuat.html">Đăng xuất</a>
					</div>
				<?php } ?>
				<?php $this->load->view('frontend/layout/header/boxSearch'); ?>
			</div>
		</div></div>
	</div>
</header>
<?php $this->load->view('frontend/layout/menu/mainmenu'); ?>
<div class="clear"></div>
<?php if($data_index['crt'] == 'home'){ ?>
	<?php $this->load->view('frontend/layout/header/searchDetail'); ?>
<?php } ?>

