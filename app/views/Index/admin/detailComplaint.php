<div class="mt-4">
    <a href="<?= BASE_URL; ?>">Kembali</a>
    <h1 class="mt-2">Detail Aduan</h1>

    <table class="table table-bordered mt-2">
        <tr>
            <th>Nama Pengadu:</th>
            <td><?= $data['complaint']['fullName'] ?></td>
        </tr>
        <tr>
            <th>Judul:</th>
            <td><?= $data['complaint']['title'] ?></td>
        </tr>
        <tr>
            <th>Deskripsi:</th>
            <td><?= $data['complaint']['description'] ?></td>
        </tr>
        <tr>
            <th>Gambar:</th>
            <td>
                <img src="<?= BASE_URL; ?>/assets/images/uploaded/<?= $data['complaint']['image'] ?>" alt="" width="300">
            </td>
        </tr>
        <tr>
            <th>Waktu Aduan:</th>
            <td><?= date("d F Y (H:i)", $data['complaint']['createdAt']) ?></td>
        </tr>
        <tr>
            <th>Waktu Diperbarui:</th>
            <td><?= date("d F Y (H:i)", $data['complaint']['editedAt']) ?></td>
        </tr>
        <tr>
            <th>Status:</th>
            <td><?= $data['complaint']['status'] ?></td>
        </tr>
        </tr>
    </table>

    <div class="mt-5">
        <h3>Tanggapan: </h3>

        <div class="d-flex flex-column row-gap-2">
            <?php foreach ($data['responses'] as $response) : ?>
                <div class="bg-light p-2">
                    <div class="d-flex column-gap-2 align-items-center"><?= $response['fullName'] ?><span class="badge bg-primary">Admin</span></div>
                    <p><?= date("d F Y (H:i)", $response['createdAt']) ?></p>
                    <p><?= $response['response'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <form action="<?= BASE_URL; ?>/Index/addResponse/<?= $data['complaint']['id'] ?>" method="POST" class="mt-5">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Beri tanggapan</label>
            <textarea class="form-control" rows="3" name="response"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>