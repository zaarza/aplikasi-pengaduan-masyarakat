<div class="container py-4 d-flex flex-column row-gap-5">
    <div class="d-flex flex-column row-gap-2">
        <div class="ms-auto">
            <a href="<?= BASE_URL; ?>/auth/logout" class="btn btn-primary" style="width: fit-content;">Tambah Aduan</a>
            <a href="<?= BASE_URL; ?>/auth/logout" class="btn btn-danger" style="width: fit-content;">Logout</a>
        </div>
        <div class="d-flex flex-column row-gap-1 bg-secondary text-light p-3 rounded">
            <p class="m-0">Halo,</p>
            <h3 class="m-0"><?= $_SESSION['user']['fullName'] ?></h3>
            <p class="m-0">NIK: <?= $_SESSION['user']['nik'] ?></p>
            <p class="m-0">Masyarakat/Warga</p>
        </div>
    </div>

    <div class="">
        <h3>Aduan Saya</h3>
        <p>Daftar aduan yang telah Anda buat</p>
        <table class="table table-bordered align-middle table-responsive table-hover text-center">
            <tr>
                <th><input type="checkbox" name="" id=""></th>
                <th>Judul</th>
                <th>Waktu Aduan</th>
                <th>Waktu Diperbarui</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <!-- <?php if (!isset($data['aduan']) || empty($data['aduan'])) : ?>
                <tr>
                    <td class="text-center p-5" colspan="6">Anda belum pernah membuat aduan!</td>
                </tr>
            <?php endif; ?> -->
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>Selokan tersumbat</td>
                <td>12 April 2022 (16:00)</td>
                <td>12 April 2022 (16:00)</td>
                <td>Belum diproses</td>
                <td class="d-flex column-gap-2 justify-content-center">
                    <a href="" class="btn btn-success">Ubah</a>
                    <a href="" class="btn btn-primary">Detail</a>
                    <a href="" class="btn btn-danger">Hapus</a>
                </td>
                </th>
            </tr>
        </table>
    </div>
</div>