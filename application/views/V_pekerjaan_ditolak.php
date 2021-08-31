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
                    <th>Bagian</th>
                    <th>Permasalahan</th>
                    <th>Alasan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($ditolak as $d) :
                ?>
                    <tr>
                        <td> <?php echo $no; ?> </td>
                        <td> <?php echo $d['id_work_order']; ?> </td>
                        <td> <?php echo $d['grup']; ?> (<?php echo $d['area']; ?>) </td>
                        <td><?php echo $d['permasalahan']; ?> (<?php echo $d['bagian_teknisi']; ?>)</td>
                        <td><?php echo $d['alasan']; ?></td>
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