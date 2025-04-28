<div class="container-fluid">
    <?php
    foreach ($tbl_mahasiswa as $row) {
        ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <div class="card mb-3">
            <div class="card-header">

                <a href="<?php echo site_url('dashboard/data_mhs') ?>"><i class="fas fa-arrow-left"></i> Back</a>

            </div>
            <div class="card-body">
                <form action="<?php echo site_url('dashboard/update/' . $row->id_mhs) ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">NIM*</label>
                        <input class="form-control" type="text" name="nim" value="<?php echo
                            $row->nim; ?>" placeholder="Nama Mahasiswa" readonly />
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama*</label>
                        <input class="form-control" type="text" name="nama" value="<?php
                        echo $row->nama; ?>" placeholder="Nama Mahasiswa" required />
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Email*</label>
                        <input class="form-control" type="text" value="<?php echo $row->email; ?>" name="email"
                            placeholder="Email" required />
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Tanggal lahir*</label>
                        <input class="form-control" type="date" value="<?php echo $row->tgl_lahir; ?>" name="tanggal"
                            placeholder="Nama Mahasiswa" required />
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Jenis Kelamin*</label>
                        <select name="jk" class="form-control">
                            <option <?php if ($row->jk == "L") {
                                echo "selected";
                            } ?> value="L">Laki-laki</option>

                            <option <?php if ($row->jk == "P") {
                                echo "selected";
                            } ?> value="P">Perempuan</option>

                        </select>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Alamat*</label>
                        <textarea class="form-control" name="alamat" required><?php echo
                            $row->alamat; ?></textarea>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group">
                        <img style="width:100px; height:90px;" src="<?php echo base_url($row->foto); ?>">
                        <input class="form-control-file" type="file" name="image" value="<?php echo $row->foto; ?>" />
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success pull-center"> Submit
                    </button>
                </form>
            </div>
            <div class="card-footer small text-muted">* required fields
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->
<?php } ?>