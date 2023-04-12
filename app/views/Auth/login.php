    <div class="d-flex justify-content-center align-content-center flex-column" style="height: 100vh;">
        <div class="d-flex flex-column align-items-center row-gap-3 p-5">
            <div style="width: 500px;">
                <?php Flasher::flash() ?>
            </div>

            <div class="p-5 w-100 shadow-sm bg-body-tertiary" style="max-width: 500px;">
                <form action="<?= BASE_URL; ?>/auth/getLogin" method="POST" class="d-flex flex-column row-gap-3">
                    <h1 class="text-center">Login</h1>
                    <input type="number" class="form-control rounded-0" id="nik" name="nik" placeholder="Nomor Induk Kependudukan (NIK)">
                    <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="Kata Sandi">
                    <button type="submit" class="btn btn-primary rounded-0">Login</button>
                    <div class="d-flex align-items-center column-gap-2">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Ingat saya</label>
                    </div>
                </form>
            </div>
            <p>Belum memiliki akun? <a href="<?= BASE_URL; ?>/auth" class="link-underline-light">Daftar sekarang!</a></p>
        </div>
    </div>