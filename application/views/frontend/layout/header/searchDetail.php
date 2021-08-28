<div class="wpSearch">
	<div class="container">
		<form role="search" method="GET" action="tim-kiem-bds.html">
			<div class="contents clearfix">
				<div class="choose-cate clearfix">
					<?php if(isset($category) && ! empty($category)) { ?>
						<?php foreach ($category as $key_category => $val_category) {
							$classActiveCate = $key_category == 0 ? 'active' : '';
						?>
							<a id="selectCate<?=$val_category['id']; ?>" href="javascript:void(0)" onclick="chooseTypeBDS(<?=$val_category['id']; ?>),selectGround(<?=$val_category['id']; ?>)" class="chooseType chooseType<?=$val_category['id']; ?> <?=$classActiveCate;?>"><?=$val_category['name']; ?></a>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="box">
					<div class="row">
						<div class="col-md-10 col-sm-9">
							<div class="item">
								<input type="hidden" id="type" name="cate_parent" value="<?=$category[0]['id']; ?>">
								<input type="hidden" name="direction_id" value="0">
								<input type="text" value="<?=isset($_GET['s_keybds'])?$_GET['s_keybds']:''?>" name="s_keybds" placeholder="Từ khóa">
							</div>
						</div>
						<div class="col-md-2 col-sm-3 hidden-xs">
							<button type="submit">Tìm kiếm</button>
						</div>
					</div>
				</div>
				<div class="box-sel">
					<div class="item-sel">
						<select name="cateid" id="cateid">
							<option value="">Chọn loại nhà đất</option>
						</select>
					</div>
					<div class="item-sel">
						<select name="city_id" id="city_id">
							<?php if(isset($city) && ! empty($city)) { ?>
								<option value="">Chọn Tỉnh/thành</option>
								<?php foreach ($city as $key_city => $val_city) {?>
									<option value="<?=$val_city['id']?>"><?=$val_city['name'] ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
					<div class="item-sel">
						<select name="district_id" id="district_id">
							<option value="">Chọn Quận/Huyện</option>
						</select>
					</div>
					<div class="item-sel">
						<select name="ward_id" id="ward_id">
							<option>Chọn Phường/Xã</option>
						</select>
					</div>
					<div class="item-sel">
						<select name="price_min" id="price_min">
							<?php if(isset($searchPrice) && ! empty($searchPrice)) { ?>
								<option value="">Giá thấp nhất</option>
								<?php foreach ($searchPrice as $key_searchPrice => $val_searchPrice) {?>
									<option value="<?=$val_searchPrice['price']?>"><?=$val_searchPrice['name'] ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
					<div class="item-sel">
						<select name="price_max" id="price_max">
							<?php if(isset($searchPrice) && ! empty($searchPrice)) { ?>
								<option value="">Giá cao nhất</option>
								<?php foreach ($searchPrice as $key_searchPrice => $val_searchPrice) {?>
									<option value="<?=$val_searchPrice['price']?>"><?=$val_searchPrice['name'] ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="clear hidden-lg hidden-md hidden-sm"></div>
				<div class="box">
					<div class="row">
						<div class="col-md-2 col-sm-3 hidden-lg hidden-md hidden-sm">
							<button type="submit">Tìm kiếm</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" src="public/js/searchDetail.js"></script>