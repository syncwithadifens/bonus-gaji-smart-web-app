<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>js/adminlte.min.js"></script>

<!-- Auto-disappear Alert -->
<script>
	$(document).ready(function() {
		// show the alert
		setTimeout(function() {
			$(".alert").alert('close');
		}, 2000);
	});
</script>

</body>
</html>