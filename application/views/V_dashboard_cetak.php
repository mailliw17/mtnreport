<body>
    <!-- <div class="album py-3 bg-light"> -->
    <div class="container">
        <h2 class="my-3 text-center">Laporan Keseluruhan</h2>

        <div class="table-responsive">
            <table class="table mydatatable" id="">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Group</th>
                        <th>Type-WO</th>
                        <th>Area</th>
                        <th>Pekerjaan</th>
                        <th>Durasi</th>
                        <th>Teknisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($laporan as $l) :
                    ?>
                        <tr>
                            <td> <?php echo $no; ?> </td>
                            <td> <?php echo date("d/M/Y", strtotime($l['tanggal'])); ?> </td>
                            <td><?php echo $l['grup']; ?></td>
                            <td><?php echo $l['type_wo']; ?></td>
                            <td><?php echo $l['area']; ?></td>
                            <td><?php echo $l['pekerjaan']; ?></td>
                            <td><?php echo $l['durasi']; ?></td>
                            <td><?php echo $l['nama_teknisi']; ?></td>
                            <td><?php $status = $l['status'];
                                if ($status == 'Done') {
                                    echo '<span class="badge badge-pill badge-success">Selesai</span>';
                                } else {
                                    echo '<span class="badge badge-pill badge-warning">Continue</span>';
                                }
                                ?></td>

                            <td>
                                <a href="<?= base_url('cetak/pilih/')  . $l['id_laporan'] ?>" target="_blank" class="btn btn-info btn-sm" onclick="javacript:return confirm('Anda yakin mencetak laporan ini?')"><i class="fas fa-print"></i></a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- </div> -->

    <!-- </main> -->


</body>

</html>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <!-- <tr>
                            <th>Tanggal</th>
                            <td> <span id="tanggal"></span> </td>
                        </tr> -->
                        <tr>
                            <th>Nama Teknisi</th>
                            <td> <span id="nama_teknisi"></span> </td>
                        </tr>
                        <tr>
                            <th>Grup</th>
                            <td> <span id="grup"></span> </td>
                        </tr>
                        <tr>
                            <th>Type WO</th>
                            <td> <span id="type_wo"></span> </td>
                        </tr>
                        <tr>
                            <th>Area</th>
                            <td> <span id="area"></span> </td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td> <span id="pekerjaan"></span> </td>
                        </tr>
                        <tr>
                            <th>Analisis</th>
                            <td> <span id="analisis"></span> </td>
                        </tr>
                        <tr>
                            <th>Sparepart</th>
                            <td> <span id="sparepart"></span> </td>
                        </tr>
                        <tr>
                            <th>Jam Mulai</th>
                            <td> <span id="jam_mulai"></span> </td>
                        </tr>
                        <tr>
                            <th>Jam Selesai</th>
                            <td> <span id="jam_selesai"></span> </td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <td> <span id="durasi"></span> </td>
                        </tr>
                        <tr>
                            <th>Shift</th>
                            <td> <span id="shift"></span> </td>
                        </tr>
                        <tr>
                            <th>Total Person</th>
                            <td> <span id="total_person"></span> </td>
                        </tr>
                        <tr>
                            <th>Dilaporkan</th>
                            <td> <span id="made_by"></span> </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td> <span id="status"></span> </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <!-- image load dynamicly with javascript -->
                                <img src="" id="photo" alt="" class="img-fluid img-thumbnail" style="max-width: 500px; max-height: 500px;">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>