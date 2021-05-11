<div class="container mt-3">
    <center>
        <h1>Ganti Password </h1>
        <h3>Akun : <?php echo $akun['nama']; ?></h3>
    </center>
    <hr>
    <form method="POST" action="">
        <div class="form-group">
            <div class="col-md-2">
                <label for="">Password Baru</label>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control" id="passwordBaru1" name="passwordBaru1" autocomplete="off" required autofocus>
                <?= form_error('passwordBaru1', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2">
                <label for="">Ulangi Password</label>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control" id="passwordBaru2" name="passwordBaru2" autocomplete="off" required>
                <?= form_error('passwordBaru2', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
        </div>

        <div class="col-md-8 float-right">
            <a href="<?= base_url() ?>auth/kelolaakun" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Proses</button>
        </div>
    </form>
</div>