<head>
    <title><?php echo $title; ?></title>
</head>
<style>
    .line-title {
        border: 1;
        border-style: inset;
        border-top: 1px solid #0000;
    }
</style>
<div class="container-fluid">
    <?php
    foreach ($tbl_mahasiswa as $row) {
        ?>
        <img src="<?php echo base_url(); ?>assets/img/horizon.jpg">
        <hr class="line-title">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Mahasiswa</h1>
        <h2>
            <p class="mb-10">Data Mahasiswa</p>
        </h2>
        <div class="card mb-3">
            <div class="card-body">
                <table>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?php echo $row->nim; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $row->nama; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $row->email; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><?php echo $row->tgl_lahir; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $row->alamat; ?></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td><img style="width:100px; height:90px;" src="<?php

                        echo base_url($row->foto); ?>"></td>
                    </tr>
                </table>
            </div>

        </div>

    <?php } ?>