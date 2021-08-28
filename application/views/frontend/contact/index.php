<link rel="stylesheet" type="text/css" href="public/css/contact.css">
<div class="page-contact">
	<div class="container">
		<div class="row">
			<div class="Showroom_list clearfix">
				<div class="col-md-9 col-sm-8 col-xs-12">
					<div class="showroom_iframe">
						<?php if(isset($data['allMap']) && ! empty($data['allMap'])) { ?>
							<iframe class="gg_iframe" src="<?=$data['allMap'][0]['link']?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="showroom_category">
						<h4>Chọn tỉnh thành</h4>
						<div class="showroom_select">
							<select class="change_addr">
								<option value="all">Tất cả</option>
								<?php if(isset($data['allAddress']) && ! empty($data['allAddress'])) { ?>
									<?php foreach ($data['allAddress'] as $key_address => $val_address) {?>
										<option value="mapshowroom<?=$val_address['id'] ?>"><?=$val_address['name'] ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="showroom_addr_wrapper">
							<div class="showroom_addr_dteail all">
								<ul class="">
									<?php if(isset($data['allMap']) && ! empty($data['allMap'])) { ?>
										<?php foreach ($data['allMap'] as $key_allMap => $val_allMap) {?>
											<li>
												<a href="javascript:void(0)" onclick="changeMap('<?=$val_allMap['link']?>')">
													<b><?=$val_allMap['name']?></b>
													<div><?=$val_allMap['des']?></div>
													<div>
														<?php if($val_allMap['phone'] != '') { ?>
															SĐT: <span class="contact-phone"><?=$val_allMap['phone']?></span>
														<?php } else { ?>
															SĐT: <span class="contact-phone">Đang cập nhật</span>
														<?php } ?>
													</div>
												</a>
											</li>
										<?php } ?>
									<?php } ?>
								</ul>
							</div>
							<?php if(isset($data['allAddress']) && ! empty($data['allAddress'])) { ?>
								<?php foreach ($data['allAddress'] as $key_address => $val_address) {?>
									<?php if(! empty($val_address['child'])) { ?>
										<div id="mapshowroom<?=$val_address['id']?>" class="showroom_addr_dteail mapshowroom<?=$val_address['id']?>" style="display: none">
											<?php if(!empty($val_address['child'])) { ?>
												<ul class="">
													<?php foreach ($val_address['child'] as $key_addressChild => $val_addressChild) {?>
														<li>
															<a href="javascript:void(0)" onclick="changeMap('<?=$val_addressChild['link']?>')">
																<b><?=$val_addressChild['name']?></b>
																<div><?=$val_addressChild['des']?></div>
																<div>
																	<?php if($val_addressChild['phone'] != '') { ?>
																		SĐT: <span class="contact-phone"><?=$val_addressChild['phone']?></span>
																	<?php } else { ?>
																		SĐT: <span class="contact-phone">Đang cập nhật</span>
																	<?php } ?>
																</div>
															</a>
														</li>
													<?php } ?>
												</ul>
											<?php } ?>
										</div>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<h3 class="TitleContact">Liên hệ với chúng tôi</h3>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
				<div class="contents">
					<form accept-charset="UTF-8" action="lien-he.html" id="contactForm" class="contact-form" method="post">
						<div class="form-group">
							<input type="text" placeholder="Họ và tên" class="form-control formHeight" id="name" name="Contact[name]" value="<?= isset($datas['name']) ? $datas['name'] : '' ?>">
							<small class="text-red"><?= isset($errors['name']) ? $errors['name'] : '' ?></small>
						</div>
						<div class="form-group">
							<input type="number" class="form-control" id="phone" placeholder="Điện thoại" name="Contact[phone]" value="<?= isset($datas['phone']) ? $datas['phone'] : '' ?>">
							<small class="text-red"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></small>
						</div>
						<div class="form-group">
							<input type="text" placeholder="Email" class="form-control formHeight" id="email" name="Contact[email]" value="<?= isset($datas['email']) ? $datas['email'] : '' ?>">
							<small class="text-red"><?= isset($errors['email']) ? $errors['email'] : '' ?></small>
						</div>
						<div class="form-group">
							<textarea placeholder="Nội dung" class="form-control" name="Contact[description]" rows="7"><?= isset($datas['description']) ? $datas['description'] : '' ?></textarea>
							<small class="text-red"><?= isset($errors['description']) ? $errors['description'] : '' ?></small>
						</div>
						<div class="form-group BtnGui">
							<button type="submit" class="submitGui">Gửi liên hệ</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	<?php $message_flashdata = $this->session->flashdata('message_flashdata');
	if(isset($message_flashdata) && count($message_flashdata)){ ?>
		<?php if($message_flashdata['type'] == 'sucess'){?>
			toastr.success('<?php echo $message_flashdata['message']; ?>');
			<?php
		}else if($message_flashdata['type'] == 'error'){
			?>
			toastr.error('<?php echo $message_flashdata['message']; ?>');
			<?php
		} ?>
	<?php } ?>
	///////
	function changeMap(src_map) {
		$('.gg_iframe').attr("src",src_map);
	}
</script>
