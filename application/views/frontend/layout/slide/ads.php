<?php if(isset($policy) && $policy != NULL){ ?>
<div class="slide_ads">
	<div class="title">AUSHOP SERVICE</div>
	<?php foreach ($policy as $key_policy => $val_policy) { ?>
	<div class="col-md-6">
		<div class="item">
			<div class="box_img">
				<img src="upload/ads/<?php echo $val_policy['image'];?>">
			</div>
			<h4><?php echo $val_policy['name'];?></h4>
		</div>
	</div>
	<?php } ?>
</div>
<?php } ?>
<style type="text/css">
	.slide_ads{
		border: 1px solid #e5e5e5;
    	min-height: 365.5px;
	}
	.slide_ads .title{
		text-align: center;
		line-height: 40px;
		border-bottom: 1px solid #e5e5e5;
		margin: 0px 0px 15px 0px;
		color: #104c79;
		font-family: 'Roboto', sans-serif;
    	font-weight: 700;
	}
	.slide_ads .item{
		text-align: center;
		margin: 0px 0px 15px 0px;
	}
	.slide_ads .item .box_img{
		width: 70px;
		height: 70px;
		background-color: #104c79;
		border-radius: 100%;
		text-align: center;
	}
	.slide_ads .item .box_img img{
		width: 80%;
		margin: 5px 0px 0px 0px;
	}
	.slide_ads .item h4{
		font-size: 14px;
	}
</style>