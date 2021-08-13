<div class="container mt-3">
    <center>
        <h3>Kelola Akun</h3>
        <h3>Non-Maintenance</h3>
        <a href="<?= base_url() ?>auth/registerakunspv" class="btn btn-primary"><i class="fas fa-user-plus"></i> Tambah Akun SPV</a>
    </center>
    <hr>
    <div class="">
        <!-- <h2 class="mb-3">Laporan Keseluruhan</h2> -->

        <div class="table-responsive">
            <table class="table mydatatable" id="">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Department</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($spv as $s) :
                    ?>
                        <tr>
                            <td> <?php echo $no; ?> </td>
                            <td><?php echo $s['nama']; ?></td>
                            <td><?php echo $s['username']; ?></td>
                            <td><?php echo $s['grup']; ?></td>
                            <td>
                                <a href="<?= base_url('auth/gantipasswordnonmtn/')  . $s['id'] ?>" class="btn btn-warning btn-sm"><i class="far fa-question-circle"></i> Lupa Password</a>

                                <a href="<?= base_url('auth/hapusakunnonmtn/')  . $s['id'] ?>" class="btn btn-danger btn-sm" onclick="javacript:return confirm('Anda yakin menghapus akun ini?')"><i class="far fa-trash-alt"></i> Hapus</a>

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

<?php if ($this->session->flashdata('register_berhasil')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Akun Baru Berhasil Dibuat',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('hapus_akun_berhasil')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Akun Berhasil Dihapus',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('ganti_password_berhasil')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Berhasil Ganti Password',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>