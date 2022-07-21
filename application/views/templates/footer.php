<footer class="main-footer">
  <strong>&copy; <?= date('Y'); ?></strong> AdifensTeam
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> Latest
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Klik "Logout" untuk keluar.</div>
      <div class="modal-footer">
        <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/') ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/') ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(function() {
    $("#table_id").DataTable({
      "responsive": false,
      "autoWidth": false,
      "scrollX": true,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Auto-disappear Alert -->
<script>
  $(document).ready(function() {
    // show the alert
    setTimeout(function() {
      $(".alert").alert('close');
    }, 2500);
  });
</script>

<!-- ChartJs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
  <?php
  $jAlt = $jmlAlt;
  $jLayak = $jmlLayak;
  $jTdkLayak = $jmlTdkLayak;
  ?>

  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
      labels: ['Data Semua Karyawan', 'Karyawan yang mendapat bonus', 'Karyawan yang tidak mendapat bonus'],
      datasets: [{
        label: 'Total Data',
        backgroundColor: 'teal',
        borderColor: 'black',
        data: [<?= $jAlt ?>, <?= $jLayak ?>, <?= $jTdkLayak ?>, 0]
      }]
    },

    // Configuration options go here
    options: {}
  });
</script>

<!-- Timestamp -->
<!-- <script>
// Function ini dijalankan ketika Halaman ini dibuka pada browser
$(function(){
setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
});
 
//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
function timestamp() {
$.ajax({
url: '<?= base_url('assets/ajax_timestamp.php') ?>',
success: function(data) {
$('#timestamp').html(data);
},
});
}
</script> -->
</body>

</html>