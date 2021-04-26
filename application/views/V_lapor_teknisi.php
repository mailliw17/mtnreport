<div class="container mt-3">
    <center>
        <h1>Laporan Teknisi</h1>
        <h3>Maintenance</h3>
    </center>
    <hr>
    <form action="<?= base_url() ?>teknisi/kirimlaporan" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Shift</label>
            <select class="form-control" id="shift" name="shift" required>
                <option value="">--SILAHKAN PILIH--</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Perbaikan</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Type WO</label>
            <select class="form-control" id="type_wo" name="type_wo" required>
                <option value="">--SILAHKAN PILIH--</option>
                <option value="EM">EM</option>
                <option value="PRO-M">PRO-M</option>
                <option value="PM">PM</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Group</label>
            <select class="form-control" id="group" name="group" required>
                <option value="">--SILAHKAN PILIH--</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Automation">Automation</option>
                <option value="Electrical">Electrical</option>
                <option value="Civil">Civil</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Area</label>
            <input list="area_dropdown" class="form-control" id="area" name="area" autocomplete="off" required>
            <datalist id="area_dropdown">
                <?php
                foreach ($area as $a) : ?>
                    <option value="<?= $a->area ?>"></option>
                <?php endforeach; ?>
            </datalist>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Pekerjaan</label>
            <textarea class="form-control" id="pekerjaan" name="pekerjaan" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Analisis Masalah</label>
            <textarea class="form-control" id="analisis" name="analisis" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Sparepart</label>
            <input type="text" class="form-control" id="sparepart" name="sparepart" autocomplete="off">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Jam Mulai</label>
                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Jam Selesai</label>
                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="now" required>
            </div>

            <div class="form-group col-md-6">
                <label for="inputPassword4">Durasi</label>
                <input type="text" class="form-control" id="durasi" name="durasi" readonly>
            </div>

            <div class="form-group col-md-6">
                <label for="inputPassword4">Total Person</label>
                <input type="number" class="form-control" id="total_person" name="total_person" required>
            </div>

            <div class="form-group col-md-6">
                <label for="inputPassword4">Nama Teknisi</label>
                <input type="text" class="form-control" id="nama_teknisi" name="nama_teknisi" autocomplete="off" required>
            </div>

            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Status Pekerjaan</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">--SILAHKAN PILIH--</option>
                    <option value="Done">Done</option>
                    <option value="To Be Continue">To Be Continue</option>
                </select>
            </div>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="ceklis" onclick="disabled_tombol(this)">
            <label class="form-check-label" for="exampleCheck1">Laporan yang dibuat sudah betul</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4" id="submit_button" disabled>Proses</button>
    </form>
</div>

<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    var start = document.getElementById("jam_mulai").value;
    var end = document.getElementById("jam_selesai").value;

    document.getElementById("jam_mulai").onchange = function() {
        diff(start, end)
    };
    document.getElementById("jam_selesai").onchange = function() {
        diff(start, end)
    };


    function diff(start, end) {
        start = document.getElementById("jam_mulai").value; //to update time value in each input bar
        end = document.getElementById("jam_selesai").value; //to update time value in each input bar

        if ((!start) || (!end)) {
            return "";
        } else {
            start = start.split(":");
            end = end.split(":");
            var startDate = new Date(0, 0, 0, start[0], start[1], 0);
            var endDate = new Date(0, 0, 0, end[0], end[1], 0);
            var diff = endDate.getTime() - startDate.getTime();
            var hours = Math.floor(diff / 1000 / 60 / 60);
            diff -= hours * 1000 * 60 * 60;
            var minutes = Math.floor(diff / 1000 / 60);

            return (hours < 9 ? "0" : "") + hours + " Jam " + (minutes < 9 ? "0" : "") + minutes + " Menit";
        }
    }

    setInterval(function() {
        document.getElementById("durasi").value = diff(start, end);
    }, 1000); //to update time every second (1000 is 1 sec interval and function encasing original code you had down here is because setInterval only reads functions) You can change how fast the time updates by lowering the time interval

    $(function() {
        var d = new Date(),
            h = d.getHours(),
            m = d.getMinutes();
        if (h < 10) h = '0' + h;
        if (m < 10) m = '0' + m;
        $('input[type="time"][value="now"]').each(function() {
            $(this).attr({
                'value': h + ':' + m
            });
        });
    });

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
            title: 'Laporan diterima!',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>