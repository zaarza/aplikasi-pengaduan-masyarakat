<div class="container p-5 d-flex flex-column row-gap-2">
    <?php Flasher::flash() ?>
    <div class="">
        <h1>Login sebagai Admin/Pengurus</h1>
        <hr>
    </div>
    <form action="<?= BASE_URL; ?>/auth/loginMaster" method="POST">
        <div class="mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="mt-4">
        <p class="">Bukan seorang Admin/Pengurus?</p>
        <a href="<?= BASE_URL; ?>/auth/login" class="btn btn-success">Login Masyarakat</a>
    </div>
</div>