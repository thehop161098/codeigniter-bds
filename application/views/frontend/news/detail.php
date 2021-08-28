<div class="clear"></div>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<?php if(isset($news) && ! empty($news)) { ?>
				<div class="wpNewsDetail">
					<h1 class="title"><span><?=$news['name']; ?></span></h1>
					<div class="clearfix"></div>
					<div class="contents">
						<?php $this->load->view('frontend/news/share'); ?>
						<h2 class="des"><?=$news['des']; ?></h2>
						<div class="boxContents">
							<?=$news['content']; ?>
						</div>
						<?php $this->load->view('frontend/news/share'); ?>
					</div>
				</div>
			<?php } ?>
			<div class="clear"></div>
			<?php $this->load->view('frontend/news/same'); ?>
		</div>
		<div class="col-md-3 hidden-sm">
			<?php $this->load->view('frontend/news/sidebar'); ?>
		</div>
		<link rel="stylesheet" type="text/css" href="public/css/news.css">
	</div>
</div>