<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <span class="btn bg-maroon box-title"><?= $title; ?></span>
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
                                <th class="text-center">Nama Calon</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rows as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $row->nama_kandidat ?></td>
                                    <td><?= $row->nama_calon ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/' . $row->foto) ?>" alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= site_url('admin/kandidat/edit/' . $row->id) ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
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