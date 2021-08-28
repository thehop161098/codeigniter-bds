<div class="boxSearch hidden-xs">
	<div class="item">
		<form role="search" method="GET" action="tim-kiem.html">
			<input type="text" required="" requiredmsg="Nhập từ khóa..." placeholder="Nhập từ khóa..." value="<?=isset($_GET['s_keyword'])?$_GET['s_keyword']:''?>" name="s_keyword">
			<button type="submit"></button>
		</form>
	</div>
</div>