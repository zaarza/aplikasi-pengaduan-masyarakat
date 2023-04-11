<div class="container p-5 d-flex flex-column justify-content-center">
    <?php Flasher::flash() ?>

    <h1>Beranda</h1>
    <p>Anda belum login, Harap login terlebih dahulu</p>

    <div class="d-flex flex-column row-gap-2">
        <a href="<?= BASE_URL; ?>/auth/login" class="btn btn-success">Login Masyarakat</a>
        <a href="<?= BASE_URL; ?>/auth/admin" class="btn btn-warning">Login Admin/Pengurus</a>
        <hr>
        <a href="<?= BASE_URL; ?>/auth" class="btn btn-secondary">Register</a>
    </div>
</div>