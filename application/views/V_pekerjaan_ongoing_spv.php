<div class="container mt-3">

    <a href="<?= base_url() ?>supervisor" class="btn btn-info mb-3"><i class="fas fa-backward"></i> Kembali</a>

    <div class="row my-2">
        <h3 style="color: yellow;">
            Pekerjaan On-going di <?= $this->session->userdata('grup'); ?>
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
                    <th>Pemohon</th>
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
                        <td><?php echo $p['request_by']; ?> <br> (Disetujui : <?php echo $p['approved_by']; ?>)</td>

                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>

    <hr>

    <div class="row my-2">
        <h3 style="color: green;">
            Pekerjaan Selesai (Need Confirmation)
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
                    <th>Pemohon</th>
                    <th>Disetujui</th>
                    <th>Aksi</th>
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
                        <td> <?php echo date("d/M/Y G:i:s", strtotime($s['waktu'])); ?> </td>
                        <td><?php echo $s['area']; ?></td>
                        <td><?php echo $s['permasalahan']; ?></td>
                        <td><?php echo $s['request_by']; ?></td>
                        <td><?php echo $s['approved_by']; ?></td>

                        <td>
                            <a href="<?= base_url('supervisor/konfirmasiselesai/')  . $s['id_work_order'] ?>" class="btn btn-success btn-sm"><i class="fas fa-vote-yea"></i> Konfirmasi</a>
                        </td>

                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
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