<div class="container p-5 d-flex flex-column row-gap-2">
    <?php Flasher::flash() ?>
    <div class="">
        <h1>Login</h1>
        <hr>
    </div>
    <form action="<?= BASE_URL; ?>/auth/getLogin" method="POST">
        <div class="mb-4">
            <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
            <input type="number" class="form-control" id="nik" name="nik">
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <p class="mt-4">Belum mempunyai akun?</p>
    <div class="d-flex flex-column row-gap-2">
        <a href="<?= BASE_URL; ?>/auth" class="btn btn-success">Daftar</a>
    </div>
</div>