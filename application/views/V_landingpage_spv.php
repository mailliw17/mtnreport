<div class="container mt-3">
    <center>
        <h5>Selamat Datang, <?= $this->session->userdata('nama'); ?></h5>
        <h5 class="my-3">Pilihan Menu </h5>
        <hr>
        <div class="row">
            <div class="col-md-6 my-2">
                <a class="btn btn-sm btn-primary" href="<?= base_url() ?>auth/kelolaakunkaryawannonmtn"><i class="fas fa-users"></i> Kelola Akun</a>
            </div>
            <div class="col-md-6 my-2">
                <a class="btn btn-sm btn-danger" href="<?= base_url() ?>supervisor/lapor_permasalahan"><i class="fas fa-flag-checkered"></i> Lapor Permasalahan</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 my-2">
                <a class="btn btn-sm btn-warning" href="<?= base_url() ?>supervisor/pekerjaan_ongoing"><i class="fas fa-wrench"></i></i> Pekerjaan Ongoing <span class="badge badge-danger"><?php echo $hitung_ongoing; ?></span></a>
            </div>
            <div class="col-md-4 my-2">
                <a class="btn btn-sm btn-success" href="<?= base_url() ?>supervisor/pekerjaan_selesai"><i class="far fa-check-circle"></i> Pekerjaan Selesai <span class="badge badge-danger"><?php echo $hitung_selesai; ?></span></a>
            </div>
            <div class="col-md-4 my-2">
                <a class="btn btn-sm btn-danger" href="<?= base_url() ?>supervisor/pekerjaan_ditolak"><i class="fas fa-times"></i> Pekerjaan Ditolak <span class="badge badge-light"><?php echo $hitung_ditolak; ?></span></a>
            </div>
        </div>
    </center>

    <hr>

    <div class="row my-2 ml-2">
        <h3>
            Request Pekerjaan di <?= $this->session->userdata('grup'); ?>
        </h3>
    </div>

    <div class="table-responsive">
        <table class="table mydatatable" id="">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>ID Work Order</th>
                    <th>Waktu</th>
                    <th>Area</th>
                    <th>Permasalahan</th>
                    <th>Requested By</th>
                    <th>Foto</th>
                    <th colspan="3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($permasalahan as $p) :
                ?>
                    <tr>
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $p['id_work_order']; ?> </td>
                        <td> <?php echo date("d/M/Y G:i:s", strtotime($p['waktu'])); ?> </td>
                        <td><?php echo $p['area']; ?> (<?php echo $p['bagian_teknisi']; ?>)</td>
                        <td><?php echo $p['permasalahan']; ?></td>
                        <td><?php echo $p['request_by']; ?></td>

                        <td>
                            <a href="" class="btn btn-info btn-sm" id="button_photo" data-toggle="modal" data-target="#modalPhoto" data-photo="<?= $p['photo']; ?>"><i class="fas fa-image"></i></a>
                            <hr>
                        </td>

                        <td>
                            <a href="<?= base_url('supervisor/edit/')  . $p['id_work_order'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        </td>

                        <td>
                            <a href="<?= base_url('supervisor/terima/')  . $p['id_work_order'] ?>" class="btn btn-success btn-sm"><i class="fas fa-vote-yea"></i> Terima</a>
                        </td>

                        <td>
                            <a onclick="javacript:return confirm('Anda yakin menolak request ini?')" href="<?= base_url('supervisor/tolak/')  . $p['id_work_order'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tolak</a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>

    <hr>


</div>

<div class="modal fade bd-example-modal-lg" id="modalPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <center>
                <!-- image load dynamicly with javascript -->
                <img src="" id="photo" alt="" class="img-fluid img-thumbnail my-3" style="max-width: 350px; max-height: 500px;">
            </center>
        </div>
    </div>
</div>
</div>


<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#button_photo', function() {
            var photo = $(this).data('photo');
            document.getElementById("photo").src = "<?= base_url(); ?>uploads/work_order/" + photo;
        })
    })
</script>

<script src="<?= base_url() ?>vendor/sweetalert.js"></script>

<?php if ($this->session->flashdata('berhasil')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Pekerjaan disetujui !',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil_edit')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Pekerjaan berhasil diperbarui !',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('tolak')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Pekerjaan ditolak !',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>