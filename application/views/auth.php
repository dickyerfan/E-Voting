<section class="sec1" id="sec1">
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <?= $this->session->flashdata('info'); ?>
                <?= $this->session->unset_userdata('info'); ?>
                <h2 class="display-4 text-primary mt-5 h2-sec1">Selamat Datang <br> di E-Voting</h2>
                <p class="text-secondary p-sec1">Silakan gunakan hak suara kalian untuk <br> Menentukan ketua dan wakil osis yang baru</p>
                <div class="a-sec1">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalLogin">Login Disini</a>
                    <a href="#sec2" class="btn btn-secondary">Buat AKun</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="<?= base_url('assets/img/hero1.png') ?>" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="sec2" id="sec2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 h2-sec2">
                <img src="<?= base_url('assets/img/hero2.png') ?>" class="img-fluid img-sec2" alt="">
            </div>
            <div class="col-md-6">
                <h2 class="text-primary h2-sec2">Belum punya akun?</h2>
                <p class="text-secondary p-sec2">Silakan daftarkan dulu diri anda di form dibawah ini, jika sudah silakan login lalu pilih menu voting </p>

                <form action="<?= site_url('auth/registrasi') ?>" method="post">
                    <div class="form-group">
                        <label for="nama" class="text-secondary">Nama *</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<span class="text-danger small pl-3">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-secondary">Email *</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<span class="text-danger small pl-3">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-secondary">Password *</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <?= form_error('password', '<span class="text-danger small pl-3">', '</span>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="id_kelas" class="text-secondary">Kelas *</label>
                        <select name="id_kelas" id="kelas" class="form-control">
                            <?php foreach ($kelas as $kls) : ?>
                                <option value="<?= $kls->id ?>"><?= $kls->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('kelas', '<span class="text-danger small pl-3">', '</span>'); ?>
                    </div>
                    <div class="form-group sub-sec2">
                        <button type="submit" class="btn btn-primary">Registrasi Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">FORM LOGIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('auth/login') ?>" method="post">
                    <div class="form-group">
                        <label for="email1" class="text-secondary">Email *</label>
                        <input type="email" name="email1" id="email1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password1" class="text-secondary">Password *</label>
                        <input type="password" name="password1" id="password1" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary ">L o g i n</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>