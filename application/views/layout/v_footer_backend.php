</div>
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url()."template/plugins/jquery/jquery.min.js"?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()."template/plugins/bootstrap/js/bootstrap.bundle.min.js"?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()."template/dist/js/adminlte.min.js" ?>"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
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
<script>
  window.setTimeout(function(){
    $('.alert').fadeTo(500,0).slideUp(500,function(){
      $(this).remove();
    })
  },2000);
</script>
</body>
</html>
