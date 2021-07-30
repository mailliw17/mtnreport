<!-- <center>
    <h3>LAPORAN KERJA</h3>
    <h3>Divisi Maintenance</h3>
    <h3>PT. Charoen Pokphand Indonesia</h3>
</center>

<h3>Deskripsi Pekerjaan</h3>

<p>Nama Teknisi : <?php echo $cetak['nama_teknisi']; ?></p>
<p>Tanggal: <?php echo $cetak['tanggal']; ?></p>

<style>
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        padding: 8px 8px;
        border: 1px solid #000000;
        text-align: center;
    }

    .table td {
        padding: 3px 3px;
        border: 1px solid #000000;
    }

    .text-center {
        text-align: center;
    }
</style> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $cetak['grup']; ?> - <?php echo $cetak['area']; ?></title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> -->
</head>

<body class="A4">
    <section class="sheet padding-10mm">
        <h3>Laporan Kerja</h3>
        <h3>Divisi Maintenance - <?php echo $cetak['grup']; ?> </h3>
        <h3>PT. Charoen Pokphand Indonesia</h3>

        <table class="table">
            <!-- <thead>
                <tr>
                    <th>Properties</th>
                    <th>Keterangan</th>
                </tr>
            </thead> -->
            <tbody>
                <tr>
                    <td class="text-center">Tanggal</td>
                    <td class="text-center"> <?php echo date("d/M/Y", strtotime($cetak['tanggal'])); ?></td>
                </tr>

                <tr>
                    <td class="text-center">Shift</td>
                    <td class="text-center"> <?php echo $cetak['shift']; ?> </td>
                </tr>

                <tr>
                    <td class="text-center">Type Work Order</td>
                    <td class="text-center"> <?php echo $cetak['type_wo']; ?> </td>
                </tr>

                <tr>
                    <td class="text-center">Area</td>
                    <td class="text-center"> <?php echo $cetak['area']; ?> </td>
                </tr>

                <tr>
                    <td class="text-center">Pekerjaan</td>
                    <td class="text-center"> <?php echo $cetak['pekerjaan']; ?> </td>
                </tr>

                <tr>
                    <td class="text-center">Analisis</td>
                    <td class="text-center"> <?php echo $cetak['analisis']; ?> </td>
                </tr>


                <tr>
                    <td class="text-center">Sparepart</td>
                    <td class="text-center"> <?php echo $cetak['sparepart']; ?> </td>
                </tr>

                <tr>
                    <td class="text-center">Jam Kerja</td>
                    <td class="text-center"> <?php echo $cetak['jam_mulai']; ?> - <?php echo $cetak['jam_selesai']; ?></td>
                </tr>

                <tr>
                    <td class="text-center">Teknisi</td>
                    <td class="text-center"> <?php echo $cetak['nama_teknisi']; ?> </td>
                </tr>

                <tr>
                    <td class="text-center">Status</td>
                    <td class="text-center"> <?php echo $cetak['status']; ?> </td>
                </tr>

            </tbody>
        </table>

        <div class="row">
            <div class="col">
                <p class="ttd-pelapor">
                    Dilaporkan Oleh
                </p>
                <p class="nama-pelapor"><?php echo $cetak['made_by']; ?></p>
            </div>
            <div class="col">
                <p class="ttd-area">Petugas Area kerja</p>
                <p class="nama-area"><?php echo $cetak['area']; ?></p>
            </div>
        </div>

        <p class="keterangan">*Laporan ini dicetak menggunakan Maintenance Report App</p>
        <p class="keterangan">*Setiap data yang tercantum dapat dilihat secara digital di Maintenance Report App</p>
    </section>
</body>

</html>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> -->
<link rel="stylesheet" href="<?= base_url() ?>vendor/paper.css">
<style>
    @page {
        size: A4
    }

    h3 {
        font-weight: bold;
        font-size: 15pt;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        padding: 8px 8px;
        border: 1px solid #000000;
        text-align: center;
    }

    .table td {
        padding: 3px 3px;
        border: 1px solid #000000;
    }

    .text-center {
        text-align: center;
    }

    .ttd-area {
        margin-top: 50px;
        margin-bottom: 100px;
        text-align: right;
    }

    .nama-area {
        text-align: right;
    }

    .ttd-pelapor {
        margin-top: 50px;
        margin-bottom: 100px;
        text-align: left;
    }

    .nama-pelapor {
        text-align: left;
    }

    .jarak {
        margin-right: 10px;
    }

    .keterangan {
        font-size: small;
        color: red;
    }
</style>