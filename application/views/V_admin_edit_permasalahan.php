<div class="container mt-3">
    <center>
        <h1>Edit Laporan Permasalahan</h1>
        <h3><?= $this->session->userdata('grup'); ?></h3>
    </center>
    <hr>
    <form method="POST">

        <!-- ID Work Order -->
        <input type="hidden" class="form-control" id="id_work_order" name="id_work_order" autocomplete="off" value="<?= $permasalahan['id_work_order']; ?>">

        <!-- Waktu -->
        <input type="hidden" class="form-control" id="waktu" name="waktu" value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                    echo date("Y-m-d H:i:s"); ?>" autocomplete="off">

        <!-- Perequest -->
        <input type="hidden" class="form-control" id="request_by" name="request_by" value="<?= $permasalahan['request_by']; ?>" autocomplete="off">

        <input type="hidden" class="form-control" id="approved_by" name="approved_by" value="<?= $permasalahan['approved_by']; ?>" autocomplete="off">

        <!-- Grup si karyawan -->
        <input type="hidden" class="form-control" id="grup" name="grup" value="<?= $permasalahan['grup']; ?>" autocomplete="off">

        <div class="form-group">
            <label for="exampleFormControlInput1">Area</label>
            <input type="text" class="form-control" id="area" name="area" autocomplete="off" value="<?= $permasalahan['area']; ?>" required>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Permasalahan</label>
            <textarea class="form-control" id="permasalahan" name="permasalahan" rows="3" required><?= $permasalahan['permasalahan']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Bagian Teknisi</label>
            <select class="form-control" name="bagian_teknisi" required>
                <option value="<?= $permasalahan['bagian_teknisi']; ?>" selected><?= $permasalahan['bagian_teknisi']; ?></option>
                <option value="Mechanical">Mechanical</option>
                <option value="Automation">Automation</option>
                <option value="Electrical">Electrical</option>
                <option value="Civil">Civil</option>
                <option value="Others">Others</option>
            </select>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="ceklis" onclick="disabled_tombol(this)">
            <label class="form-check-label" for="exampleCheck1">Laporan yang dibuat sudah betul</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4" onclick="matikanTombol()" id="submit_button" disabled>LAPOR</button>
</div>

</form>
</div>

<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    function matikanTombol() {
        document.getElementById("submit_button").innerHTML = "Laporan sedang diproses....";
        $("#submit_button").removeClass("btn btn-primary btn-block mb-4").addClass("btn btn-secondary btn-block mb-4");
    }

    function disabled_tombol(ceklis) {
        if (ceklis.checked) {
            document.getElementById('submit_button').disabled = false;
        } else {
            document.getElementById('submit_button').disabled = true;
        }
    }
</script>

<script src="<?= base_url() ?>vendor/sweetalert.js"></script>

<?php if ($this->session->flashdata('berhasil')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Terima kasih atas laporannya!',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>