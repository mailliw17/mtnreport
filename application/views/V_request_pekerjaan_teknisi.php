<div class="container mt-3">

    <a href="<?= base_url() ?>teknisi" class="btn btn-info mb-3"><i class="fas fa-backward"></i> Kembali</a>

    <hr>

    <center>
        <h3>
            Request Pekerjaan
        </h3>
    </center>

    <div class="table-responsive">
        <table class="table mydatatable" id="">
            <thead class="thead-dark">
                <tr>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($permasalahan as $p) :
                ?>
                    <tr>
                        <td>
                            <p><?php echo date("d/M/Y G:i:s", strtotime($p['waktu'])); ?> </p>
                            <p><?php echo $p['grup']; ?> (<?php echo $p['area']; ?>) </p>
                            <p> Request : <?php echo $p['request_by']; ?> (<?php echo $p['approved_by']; ?>)</p>

                            <a href="" class="btn btn-info btn-sm" id="button_photo" data-toggle="modal" data-target="#modalPhoto" data-photo="<?= $p['photo']; ?>" data-permasalahan="<?= $p['permasalahan']; ?>"><i class="fas fa-image"></i></a>
                        </td>
                    </tr>
                <?php
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
                <img src="" id="photo" alt="" class="img-fluid img-thumbnail my-3" style="max-width: 300px; max-height: 400px;">
                <h3 class="mb-3"> <span id="permasalahan"></span></h3>
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