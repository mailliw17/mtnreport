<div class="container mt-3">

    <a href="<?= base_url() ?>supervisor" class="btn btn-info mb-3"><i class="fas fa-backward"></i> Kembali</a>

    <center>
        <h3>
            Pekerjaan Finish di <?= $this->session->userdata('grup'); ?>
        </h3>
    </center>

    <div class="table-responsive">
        <table class="table mydatatable" id="">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>ID Work Order</th>
                    <th>Waktu Selesai</th>
                    <th>Area</th>
                    <th>Permasalahan</th>
                    <th>Requested By</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($selesai as $s) :
                ?>
                    <tr>
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $s['id_work_order']; ?> </td>
                        <td> <?php echo date("d/M/Y G:i:s", strtotime($s['finish'])); ?> </td>
                        <td><?php echo $s['area']; ?></td>
                        <td><?php echo $s['permasalahan']; ?></td>
                        <td><?php echo $s['request_by']; ?></td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

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

<?php if ($this->session->flashdata('pekerjaan-selesai')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Permasalahan selesai dikerjakan !',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>