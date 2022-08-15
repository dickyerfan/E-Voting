<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= $title ?></h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <?= form_open_multipart('admin/kandidat/update') ?>

                    <input type="hidden" name="id" value="<?= $rows->id ?>">

                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?= base_url('assets/img/' . $rows->foto); ?>" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="nama_kandidat">Nama Kandidat</label>
                                <input type="text" name="nama_kandidat" id="nama_kandidat" class="form-control" value="<?= $rows->nama_kandidat ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_calon">Nama Calon</label>
                                <input type="text" name="nama_calon" id="nama_calon" class="form-control" value="<?= $rows->nama_calon ?>">
                            </div>
                            <div class="form-group">
                                <label for="foto">Ganti Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>

                    <a href="<?= site_url('admin/kandidat') ?>" class="btn bg-maroon"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn bg-navy"><i class="fa fa-edit"></i> Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>