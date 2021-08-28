<!-- Modal -->
<div id="myLogin" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg modalLogin">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body clearfix">
				<div class="col-md-6 col-sm-6">
					<div class="login">
						<?php $this->load->view('frontend/auth/singin'); ?>
						<?php $this->load->view('frontend/auth/forgetpass'); ?>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<?php $this->load->view('frontend/auth/singup'); ?>
				</div>
			</div>
		</div>
	</div>
</div>