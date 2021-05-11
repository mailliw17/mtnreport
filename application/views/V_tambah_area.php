<div class="container mt-3">
    <center>
        <h1>Area Kerja Teknisi</h1>
    </center>
    <hr>
    <form method="POST" action="<?= base_url() ?>admin/store_tambaharea">
        <div class="form-row">
            <div class="col-md-2">
                <label for="">Nama Area Kerja :</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="area_baru" name="area_baru" autocomplete="off" required autofocus>
                <?= form_error('area_baru', ' <small class="text-danger pl-3">', '</small>');  ?>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </div>
    </form>

    <hr>
    <div class="table-responsive">
        <table class="table mydatatable" id="">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Area</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($area as $a) :
                ?>
                    <tr>
                        <td> <?php echo $no; ?> </td>
                        <td><?php echo $a['area']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/hapusarea/')  . $a['id_area'] ?>" class="btn btn-danger btn-sm" onclick="javacript:return confirm('Anda yakin menghapus area ini?')"><i class="far fa-trash-alt"></i> Hapus</a>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

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

<?php if ($this->session->flashdata('berhasil-hapus-area')) : ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Area Berhasil Dihapus',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif; ?>