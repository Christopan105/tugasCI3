<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <a href="<?php echo site_url('dashboard/data_mhs') ?>">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('dashboard/add_data') ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nim">NIM*</label>
                    <input class="form-control" type="text" name="nim" placeholder="NIM Mahasiswa" required />
                </div>

                <div class="form-group">
                    <label for="nama">Nama*</label>
                    <input class="form-control" type="text" name="nama" placeholder="Nama Mahasiswa" required />
                </div>

                <div class="form-group">
                    <label for="email">Email*</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email" required />
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Lahir*</label>
                    <input class="form-control" type="date" name="tanggal" required />
                </div>

                <div class="form-group">
                    <label for="jk">Jenis Kelamin*</label>
                    <select name="jk" class="form-control">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat*</label>
                    <textarea class="form-control" name="alamat" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image*</label>
                    <input class="form-control-file" type="file" name="image" required />
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
        <div class="card-footer small text-muted">
            * Required fields
        </div>
    </div>
</div>