<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <span class="btn bg-maroon box-title"><?= $title; ?></span>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <?= $this->session->unset_userdata('message'); ?>

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama User</th>
                                <th class="text-center">Nama Kandidat</th>
                                <th class="text-center">Tanggal Pilih</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rows as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $row->nama_user ?></td>
                                    <td><?= $row->nama_kandidat ?></td>
                                    <td><?= $row->created ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('admin/suara/hapus/' . $row->id_suara) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
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