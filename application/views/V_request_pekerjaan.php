<div class="container mt-3">

    <a href="<?= base_url() ?>admin" class="btn btn-info mb-3"><i class="fas fa-backward"></i> Kembali</a>

    <hr>
    <center>
        <div class="my-2">
            <h3>
                Request Pekerjaan
            </h3>
            <form action="<?= base_url() ?>admin/sortingrequest" method="GET">
                <div class="form-group col-md-4">
                    <label for="exampleFormControlSelect1">Grup Kerja</label>
                    <select class="form-control" name="keyword" id="keyword">
                        <option selected disabled>Semua Grup</option>
                        <option value="Mechanical">Mechanical</option>
                        <option value="Automation">Automation</option>
                        <option value="Electrical">Electrical</option>
                        <option value="Civil">Civil</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <button class="btn btn-success btn-sm" type="submit" id="cari"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>
    </center>

    <div class="table-responsive">
        <table class="table mydatatable" id="">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Department</th>
                    <th>Waktu</th>
                    <th>Area</th>
                    <th>Requested By</th>
                    <th>Grup</th>
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
                        <td> <?php echo $p['grup']; ?> </td>
                        <td> <?php echo date("d/M/Y G:i:s", strtotime($p['waktu'])); ?> </td>
                        <td><?php echo $p['area']; ?></td>
                        <td><?php echo $p['request_by']; ?> <br> (Disetujui : <?php echo $p['approved_by']; ?>)</td>
                        <td><?php echo $p['bagian_teknisi']; ?></td>

                        <td>
                            <a href="" class="btn btn-info btn-sm" id="button_photo" data-toggle="modal" data-target="#modalPhoto" data-photo="<?= $p['photo']; ?>" data-permasalahan="<?= $p['permasalahan']; ?>"><i class="fas fa-image"></i></a>
                            <hr>
                        </td>

                        <td>
                            <a href="<?= base_url('admin/edit/')  . $p['id_work_order'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        </td>

                        <td>
                            <a href="<?= base_url('admin/terima/')  . $p['id_work_order'] ?>" class="btn btn-success btn-sm"><i class="fas fa-vote-yea"></i> Pekerjaan Selesai</a>
                        </td>

                        <td>
                            <a onclick="javacript:return confirm('Anda yakin request ini?')" href="<?= base_url('admin/tolak/')  . $p['id_work_order'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Tolak</a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
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
                <img src="" id="photo" alt="" class="img-fluid img-thumbnail my-3" style="max-width: 500px; max-height: 500px;">
                <h3 class="mb-3"> <span id="permasalahan"></span></h3>
            </center>
        </div>
    </div>
</div>
</div>


<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script>
    $('#keyword').on('change', function() {
        $('#cari').prop('disabled', !$(this).val());
    }).trigger('change');

    $(document).ready(function() {
        $(document).on('click', '#button_photo', function() {
            var photo = $(this).data('photo');
            var permasalahan = $(this).data('permasalahan');
            $('#permasalahan').text(permasalahan);
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
            icon: 'warning',
            title: 'Pekerjaan ditolak !',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>