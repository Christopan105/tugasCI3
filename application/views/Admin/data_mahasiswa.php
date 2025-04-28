<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Mahasiswa</h1>
    <p class="mb-4">Pada tabel ini ditampilkan data mahasiswa yang aktif menjalani perkuliahan.</p>

    <!-- DataTables -->
    <div class="card mb-3">
        <div class="card-header">
            <a href="<?php echo site_url('dashboard/form_mhs') ?>">
                <i class="fas fa-plus"></i> Tambah
            </a>
            <a href="<?php echo site_url('dashboard/export_all'); ?>" class="btn
                                        btn-success btn-sm"><i class="fas fa-file">Excel</i>
            </a>
            <a href="<?php echo site_url('dashboard/laporan_pdf'); ?>" class="btn
                                        btn-success btn-sm"><i class="fas fa-file"> Pdf</i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($tbl_mahasiswa as $key): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <img src="<?php echo base_url($key->foto); ?>"
                                        style="width:40px; height:40px; border-radius:100%;">
                                </td>
                                <td><?php echo $key->nim; ?></td>
                                <td><?php echo $key->nama; ?></td>
                                <td><?php echo $key->email; ?></td>
                                <td>
                                    <a href="<?php echo site_url('dashboard/edit_data/' . $key->id_mhs); ?>"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <a href="<?php echo site_url('dashboard/delete/' . $key->id_mhs); ?>"
                                        class="btn btn-danger btn-circle btn-sm" onclick="myFunction();">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="<?php echo site_url(''); ?>" class="btn
                                        btn-success btn-circle btn-sm"><i class="fas fa-file"></i>
                                    </a>

                                    <a href="<?php echo site_url('dashboard/print_mahasiswa/' . $key->id_mhs); ?>"
                                        class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-file"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Script -->
<script>
    function confirmDelete(event) {
        if (!confirm('Are you sure to delete this item?')) {
            event.preventDefault();
        }
    }
</script>