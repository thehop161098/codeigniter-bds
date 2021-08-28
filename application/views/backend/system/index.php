<link rel="stylesheet" href="public/plugins/bower_components/dropify/dist/css/dropify.min.css">
<div class="row bg-title">
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#"><?php echo isset($title)?$title:'';?></a></li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box clearfix">
            <h3 class="box-title m-b-0"><?php echo isset($title)?$title:'';?></h3>
            <div class="clear height10"></div>
            <ul class="nav nav-tabs" role="tablist" id="myTab">
                <li role="presentation" class="active"><a href="#system" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span><i class="ti-home"></i> Home</span></a></li>
                <li role="presentation" class=""><a href="#contact" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span><i class="icon-phone"></i> Liên hệ</span> </a></li>
                <li role="presentation" class=""><a href="#social" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span><i class="icon-social-facebook"></i> Social</span> </a></li>
                <li role="presentation" class=""><a href="#googles" aria-controls="google" role="tab" data-toggle="tab" aria-expanded="false"><span><i class="ti-google"></i> Google</span> </a></li>
                <li role="presentation" class=""><a href="#registerCus" aria-controls="registerCus" role="tab" data-toggle="tab" aria-expanded="false"><span><i class="ti-settings"></i> Đăng ký khách hàng</span> </a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="system">
                    <div class="col-md-12"><div class="row">
                        <form data-toggle="validator" novalidate="true" method="post" action="" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="<?php if(isset($datas['title']) && $datas['title']!=''){ echo $datas['title']; }?>">
                                </div>
                                <div>
                                    <label for="input-file-now">Favicon</label>
                                    <input type="file" name="image" id="image" class="dropify" data-default-file="<?php echo $path_dir_thumb;?><?php echo $datas['thumb'];?>" />
                                </div>
                                <div class="clear height20"></div>
                                <div class="form-group">
                                    <label>Meta keywords</label>
                                    <textarea class="form-control" name="meta_keyword" rows="5"><?php if(isset($datas['meta_keyword']) && $datas['meta_keyword']!=''){ echo $datas['meta_keyword']; }?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Descriptions</label>
                                    <textarea class="form-control" name="meta_description" rows="5"><?php if(isset($datas['meta_description']) && $datas['meta_description']!=''){ echo $datas['meta_description']; }?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Schema.org</label>
                                    <textarea class="form-control" name="schema" rows="1"><?php if(isset($datas['schema']) && $datas['schema']!=''){ echo $datas['schema']; }?></textarea>
                                </div>
                            </div>
                            <div class="clear height20"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cập nhật</button>
                                <a href="<?php echo $path_url;?>index" class="btn btn-success"><i class="icon-close"></i> Hủy</a>
                            </div>
                        </form>
                    </div></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="contact">
                    <div class="col-md-12"><div class="row">
                        <form data-toggle="validator" novalidate="true" method="post" action="otadmin/system/contact" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Tên công ty</label>
                                        <input type="text" class="form-control" name="company" id="company" value="<?php if(isset($contact['company']) && $contact['company']!=''){ echo $contact['company']; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address" id="address" value="<?php if(isset($contact['address']) && $contact['address']!=''){ echo $contact['address']; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Hỗ trợ 24/24</label>
                                        <input type="text" class="form-control" name="phone_sp" id="phone_sp" value="<?php if(isset($contact['phone_sp']) && $contact['phone_sp']!=''){ echo $contact['phone_sp']; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Hotline</label>
                                        <input type="text" class="form-control" name="hotline" id="hotline" value="<?php if(isset($contact['hotline']) && $contact['hotline']!=''){ echo $contact['hotline']; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Zalo</label>
                                        <input type="text" class="form-control" name="zalo" id="zalo" value="<?php if(isset($contact['zalo']) && $contact['zalo']!=''){ echo $contact['zalo']; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?php if(isset($contact['email']) && $contact['email']!=''){ echo $contact['email']; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">website</label>
                                        <input type="text" class="form-control" name="website" id="website" value="<?php if(isset($contact['website']) && $contact['website']!=''){ echo $contact['website']; }?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Bản đồ map</label>
                                        <textarea class="form-control" name="map" rows="5"><?php if(isset($contact['map']) && $contact['map']!=''){ echo $contact['map']; }?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputName" class="control-label">Facebook (mobile)</label>
                                                <input type="text" class="form-control" name="fb_mobile" id="fb_mobile" value="<?php if(isset($contact['fb_mobile']) && $contact['fb_mobile']!=''){ echo $contact['fb_mobile']; }?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputName" class="control-label">Zalo (mobile)</label>
                                                <input type="text" class="form-control" name="zalo_mobile" id="zalo_mobile" value="<?php if(isset($contact['zalo_mobile']) && $contact['zalo_mobile']!=''){ echo $contact['zalo_mobile']; }?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputName" class="control-label">Phone (desktop & mobile)</label>
                                                <input type="text" class="form-control" name="phone_mobile" id="phone_mobile" value="<?php if(isset($contact['phone_mobile']) && $contact['phone_mobile']!=''){ echo $contact['phone_mobile']; }?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="control-label">Key Map</label>
                                        <input type="text" class="form-control" name="key_map" id="key_map" value="<?php if(isset($contact['key_map']) && $contact['key_map']!=''){ echo $contact['key_map']; }?>">
                                    </div>
                                </div>
                            </div>
                            <div class="clear height20"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cập nhật</button>
                                <a href="<?php echo $path_url;?>index" class="btn btn-success"><i class="icon-close"></i> Hủy</a>
                            </div>
                        </form>
                    </div></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="social">
                    <div class="col-md-6"><div class="row">
                        <form data-toggle="validator" novalidate="true" method="post" action="otadmin/system/socials" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Fanpage</label>
                                <textarea class="form-control" name="fanpage" rows="5"><?php if(isset($socials['fanpage']) && $socials['fanpage']!=''){ echo $socials['fanpage']; }?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="control-label">Facebook</label>
                                <input type="text" class="form-control" name="facebook" id="facebook" value="<?php if(isset($socials['facebook']) && $socials['facebook']!=''){ echo $socials['facebook']; }?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="control-label">Twitter</label>
                                <input type="text" class="form-control" name="twitter" id="twitter" value="<?php if(isset($socials['twitter']) && $socials['twitter']!=''){ echo $socials['twitter']; }?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="control-label">Linkedin</label>
                                <input type="text" class="form-control" name="linkedin" id="linkedin" value="<?php if(isset($socials['linkedin']) && $socials['linkedin']!=''){ echo $socials['linkedin']; }?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="control-label">Instagram</label>
                                <input type="text" class="form-control" name="instagram" id="instagram" value="<?php if(isset($socials['instagram']) && $socials['instagram']!=''){ echo $socials['instagram']; }?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="control-label">Youtube</label>
                                <input type="text" class="form-control" name="youtube" id="youtube" value="<?php if(isset($socials['youtube']) && $socials['youtube']!=''){ echo $socials['youtube']; }?>">
                            </div>
                            <div class="clear height20"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cập nhật</button>
                                <a href="<?php echo $path_url;?>index" class="btn btn-success"><i class="icon-close"></i> Hủy</a>
                            </div>
                        </form>
                    </div></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="googles">
                    <div class="col-md-6"><div class="row">
                        <form data-toggle="validator" novalidate="true" method="post" action="otadmin/system/google" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Google Analytics</label>
                                <input type="text" class="form-control" name="analytics" id="analytics" value="<?php if(isset($googles['analytics']) && $googles['analytics']!=''){ echo $googles['analytics']; }?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="control-label">Webmasters tools</label>
                                <input type="text" class="form-control" name="webmasters" id="webmasters" value="<?php if(isset($googles['webmasters']) && $googles['webmasters']!=''){ echo $googles['webmasters']; }?>">
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="control-label">Sitemaps</label> (<a href="sitemap.xml" target="_blank">Sitemap.xml</a>)
                                <input type="file" class="form-control" name="sitemaps" id="sitemaps" value="<?php if(isset($googles['sitemaps']) && $googles['sitemaps']!=''){ echo $googles['sitemaps']; }?>">
                            </div>

                            <div class="clear height20"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cập nhật</button>
                                <a href="<?php echo $path_url;?>index" class="btn btn-success"><i class="icon-close"></i> Hủy</a>
                            </div>
                        </form>
                    </div></div>
                </div>
                <div role="tabpanel" class="tab-pane" id="registerCus">
                    <div class="col-md-6"><div class="row">
                        <form data-toggle="validator" novalidate="true" method="post" action="otadmin/system/registerCus" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox checkbox-danger">
                                        <input <?php if($registerCus['active_register'] == 1){ ?> checked=""  <?php } ?> id="checkbox6" type="checkbox" name="active_register" value="1">
                                        <label for="checkbox6"> Yêu cầu active tài khoản khi đăng ký </label>
                                    </div>
                                </div>
                            </div>

                            <div class="clear height20"></div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Cập nhật</button>
                                <a href="<?php echo $path_url;?>index" class="btn btn-success"><i class="icon-close"></i> Hủy</a>
                            </div>
                        </form>
                    </div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="public/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<!-- Sweet-Alert  -->
<script src="public/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="public/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // block tabs reload
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
        // Basic
        var drEvent = $('#image').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            var image_name = element.file.name;
            swal({title: "Are you sure?",showCancelButton: true, }
                , function(isConfirm){
                    if (isConfirm) {
                        $.ajax
                        ({
                            method: "POST",
                            url: "<?php echo $path_url;?>delete_image",
                            data: { image:image_name},
                        });
                    }

                });
        });
        // Basic
        var drEvent2 = $('#image2').dropify();
        drEvent2.on('dropify.beforeClear', function(event, element) {
            var image_name2 = element.file.name;
            swal({title: "Are you sure?",showCancelButton: true, }
                , function(isConfirm){
                    if (isConfirm) {
                        $.ajax
                        ({
                            method: "POST",
                            url: "<?php echo $path_url;?>delete_image2",
                            data: { image2:image_name2},
                        });
                    }

                });
        });
    });
</script>
