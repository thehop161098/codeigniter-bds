<link rel="stylesheet" type="text/css" href="public/css/cart.css">
<div class="row">
	<div class="wp_cart">
		<div class="container">
			<div class="row">
				<div class="boxThanhToan clearfix">
					<div class="title_thanhtoan"><?php echo $title;?></div>
					<div class="section-header">
						<h2 class="section-title">Thông tin giao hàng</h2>
					</div>
					<form action="" method="post">
						<div class="col-md-7 col-sm-6 infoUser">
							<div class="fieldset">
								<div class="field field-show-floating-label">
									<div class="field-input-wrapper">
										<label class="field-label" for="billing_address_full_name">Họ và tên</label>
										<input name="fullname" value="<?php echo $infoUser['fullname'];?>" required="" oninvalid="this.setCustomValidity('Vui lòng nhập họ tên')" oninput="setCustomValidity('')" placeholder="Họ và tên" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text">
									</div>
								</div>
								<div class="field field-required field-two-thirds  field-show-floating-label">
									<div class="field-input-wrapper">
										<label class="field-label" for="checkout_user_email">Email</label>
										<input name="email" value="<?php echo $infoUser['email'];?>" required="" oninvalid="this.setCustomValidity('Vui lòng nhập email')" oninput="setCustomValidity('')" placeholder="Email" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="email" >
									</div>
								</div>
								<div class="field field-required field-third  field-show-floating-label">
									<div class="field-input-wrapper">
										<label class="field-label" for="billing_address_phone">Số điện thoại</label>
										<input type="number" min="0" name="phone" value="" placeholder="Số điện thoại" required="" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')" oninput="setCustomValidity('')" placeholder="Số điện thoại" autocapitalize="off" spellcheck="false" class="field-input" size="30" maxlength="11">
									</div>
								</div>
								<div class="field   field-show-floating-label">
									<div class="field-input-wrapper">
										<label class="field-label" for="billing_address_address1">Địa chỉ</label>
										<input name="street" value="" placeholder="Nhập địa chỉ" required="" oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ')" oninput="setCustomValidity('')" placeholder="Địa chỉ" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text">
									</div>
								</div>
								<div class="field field-required field-two-thirds  field-show-floating-label">
									<div class="field-input-wrapper">
										<label class="field-label" for="checkout_tinhthanh">Tỉnh thành</label>
										<input name="city" required="" oninvalid="this.setCustomValidity('Vui lòng nhập tỉnh thành')" oninput="setCustomValidity('')" placeholder="Tỉnh thành" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" >
									</div>
								</div>
								<div class="field field-required field-two-thirds  field-show-floating-label">
									<div class="field-input-wrapper">
										<label class="field-label" for="checkout_tinhthanh">Quận huyện</label>
										<input name="quan" required="" oninvalid="this.setCustomValidity('Vui lòng nhập quận/huyện')" oninput="setCustomValidity('')" placeholder="Quận huyện" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" >
									</div>
								</div>
							</div>
							<button type="submit" class="btnCart">Thanh Toán</button>
						</div>
						<div class="col-md-5 col-sm-6">
							<div class="PayCart">
								<?php if(isset($data_index['numberOrder']) && $data_index['numberOrder']!= NULL){?>
									<div class="row">
										<div class="boxProCart clearfix">
											<?php foreach ($data_index['numberOrder'] as $key_proCart => $val_proCart) {?>
												<div class="boxSubProCart clearfix" style="margin-bottom: 10px;">
													<div class="col-md-2" style="padding-left: 0px">
														<img class="img-responsive" src="upload/product/thumb/<?=$val_proCart['options']['Image']?>" alt="">
													</div>
													<div class="col-md-10">
														<h4><?=$val_proCart['name']?></h4>
														<p>Giá: <?=$val_proCart['price']?>VNĐ</p>
														<p>Số lượng: x<?=$val_proCart['qty']?></p>
													</div>
												</div>
												<?php if(($key_proCart + 1) % 1 == 0){ ?><div class="clear"></div><?php } ?>
											<?php } ?>
										</div>
										<div class="giatam clearfix">
											<div class="subgiatam clearfix">
												<div class="col-md-6" style="padding-left: 0px">Tạm tính</div>
												<div class="col-md-6 text-right" style="padding-right: 0px"><?php echo number_format($data_index['subTotal']);?></b> VNĐ</div>
											</div>
											<div class="subphivanchuyen clearfix">
												<div class="col-md-6" style="padding-left: 0px">Phí vận chuyển</div>
												<div class="col-md-6 text-right" style="padding-right: 0px">—</div>
											</div>
										</div>
										<div class="SubtotalPay">
											<div class="col-md-6 subtotalpayment">Tổng cộng</div>
											<div class="col-md-6 text-right valSubtotal" style="padding-right: 0px"><?php echo number_format($data_index['subTotal']);?></b> VNĐ</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
