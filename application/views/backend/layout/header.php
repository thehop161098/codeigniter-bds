<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part">
            <a class="logo" href="<?=base_url()?>otadmin"><b><img src="public/images/icon/user.png" alt="home" class="light-logo" /></b>
                <span class="hidden-xs"><img src="public/images/admin.png" alt="home" class="light-logo" style="width:130px;"></span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
            <li>
                <form role="search" class="app-search hidden-xs">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="right-side-toggle"> <a class="waves-effect waves-light"><i class="icon-user-following"></i> <?php echo $data_index['info_admin']['username'];?></a></li>
            <li class="right-side-toggle"> <a class="waves-effect waves-light" href="otadmin/admin/edit2"><i class="ti-key"></i> Đổi mật khẩu</a></li>
            <li class="right-side-toggle"> <a class="waves-effect waves-light" href="otadmin/logout.html"><i class="icon-logout"></i> Đăng xuất</a></li>
        </ul>
    </div>
</nav>