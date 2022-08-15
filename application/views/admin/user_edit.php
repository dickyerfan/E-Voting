<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= $title ?></h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <form action="<?= site_url('admin/user/update') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $rows->id ?>">

                        <div class="form-group">
                            <label for="id_kelas">Kelas *</label>
                            <select name="id_kelas" id="id_kelas" class="form-control">
                                <?php foreach ($kelas as $kls) : ?>
                                    <option value="<?= $kls->id ?>" <?= $rows->id_kelas == $kls->id ? 'selected' : '' ?>><?= $kls->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama *</label>
                            <input type="text" name="nama" id="nama" class="form-control" required value="<?= $rows->nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="text" name="email" id="email" class="form-control" required value="<?= $rows->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="level">Level *</label>
                            <select name="level" id="level" class="form-control">
                                <option value="admin" <?= $rows->level == 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="siswa" <?= $rows->level == 'siswa' ? 'selected' : '' ?>>Siswa</option>
                            </select>
                        </div>

                        <a href="<?= site_url('admin/user') ?>" class="btn bg-maroon"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn bg-navy"><i class="fa fa-save"></i> Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>