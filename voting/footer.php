<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>Version</b> 1.0.1
	</div>
	<strong>Copyright &copy; <?= date('Y') ?> <a href="http://mrj20net.blogspot.com">Julian Official</a>.</strong> All rights
	reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<script src="../assets/js/aos.js"></script>
<script>
	function angka(evt){
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode <48 || charCode >57))
			return false;
		return true;
	}
</script>
<script type="text/javascript">
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
</script>
<script>
	AOS.init();
</script>
<script>
	$(document).ready(function){
		$("#fade").fadeIn("slow");
	});
</script>
<script>
  var otomatis = setInterval(
    function(){
      $('#oto').load('isi.php').fadeIn("slow");
    },1000);
</script>
</body>
</html>