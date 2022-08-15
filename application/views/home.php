<section class="sec1" id="sec1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="display-4 text-primary mt-5 h2-sec1 text-center">Perolehan Suara</h2>
                <canvas id="myChart" height="100"></canvas>
            </div>
        </div>
    </div>
</section>

<section class="sec2" id="sec2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="display-4 text-primary mt-5 h2-sec1 text-center">Voting</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($kandidat as $knd) : ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="<?= base_url('assets/img/' . $knd->foto) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center text-primary font-weight-bold"><?= $knd->nama_kandidat; ?></h5>
                            <p class="card-text text-center text-secondary"><?= $knd->nama_calon; ?></p>
                            <div class="d-flex justify-content-between">
                                <a href="<?= site_url('home/visimisi/' . $knd->id) ?>" class="btn btn-primary btn-sm">Lihat Visi & Misi</a>

                                <?php if ($user->status == 0) : ?>
                                    <a href="#" class="btn btn-success btn-sm" data-nama_kandidat="<?= $knd->nama_kandidat ?>" data-id_user="<?= $this->session->userdata('id'); ?>">Pilih <?= $knd->nama_kandidat ?></a>
                                <?php else : ?>
                                    <button href="#" class="btn btn-success btn-sm" disabled> Pilih <?= $knd->nama_kandidat ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">FORM LOGIN</h5>
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

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Calon Ke 1', 'Calon Ke 2', 'Calon Ke 3'],
            datasets: [{
                label: '# Hasil Suara',
                data: [
                    <?= $kandidat1 ?>,
                    <?= $kandidat2 ?>,
                    <?= $kandidat3 ?>,
                    0
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 5
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true

                }
            }
        }
    });
</script>