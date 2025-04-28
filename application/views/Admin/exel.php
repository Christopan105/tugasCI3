<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal_lahir</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($tbl_mahasiswa as $data) { ?>
            <tr>
                <td><?php echo $data->nim; ?></td>
                <td><?php echo $data->nama; ?></td>
                <td><?php echo $data->alamat; ?></td>
                <td><?php echo $data->tgl_lahir; ?></td>
                <td><?php echo $data->jk; ?></td>
                <td><?php echo $data->email; ?></td>
            </tr>
            <?php $i++;
        } ?>
    </tbody>
</table>