<div class="col-md-4 col-sm-4">
	<div class="menuFooter">
		<div class="title">NHÀ ĐẤT BÁN</div>
		<ul>
			<?php if(isset($data_index['listCity']) && ! empty($data_index['listCity'])) { ?>
				<?php foreach ($data_index['listCity'] as $key_city => $val_city) { ?>
					<li><a href="nha-dat-ban/tai/<?=$val_city['alias']; ?>"><?=$val_city['name']; ?></a></li>
				<?php } ?>
			<?php } ?>
		</ul>
	</div>
</div>
<div class="col-md-4 col-sm-4">
	<div class="menuFooter">
		<div class="title">NHÀ ĐẤT CHO THUÊ</div>
		<ul>
			<?php if(isset($data_index['listCity']) && ! empty($data_index['listCity'])) { ?>
				<?php foreach ($data_index['listCity'] as $key_city => $val_city) { ?>
					<li><a href="nha-dat-cho-thue/tai/<?=$val_city['alias']; ?>"><?=$val_city['name']; ?></a></li>
				<?php } ?>
			<?php } ?>
		</ul>
	</div>
</div>