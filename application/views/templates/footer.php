<!-- <footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our </p>
    </div>
</footer> -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>vendor/jquery/popper.min.js"></script>
<script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>vendor/fontawesome/js/all.min.js"></script>
<script src="<?= base_url() ?>vendor/datatables/jquery.dataTables.min.js"></script>
<!-- <script src="<?= base_url() ?>vendor/datepicker/jquery-ui.js"></script> -->
<!-- <script>
    $(function() {
        $("#datepicker").datepicker();
    });
</script> -->
<script>
    $('.mydatatable').DataTable();
</script>

<!-- Modal Menu -->
<div class="modal fade bd-example-modal-sm" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pilihan Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <a href="<?= base_url() ?>admin/tambaharea" class="btn btn-danger"><i class="far fa-plus-square"></i> Tambah Area</a>
                        <hr>
                        <a href="<?= base_url() ?>admin" class="btn btn-success"><i class="fas fa-envelope-open-text"></i> Laporan Kerja</a>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>