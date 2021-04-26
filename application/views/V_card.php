<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Grup</td>
            <td>Area</td>
            <td>Pekerjaan</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $s_area = "";
        $s_keyword = "";
        if (isset($_POST['area'])) {
            $s_area = $_POST['area'];
            $s_keyword = $_POST['keyword'];
        }

        $search_area = '%' . $s_area . '%';
        $search_keyword = '%' . $s_keyword . '%';
        $no = 1;
        $query = "SELECT * FROM laporan WHERE grup LIKE ? AND (area LIKE ? OR pekerjaan LIKE ? ) ORDER BY tanggal DESC";
        $dewan1 = $db1->prepare($query);
        $dewan1->bind_param('ssssss', $search_area, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
        $dewan1->execute();
        $res1 = $dewan1->get_result();

        if ($res1->num_rows > 0) {
            while ($row = $res1->fetch_assoc()) {
                $grup = $row['grup'];
                $area = $row['area'];
                $pekerjaan = $row['pekerjaan'];
        ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $gup; ?></td>
                    <td><?php echo $area; ?></td>
                    <td><?php echo $pekerjaan; ?></td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan='7'>Tidak ada data ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
</table>