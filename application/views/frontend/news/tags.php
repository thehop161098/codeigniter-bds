<?php if(isset($tags) && $tags != NULL){ ?>
<div class="boxTags">
	<ul>
		<li><strong>Tags:</strong></li>
		<?php foreach ($tags as $key_tags => $val_tags) { ?>
			<li><a href="tags/<?php echo $val_tags['alias'];?>" title="<?php echo $val_tags['name'];?>"><?php echo $val_tags['name'];?></a></li>
		<?php } ?>
	</ul>
</div>
<?php } ?>