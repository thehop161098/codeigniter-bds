<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li><a href="otadmin/dashboard" class="waves-effect"><i class="ti-world"></i> <span class="hide-menu">Dashboard</span></a></li>
            <?php if(isset($data_index['module']) && $data_index['module'] != NULL){ ?>
                <?php foreach ($data_index['module'] as $key_module => $val_module) { ?>
                <li <?php if($val_module['active'] == 0){ ?> class="hide" <?php }?>> <a href="<?php if($val_module['child'] == NULL){ ?>otadmin/<?php echo $val_module['link'];?><?php }else{ ?>javascript:void(0)<?php } ?>" class="waves-effect"><i class="<?php echo $val_module['icon'];?>"></i> <span class="hide-menu"><?php echo $val_module['name'];?><?php foreach ($val_module['child'] as $key_module_child => $val_module_child) { ?><span class="fa arrow"></span></span><?php } ?></a>
                    <?php if($val_module['child'] != NULL){ ?>
                    <ul class="nav nav-second-level">
                        <?php foreach ($val_module['child'] as $key_module_child => $val_module_child) { ?>
                        <li <?php if($val_module_child['active'] == 0){ ?> class="hide" <?php }?>><a href="<?php if($val_module_child['link'] != ''){ ?>otadmin/<?php echo $val_module_child['link'];?><?php }else{ ?>#<?php } ?>"><i class="<?php echo $val_module_child['icon'];?>"></i> <?php echo $val_module_child['name'];?> <?php if($val_module_child['keys'] != ''){ ?><span class="fa arrow"></span><?php } ?></a>
                            <?php if($val_module_child['keys'] == 'ticket'){ ?>
                                <?php if(isset($data_index['tickettype']) && $data_index['tickettype'] != NULL){ ?>
                                    <ul class="nav nav-third-level">
                                        <?php foreach ($data_index['tickettype'] as $key_tickettype => $val_tickettype) { ?>
                                        <li><a href="otadmin/bus/ticket/index/<?php echo $val_tickettype['id'];?>">+ <?php echo $val_tickettype['name'];?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>
