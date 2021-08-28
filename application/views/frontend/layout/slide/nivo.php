<?php if(isset($data_index['slide']) && $data_index['slide'] != NULL){ ?>
<!-- nivoslide css-->
<link rel="stylesheet" href="public/css/animate.css">
<link rel="stylesheet" href="public/js/nivoslide/nivo-slider.css" type="text/css" media="screen" />
<div class="nivoSlider">
    <div id="slider" class="">
    	<?php foreach ($data_index['slide'] as $key_slide => $val_slide) { ?>
	    	<img src="upload/slide/<?php echo $val_slide['image'];?>" data-thumb="upload/slide/<?php echo $val_slide['image'];?>" alt="<?php echo $val_slide['name'];?>" title="#htmlcaption<?php echo $key_slide;?>" />
    	<?php } ?>
    </div>
    <?php /* foreach ($data_index['slide'] as $key_slide => $val_slide) { ?>
    <div id="htmlcaption<?php echo $key_slide;?>" class="nivo-html-caption">
        <h2><?php echo $val_slide['name'];?></h2>
        <p><?php echo $val_slide['des'];?></p>
        <?php if($val_slide['text_link'] != ''){ ?>
            <a href="<?php echo $val_slide['link'];?>"><?php echo $val_slide['text_link'];?></a>
        <?php } ?>
    </div>
    <?php } */ ?>
</div>
<?php } ?>
<style type="text/css">
	.nivo-caption{
		position: absolute;
		top: 0px;
		left: 0px;
		z-index: 9999;
	}
</style>