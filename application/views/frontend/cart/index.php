<link rel="stylesheet" type="text/css" href="public/css/cart.css">
<?php $this->load->view('frontend/layout/breadcrumb'); ?>
<div class="row">
	<h4 class="widget-title-cart"><?php echo $title;?></h4>
	<?php if(isset($dataCart) && $dataCart != NULL){ ?>
		<table id="cart_summary" class="table table-bordered stock-management-on">
			<thead>
				<tr>
					<th class="cart_product text-center">Hình ảnh</th>
					<th class="cart_description text-center item">Tên sản phẩm</th>
					<th class="cart_unit item text-center price">Giá tiền</th>
					<th class="cart_quantity text-center item qty">Số lượng</th>
					<th class="cart_delete text-center last_item remove">Xóa</th>
				</tr>
			</thead>
			<tfoot>
				<tr class="cart_total_price summary">
					<td colspan="3" class="total_price_container_right text-right">
						<span>Tổng cộng</span>
					</td>
					<td colspan="2" class="price" id="total_price_container">
						<span><b id="subtotals"><?php echo number_format($subTotal);?></b> VNĐ</span>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($dataCart as $key_dataCart => $val_dataCart) { ?>
					<tr class="cart_item">
						<td style="width: 100px;" class="cart_product image">
							<img class="img-responsive" src="upload/product/thumb/<?php echo $val_dataCart['options']['Image'];?>">
						</td>
						<td class="cart_description text-center">
							<p class="product-name">
								<a href="">
									<strong><?php echo $val_dataCart['name'];?></strong><br>
								</a>
							</p>
						</td>
						<td class="cart_unit text-center" data-title="Unit price">
							<span class="price" id="product_price_10_327_0">
								<span class="price"><?php echo number_format($val_dataCart['price']);?> VNĐ</span>
							</span>
						</td>
						<td style="width: 100px;" class="qty cart_quantity text-center" data-title="Quantity">
							<select onchange="updateQty(this,'<?php echo $val_dataCart['rowid'];?>',<?php echo $val_dataCart['price'];?>);">
								<?php for($i = 1;$i <= 10; $i++){ ?>
									<option <?php if($val_dataCart['qty'] == $i){ ?> selected <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</td>
						<td class="cart_delete text-center" data-title="Delete">
							<div>
								<a href="delete-cart.html?id=<?php echo $val_dataCart['rowid'];?>"><i class="fa fa-trash-o"></i></a>
							</div>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="buttons order-button clearfix">
			<a href="payment.html" class="button btn standard-checkout btn-md icon-right">Thanh toán</a>
			<div class="order-continute" style="float: left;">
				<a href="">
					<i class="fa fa-reply"></i> Tiếp tục mua hàng</a>
			</div>
		</div>
	<?php }else{ ?>
		<div class="notifyCartEmpty">
			<p>Giỏ hàng rỗng</p>
			<img src="public/images/icon/cart-empty.png" width="120">
		</div>
	<?php } ?>
</div>
<script type="text/javascript">
	function updateQty(qty,id,price){
		qty = qty.value;
		if(qty){
			$.ajax
			({
				method: "POST",
				url: "cart/updateCart",
				data: { qty:qty,rowid:id,price:price},
				dataType: "json",
				success: function(data){
					if(data.rs == 1){
						$('#subtotal'+id).html(data.subTotal);
						$('#subtotals').html(data.subTotals);
					}
				}
			});
		}
	}
</script>
