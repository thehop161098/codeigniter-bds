<!DOCTYPE html>
<html lang="vi">
<head>
	<base href="<?php echo site_url(); ?><?php echo isset($url)?$url:'';?>" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="canonical" href="<?= site_url() ?><?= isset($alias) ? $alias : '' ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index,follow,snippet,archive" />
	<title><?php echo $title;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="upload/system/thumb/<?php echo $data_index['system']['thumb'];?>">
	<meta name="google-site-verification" content="<?php echo $data_index['googles']['webmasters'];?>" />
	<meta name="keywords" content="<?php echo isset($keyword)?$keyword:''; ?>" />
	<meta name="description" content="<?php echo isset($description)?$description:''; ?>" />
	<meta property="og:title" content="<?= isset($title) ? $title : '' ?>"/>
	<meta property="og:url" content="<?= site_url() ?><?= isset($alias) ? $alias : '' ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?= site_url() ?><?= isset($image) ? $image : '' ?>" />
	<meta property="og:description" content="<?= isset($description) ? $description : '' ?>" />
	<meta property="fb:app_id" content="1993308630783927"/>
	<meta http-equiv="content-language" content="vi" />
	<?php echo $data_index['system']['schema'];?>
	<meta http-equiv="REFRESH" content="1800" />
	<meta name="geo.region" content="VN" />
	<meta name="geo.placename" content="Hồ Ch&iacute; Minh" />
	<meta name="geo.position" content="10.776435;106.601245" />
	<meta name="ICBM" content="10.776435, 106.601245" />
	<meta name="msvalidate.01" content="4A122E1D7BE2BEA01E640C985860E165" />
	<link rel="stylesheet" href="public/css/mystyle.css">
	<script src="public/js/jquery.min.js"></script>
</head>
<body>
	<div class="fullMain">
		<?php $this->load->view('frontend/layout/header'); ?>
		<!-- MainContent -->
		<div class="main">
			<?php $this->load->view('frontend/layout/breadcrumb'); ?>
			<!-- Main Page -->
			<?php
				if(isset($template) && !empty($template)){
					$this->load->view($template, isset($data)?$data:NULL);
				}
			?>
		</div>
		<div class="maincontent">
			<?php if($data_index['crt'] == 'home'){ ?>
				<div class="clear"></div>
				<div class="main">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<?php $this->load->view('frontend/home/newsHome'); ?>
								<?php $this->load->view('frontend/home/bdsHot'); ?>
								<div class="clear"></div>
								<?php $this->load->view('frontend/home/bdsHome'); ?>
							</div>
							<div class="col-md-3 hidden-sm">
								<?php $this->load->view('frontend/layout/sidebar'); ?>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>
		</div>
		<!-- EndMainContent -->
		<!-- Footer -->
		<?php $this->load->view('frontend/layout/footer'); ?>
		<!-- EndFooter -->
		<?php $this->load->view('frontend/auth/modalAuth'); ?>
	</div>
	<?php /*$this->load->view('frontend/layout/hotline/type');*/ ?>
	<link href="public/fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="public/js/toastr/toastr.min.css">
	<script type="text/javascript" src="public/js/toastr/toastr.min.js"></script>
	
	<script src="public/js/jquery.lazy.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<!-- reponsive -->
	<link rel="stylesheet" type="text/css" href="public/css/responsive.css">
	<!-- slick-->
	<link rel="stylesheet" type="text/css" href="public/js/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="public/js/slick/slick-theme.css"/>
	<script type="text/javascript" src="public/js/slick/slick.min.js"></script>
	<script type="text/javascript" src="public/js/slick/slick-animation.js"></script>
	
	<script type="text/javascript" src="public/js/loginNews.js"></script>
	<script type="text/javascript" src="public/js/myscript.js"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', '<?php echo $data_index['googles']['analytics'];?>', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>
