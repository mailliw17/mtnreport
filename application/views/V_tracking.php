<body>
    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Tracking Teknisi</h1>
                <p class="lead text-muted">Daftar Teknisi yang belum membuat laporan pada <?php echo date("d-M-Y"); ?></p>
            </div>
        </section>

        <!-- <div class="album py-3 bg-light"> -->
        <div class="container">
            <!-- <h2 class="mb-3">Laporan Keseluruhan</h2> -->

            <div class="table-responsive">
                <table class="table mydatatable" id="">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Grup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($belumlapor as $bl) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td><?php echo $bl['nama']; ?></td>
                                <td><?php echo $bl['grup']; ?></td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- </div> -->

    </main>


</body>

</html>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <!-- <tr>
                            <th>Tanggal</th>
                            <td> <span id="tanggal"></span> </td>
                        </tr> -->
                        <tr>
                            <th>Nama Teknisi</th>
                            <td> <span id="nama_teknisi"></span> </td>
                        </tr>
                        <tr>
                            <th>Grup</th>
                            <td> <span id="grup"></span> </td>
                        </tr>
                        <tr>
                            <th>Type WO</th>
                            <td> <span id="type_wo"></span> </td>
                        </tr>
                        <tr>
                            <th>Area</th>
                            <td> <span id="area"></span> </td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td> <span id="pekerjaan"></span> </td>
                        </tr>
                        <tr>
                            <th>Analisis</th>
                            <td> <span id="analisis"></span> </td>
                        </tr>
                        <tr>
                            <th>Sparepart</th>
                            <td> <span id="sparepart"></span> </td>
                        </tr>
                        <tr>
                            <th>Jam Mulai</th>
                            <td> <span id="jam_mulai"></span> </td>
                        </tr>
                        <tr>
                            <th>Jam Selesai</th>
                            <td> <span id="jam_selesai"></span> </td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <td> <span id="durasi"></span> </td>
                        </tr>
                        <tr>
                            <th>Shift</th>
                            <td> <span id="shift"></span> </td>
                        </tr>
                        <tr>
                            <th>Total Person</th>
                            <td> <span id="total_person"></span> </td>
                        </tr>
                        <tr>
                            <th>Dilaporkan</th>
                            <td> <span id="made_by"></span> </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td> <span id="status"></span> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>



<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#detail', function() {
            // var tanggal = $(this).data('tanggal');
            var grup = $(this).data('grup');
            var type_wo = $(this).data('type_wo');
            var area = $(this).data('area');
            var pekerjaan = $(this).data('pekerjaan');
            var analisis = $(this).data('analisis');
            var sparepart = $(this).data('sparepart');
            var jam_mulai = $(this).data('jam_mulai');
            var jam_selesai = $(this).data('jam_selesai');
            var durasi = $(this).data('durasi');
            var shift = $(this).data('shift');
            var total_person = $(this).data('total_person');
            var nama_teknisi = $(this).data('nama_teknisi');
            var made_by = $(this).data('made_by');
            var status = $(this).data('status');
            // $('#tanggal').text(tanggal);
            $('#grup').text(grup);
            $('#type_wo').text(type_wo);
            $('#area').text(area);
            $('#pekerjaan').text(pekerjaan);
            $('#analisis').text(analisis);
            $('#sparepart').text(sparepart);
            $('#jam_mulai').text(jam_mulai);
            $('#jam_selesai').text(jam_selesai);
            $('#durasi').text(durasi);
            $('#shift').text(shift);
            $('#total_person').text(total_person);
            $('#nama_teknisi').text(nama_teknisi);
            $('#made_by').text(made_by);
            $('#status').text(status);
        })
    })
</script>

<script src="<?= base_url() ?>vendor/sweetalert.js"></script>

<?php if ($this->session->flashdata('area_baru')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Area Baru Berhasil Dibuat',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil-hapus')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Laporan Berhasil Dihapus',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil-edit')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Laporan Berhasil Diperbarui',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>