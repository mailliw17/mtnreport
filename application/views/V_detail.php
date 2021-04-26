<center>
    <!-- Begin Page Content -->
    <div class="container">
        <!-- Page Heading -->

        <h1 class="mt-4">Info Laporan Kerja</h1>
        <hr>


        <div class="row">
            <div class="col">
                <div class=" card">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $detail['tanggal']; ?> </h5>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Type WO :</th>
                                    <td><?php echo $detail['type_wo']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Group :</th>
                                    <td><?php echo $detail['tanggal']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Area :</th>
                                    <td><?php echo $detail['area']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Pekerjaan</th>
                                    <td><?php echo $detail['pekerjaan']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Analisis :</th>
                                    <td><?php echo $detail['analisis']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Line Packing :</th>
                                    <td>aa</td>
                                </tr>
                                <tr>
                                    <th scope="row">Waktu Pembuatan :</th>
                                    <td>aa
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Shift :</th>
                                    <td>aa</td>
                                </tr>
                                <tr>
                                    <th scope="row">Expired Date :</th>
                                    <td>aa</td>
                                </tr>
                                <tr>
                                    <th scope="row">Operator Muat :</th>
                                    <td>aa</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?= base_url() ?>admin" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div> -->
        </div>


    </div>
</center>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->