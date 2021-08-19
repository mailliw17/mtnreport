<center>
    <div class="container mt-3">
        <h3>Buat Akun Baru</h3>
        <h3>Supervisor / Manager</h3>
        <h5>Non-Maintenance</h5>
        <hr>
        <form method="POST" action="<?= base_url() ?>auth/registerakunspv" class="mb-3">
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
            <input type="hidden" class="form-control" id="role" name="role" autocomplete="off" value="Supervisor-NonMTN">

            <div class="form-group">
                <div class="col-md-2">
                    <label for="exampleFormControlSelect1">Department</label>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="grup" required>
                        <option value="" selected disabled>--SILAHKAN PILIH--</option>
                        <option value="Produksi">Produksi</option>
                        <option value="Warehouse">Warehouse</option>
                        <option value="QSHE">QSHE</option>
                        <option value="Feed Tech">Feed Tech</option>
                        <option value="PPIC">PPIC</option>
                        <option value="PGA">PGA</option>
                        <!-- Tolong tambahin lagi -->
                    </select>
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

            <div class="col-md-8 float-right mb-3">
                <a href="<?= base_url() ?>auth/kelolaakunnonmtn" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-primary">Proses</button>
            </div>
        </form>
    </div>
</center>