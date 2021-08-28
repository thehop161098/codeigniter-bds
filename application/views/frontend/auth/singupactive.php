<div class="cartNotify text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img src="public/images/icon/success.png" width="120">
				<?php $message_flashdata = $this->session->flashdata('message_flashdata'); {?>
					<?php if(isset($message_flashdata) && count($message_flashdata)) {?>
						<?php if($message_flashdata['type'] == 'sucess') {?>
							<h3><?=$message_flashdata['message']; ?></h3>
							<p style="color: red">Hãy đăng nhập thông tin để cập nhật tài khoản</p>
						<?php } else{?>
							<h3><?=$message_flashdata['message']; ?></h3>
						<?php } ?>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
