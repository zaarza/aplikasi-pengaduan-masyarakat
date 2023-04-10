<div class="container p-5 d-flex flex-column row-gap-2">
    <div class="">
        <h1>Daftar</h1>
        <p>Pastikan data yang Anda masukkan benar dan valid!</p>
        <hr>
    </div>

    <form action="<?= BASE_URL; ?>/auth/register" method="POST">
        <div class="mb-4">
            <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
            <input type="number" class="form-control" id="nik" name="nik">
            <div class="form-text">NIK yang dimasukkan harus berisi 16 digit angka</div>
        </div>

        <div class="mb-4">
            <label for="fullName" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="fullName" name="fullName">
            <div class="form-text">Masukkan nama sesuai KK atau KTP</div>
        </div>

        <div class="mb-4">
            <label for="address" class="form-label">Alamat Lengkap</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>

        <div class="mb-4">
            <label for="numberPhone" class="form-label">Nomor yang bisa dihubungi</label>
            <input type="number" class="form-control" id="numberPhone" name="numberPhone">
            <div class="form-text">Nomor akan digunakan jika diperlukan</div>
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Kata sandi</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>


        <button type="submit" class="btn btn-primary" name="register">Submit</button>
    </form>

    <p class="mt-4">Sudah mempunyai akun?</p>
    <div class="d-flex flex-column row-gap-2">
        <a href="" class="btn btn-success">Login Masyarakat</a>
        <a href="" class="btn btn-warning">Login Admin/Pengurus</a>
    </div>
</div>