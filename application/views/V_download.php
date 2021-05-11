<div class="container mt-3">
    <center>
        <h1>Download File Excel</h1>
        <p>Silahkan pilih tanggal laporan</p>
    </center>
    <hr>
    <form method="POST" action="<?= base_url() ?>laporan/download">
        <div class="form-row">
            <div class="col-md-2">
                <label for="">Tanggal :</label>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="range_tanggal" name="range_tanggal" autocomplete="off" required autofocus>
                <?= form_error('range_tanggal', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i> Download</button>
            </div>
        </div>
    </form>
</div>