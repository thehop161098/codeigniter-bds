<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#contents">Thông tin sản phẩm</a></li>
  <li><a data-toggle="tab" href="#comments">Bình luận</a></li>
</ul>
<div class="tab-content clearfix">
  <div id="contents" class="tab-pane fade in active">
    <div class="col-md-12">
      <?php echo $newsLand['content'];?>
    </div>
  </div>
  <div id="comments" class="tab-pane fade">
    <div class="col-md-12">
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=1278056805570815&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
      <div class="fb-comments" data-href="<?php echo $newsLand['alias'];?>.html" data-width="100%" data-numposts="5"></div>
    </div>
  </div>
</div>