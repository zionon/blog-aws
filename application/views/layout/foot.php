<footer class="footer">
	<div class="container">
		<p class="pull-left">Page rendered in <strong>{elapsed_time}</strong> seconds.&nbsp&nbsp&nbsp&nbsp</p>
        <p class="pull-right">&nbsp;&nbsp;Powered by <a href="http://www.codeigniter.com" rel="external">CodeIgniter Framework</a></p>
        <p class="pull-right">Thanks <a href="http://www.yiiframework.com">yii2</a></p>
	</div>
</footer>

</body>
</html>

<script type="text/javascript">
	jQuery(document).ready(function () {
		jQuery.ajax({
			type : "GET",
			url : "<?=site_url('CommentController/commentStatus')?>",
			dataType : "json",
			success : function(data){
				jQuery('#comment-status-num').text(data);
			}
		});

		jQuery.ajax({
			type : "GET",
			url : "<?=site_url('ReplyController/replyStatus')?>",
			dataType : "json",
			success : function(data){
				jQuery('#reply-status-num').text(data);
			}
		});

	});
</script>