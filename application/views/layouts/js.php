<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/stisla/download_js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/download_js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/download_js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/download_js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/download_js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/download_js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/download_js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/stisla/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/download_js/sweet-alert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/js/jquery.mask.js"></script>
<script src="<?php echo base_url(); ?>assets/stisla/js/bootstrap-datepicker.js"></script>

<!-- Agar input tidak ada history -->
<script>
    $("form :input").attr("autocomplete", "off");
</script>
<!-- Format Rupiah -->
<script src="<?php echo base_url(); ?>assets/stisla/js/jquery.mask.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.rupiah').mask('000.000.000', {
            reverse: true
        });
        $('.hp').mask('000000000000000');
    })
</script>
<script>
    var date = new Date();
    date.setDate(date.getDate() + 1);

    $('#datepicker').datepicker({
        startDate: date
    });
</script>

<script>
    // $('#dataTables').DataTable({
    //     ordering: false
    // });
    // $('.tanggal').datetimepicker({
    //     format: 'YYYY-MM-DD'
    // });
    // $('.waktu').datetimepicker({
    //     format: 'HH:mm'
    // });
    $('.dataTables').DataTable({
        ordering: false
    });

    // function goBack() {
    //     window.history.back();
    // }
</script>