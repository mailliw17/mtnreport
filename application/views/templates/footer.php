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

<!-- Script For PWA -->
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('service-worker.js')
            .then(function(registration) {
                console.log('Registration successful, scope is:', registration.scope);
            })
            .catch(function(error) {
                console.log('Service worker registration failed, error:', error);
            });
    }
</script>

<!-- Date Range picker -->
<script src="<?= base_url() ?>vendor/range-datepicker/moment.min.js"></script>
<script src="<?= base_url() ?>vendor/range-datepicker/daterangepicker.min.js"></script>
<script>
    $(function() {
        $('input[name="range_tanggal"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('input[name="range_tanggal"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('input[name="range_tanggal"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script>



<script>
    $('.mydatatable').DataTable({

    });
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
                        <a href="<?= base_url() ?>admin" class="btn btn-success"><i class="fas fa-envelope-open-text"></i> Laporan Keseluruhan</a>
                        <hr>
                        <a href="<?= base_url() ?>admin/tambaharea" class="btn btn-danger"><i class="far fa-plus-square"></i> Tambah Area</a>
                        <hr>
                        <a href="<?= base_url() ?>auth/kelolaakun" class="btn btn-warning"><i class="fas fa-user-friends"></i> Akun Teknisi</a>
                        <hr>
                        <a href="<?= base_url() ?>laporan" class="btn btn-info"><i class="fas fa-file-download"></i> Download Laporan</a>
                        <hr>
                        <a href="<?= base_url() ?>tracking" class="btn btn-secondary"><i class="fab fa-searchengin"></i> Tracking Teknisi</a>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>