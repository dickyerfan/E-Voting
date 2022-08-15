<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= site_url('admin/user/tambah') ?>" class="btn bg-maroon"><i class="fa fa-plus-circle"></i> Tambah User</a>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <?= $this->session->unset_userdata('message'); ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rows as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $row->nama_kelas ?></td>
                                    <td><?= $row->nama_user ?></td>
                                    <td><?= $row->email ?></td>
                                    <td>
                                        <?php if ($row->status == 1) { ?>
                                            <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Sudah Memilih</button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Belum Memilih</button>
                                        <?php } ?>
                                    </td>
                                    <td><?= $row->level ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('admin/user/edit/' . $row->id_user) ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                        <a href="<?= site_url('admin/user/hapus/' . $row->id_user) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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