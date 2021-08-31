<div class="container mt-3">
    <center>
        <h1>Alasan Penolakan</h1>
    </center>
    <hr>
    <form method="POST">

        <!-- ID Work Order -->
        <input type="hidden" class="form-control" id="id_work_order" name="id_work_order" autocomplete="off" value="<?= $permasalahan['id_work_order']; ?>">

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Alasan</label>
            <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="ceklis" onclick="disabled_tombol(this)">
            <label class="form-check-label" for="exampleCheck1">Alasan yang dibuat sudah betul</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4" onclick="matikanTombol()" id="submit_button" disabled>KIRIM</button>
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