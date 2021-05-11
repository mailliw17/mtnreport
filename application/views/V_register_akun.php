<div class="container mt-3">
    <center>
        <h1>Buat Akun Baru</h1>
    </center>
    <hr>
    <form method="POST" action="<?= base_url() ?>auth/register">
        <div class="form-group">
            <div class="col-md-2">
                <label for="">Nama</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required autofocus>
                <?= form_error('nama', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2">
                <label for="">Username</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                <?= form_error('username', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
        </div>

        <!-- input  hidden untuk role auto teknisi -->
        <input type="hidden" class="form-control" id="role" name="role" autocomplete="off" value="Teknisi">

        <div class="form-group">
            <div class="col-md-2">
                <label for="">Grup</label>
            </div>
            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <input type="radio" name="grup" <?php if (isset($gender) && $gender == "Mechanical") echo "checked"; ?> value="Mechanical" required>&nbsp; Mechanical
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="grup" <?php if (isset($gender) && $gender == "Civil") echo "checked"; ?> value="Civil" required>&nbsp; Civil
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="grup" <?php if (isset($gender) && $gender == "Automation") echo "checked"; ?> value="Automation" required>&nbsp; Automation
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="grup" <?php if (isset($gender) && $gender == "Electrical") echo "checked"; ?> value="Electrical" required>&nbsp; Electrical
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2">
                <label for="">Password</label>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control" id="password1" name="password1" autocomplete="off" required>
                <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2">
                <label for="">Ulangi Password</label>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control" id="password2" name="password2" autocomplete="off" required>
                <?= form_error('password2', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
        </div>

        <div class="col-md-8 float-right">
            <a href="<?= base_url() ?>auth/kelolaakun" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Proses</button>
        </div>
    </form>
</div>