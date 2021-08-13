<div class="container mt-3">
    <center>
        <h5>Selamat Datang, <?= $this->session->userdata('nama'); ?></h5>
        <h5 class="my-3">Pilihan Menu </h5>
        <hr>
    </center>
    <div class="row my-3">
        <div class="col-sm-4 my-3">
            <div class="card text-center bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Laporan Teknisi</h5>
                    <a href="<?= base_url() ?>teknisi/lihatlaporan" class="btn btn-dark">LIHAT</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 my-3">
            <div class="card text-center bg-success">
                <div class="card-body">
                    <h5 class="card-title">Lapor Pekerjaan</h5>
                    <a href="<?= base_url() ?>teknisi/laporan" class="btn btn-dark">LAPOR</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 my-3">
            <div class="card text-center bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Request Pekerjaan</h5>
                    <a href="<?= base_url() ?>teknisi/request" class="btn btn-dark">LIHAT</a>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?= base_url() ?>vendor/sweetalert.js"></script>

<?php if ($this->session->flashdata('berhasil')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Laporan berhasil dikirim !',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>