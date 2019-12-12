<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Account <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>


    <!-- <div class="row mt-3">
        <div class="col md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data account ... " name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->

    <div class="row mt-5">
        <div class="col">
            <h3 class="text-center">Daftar Character</h3>
            <?php if (empty($account)) : ?>
            <div class="alert alert-danger" role="alert">
                Data tidak ditemukan
            </div>
            <?php endif; ?>
            <?php if($account != NULL) {?>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">EMAIL</th>
                        <th class="text-center" scope="col">IGN</th>
                        <th class="text-center" scope="col">GOLD</th>
                        <th class="text-center" scope="col">GEM</th>
                        <th class="text-center" scope="col">JUMLAH PET</th>
                        <th class="text-center" scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><?php foreach ($account as $mhs) : ?>
                        <td class="text-center"><?= $mhs['Email']; ?></td>
                        <td class="text-center"><?= $mhs['IGN']; ?></td>
                        <td class="text-center"><?= $mhs['Gold']; ?></td>
                        <td class="text-center"><?= $mhs['Gem']; ?></td>
                        <td class="text-center"><?= $mhs['jPet']; ?></td>
                        <td class="text-center">
                            <a href="<?= base_url(); ?>Account/delete/<?= $mhs['IGN'] ?>" class="badge badge-danger float-center" onclick="return confirm('Apakah anda yakin menghapus data ini?');" ?>hapus</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php } ?>
            <div class="row mt-3">
                <div class="col md-6 text-center mt-5">
                    <a href="<?= base_url(); ?>account/add " class="btn btn-primary">Tambah Character</a>
                </div>
            </div>

        </div>
    </div>
</div>