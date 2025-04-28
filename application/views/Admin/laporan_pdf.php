<style>
    .line-title {
        border: 1;
        border-style: inset;
        border-top: 1px solid #0000;
    }
</style>

<head>
    <title><?php echo $title; ?></title>
</head>
<div class="container-fluid">
    <img src="<?php echo base_url(); ?>assets/img/horizon.jpg">
    <hr class="line-title">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Mahasiswa</h1>
    <p class="mb-4">Pada tabel ini di tampilkan data

        mahasiswa yang aktif menjalani perkuliahan</p>
    <!-- DataTables -->
    <div class="card mb-3">

        <div class="card-body">
            <div class="table-responsive">
                <table border="1" class="table table-hover" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>No</th>

                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tbl_mahasiswa as $key) { ?>
                            <tr align="center">
                                <td><?php echo $no++; ?></td>

                                <td><?php echo $key->nim; ?></td>
                                <td><?php echo $key->nama; ?></td>
                                <td><?php echo $key->email; ?></td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>