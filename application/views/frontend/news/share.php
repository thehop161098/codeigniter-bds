<div class="boxShare clearfix">
	<div class="box">
		<strong>Chia sẻ tin này: </strong>
		<a  class="share" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?=base_url()?><?=$alias?>"><i class="fab fa-facebook-square"></i></a>
		<a target="_blank" href="https://twitter.com/intent/tweet?url=<?=base_url()?><?=$alias?>" class="share btn_twitter"><i class="fab fa-twitter-square"></i></a>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.share').click(function() {
			var NWin = window.open($(this).prop('href'), '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=800');
			if (window.focus)
			{
				NWin.focus();
			}
			return false;
		});
	});
</script>