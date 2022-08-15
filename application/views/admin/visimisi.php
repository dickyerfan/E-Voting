<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= site_url('admin/visi_misi/tambah') ?>" class="btn bg-maroon"><i class="fa fa-plus-circle"></i> Tambah Visi & Misi</a>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <?= $this->session->unset_userdata('message'); ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Kandidat</th>
                                <th class="text-center">Visi</th>
                                <th class="text-center">Misi</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rows as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $row->nama_kandidat ?></td>
                                    <td><?= $row->visi ?></td>
                                    <td><?= $row->misi ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('admin/visi_misi/edit/' . $row->id_visimisi) ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                        <a href="<?= site_url('admin/visi_misi/hapus/' . $row->id_visimisi) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>