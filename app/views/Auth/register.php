<div class="d-flex justify-content-center align-content-center flex-column">
    <div class="d-flex flex-column align-items-center row-gap-3 p-5">
        <?php Flasher::flash() ?>
        <div class="p-5 w-100 shadow-sm bg-body-tertiary" style="max-width: 500px;">
            <form action="<?= BASE_URL; ?>/auth/register" method="POST" class="d-flex flex-column row-gap-3">
                <div class="">
                    <h1>Daftar</h1>
                    <p class="text-muted">Pastikan data yang Anda masukkan benar dan valid!</p>
                </div>
                <div>
                    <input type="number" class="form-control rounded-0" id="nik" name="nik" value="<?= $_POST['nik'] ?? "" ?>" placeholder="Nomor Induk Kependudukan (NIK)">
                    <div class="form-text">NIK yang dimasukkan harus berisi 16 digit angka</div>
                </div>

                <div>
                    <input type="text" class="form-control rounded-0" id="fullName" name="fullName" placeholder="Nama lengkap">
                    <div class="form-text">Masukkan nama sesuai KK atau KTP</div>
                </div>

                <div>
                    <input type="text" class="form-control rounded-0" id="address" name="address" placeholder="Alamat">
                    <div class="form-text">Masukkan alamat sesuai KK atau KTP</div>
                </div>

                <div>
                    <div class="input-group">
                        <span class="input-group-text rounded-0">+62</span>
                        <input type="text" class="form-control rounded-0" name="phoneNumber" placeholder="Nomor yang bisa dihubungi">
                    </div>
                    <div class="form-text">Nomor akan digunakan jika diperlukan</div>
                </div>

                <div>
                    <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="Kata sandi">
                    <div class="form-text">Kata sandi harus berisi minimal 8 karakter</div>
                </div>

                <button type="submit" class="btn btn-primary rounded-0" name="register">Daftar</button>
            </form>
        </div>
        <p>Sudah mempunyai akun? <a href="<?= BASE_URL; ?>/auth/login" class="link-underline-light">Login</a></p>
    </div>
</div>