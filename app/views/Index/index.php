<div class="d-flex justify-content-center align-content-center flex-column" style="height: 100vh;">
    <div class="d-flex flex-column align-items-center row-gap-3 p-5">
        <div style="width: 500px;">
            <?php Flasher::flash() ?>
        </div>

        <div class="p-5 w-100 shadow-sm bg-body-tertiary d-flex flex-column row-gap-3" style="max-width: 500px;">
            <a href="<?= BASE_URL; ?>/auth/login" class="btn btn-primary">Login</a>
            <a href="<?= BASE_URL; ?>/auth/admin" class="btn btn-warning">Login Admin</a>
            <a href="<?= BASE_URL; ?>/auth" class="btn btn-secondary">Daftar</a>
        </div>
    </div>
</div>