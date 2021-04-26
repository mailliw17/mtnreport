<div class="container mt-3">
    <center>
        <h1>Tambah Area Kerja</h1>
    </center>
    <hr>
    <form method="POST" action="<?= base_url() ?>admin/store_tambaharea">
        <div class="form-row">
            <div class="col-md-2">
                <label for="">Nama Area Kerja :</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="area_baru" name="area_baru" autocomplete="off" required autofocus>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </div>
    </form>
</div>