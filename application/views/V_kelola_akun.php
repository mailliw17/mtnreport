<div class="container mt-3">
    <center>
        <h1>Kelola Akun Teknisi</h1>
        <a href="<?= base_url() ?>auth/register" class="btn btn-primary"><i class="fas fa-user-plus"></i> Tambah Akun</a>
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
                        <th>Group</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($akun as $a) :
                    ?>
                        <tr>
                            <td> <?php echo $no; ?> </td>
                            <td><?php echo $a['nama']; ?></td>
                            <td><?php echo $a['username']; ?></td>
                            <td><?php echo $a['grup']; ?></td>
                            <td>
                                <a href="<?= base_url('auth/gantipassword/')  . $a['id'] ?>" class="btn btn-warning btn-sm"><i class="far fa-question-circle"></i> Lupa Password</a>

                                <a href="<?= base_url('auth/hapusakun/')  . $a['id'] ?>" class="btn btn-danger btn-sm" onclick="javacript:return confirm('Anda yakin menghapus akun ini?')"><i class="far fa-trash-alt"></i> Hapus</a>
                                <!-- <a href="<?= base_url('admin/hapuslaporan/')  . $l['id_laporan'] ?>" class="btn btn-danger btn-sm" onclick="javacript:return confirm('Anda yakin menghapus laporan ini?')"><i class="far fa-trash-alt"></i> Hapus</a> -->
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