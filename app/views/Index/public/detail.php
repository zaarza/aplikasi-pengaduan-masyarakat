<div class="d-flex flex-column row-gap-3 py-5 container">
    <div class="d-flex flex-column row-gap-5">
        <div class="d-flex justify-content-between">
            <a href="<?= BASE_URL; ?>" class="btn btn-secondary rounded-0 d-flex align-content-center column-gap-2" style="width: fit-content;"><i class="bi bi-arrow-left"></i> Kembali</a>
            <a href="<?= BASE_URL; ?>" class="btn btn-success rounded-0 d-flex align-content-center column-gap-2" style="width: fit-content;"><i class="bi bi-pencil-fill"></i> Ubah</a>
        </div>

        <div class="">
            <h1 class="fs-3">Detail</h1>
            <table class="table-bordered table-striped-columns table-hover table">
                <tr>
                    <th>Nama pengadu</th>
                    <td><?= $data['complaint']['fullName'] ?></td>
                </tr>

                <tr>
                    <th>Judul</th>
                    <td><?= $data['complaint']['title'] ?></td>
                </tr>

                <tr>
                    <th>Deskripsi</th>
                    <td><?= $data['complaint']['description'] ?></td>
                </tr>

                <tr>
                    <th>Lokasi</th>
                    <td><?= $data['complaint']['location'] ?></td>
                </tr>

                <tr>
                    <th>Gambar</th>
                    <td><img src="<?= BASE_URL; ?>/assets/images/uploaded/<?= $data['complaint']['image'] ?>?>" alt="" width="200"></td>
                </tr>

                <tr>
                    <th>Waktu aduan</th>
                    <td><?= date("d F Y (H:i)", $data['complaint']['createdAt']) ?></td>
                </tr>

                <tr>
                    <th>Waktu diperbarui</th>
                    <td><?= $data['complaint']['editedAt'] === NULL ? "" : date("d F Y (H:i)", $data['complaint']['editedAt']) ?></td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td><?= $data['complaint']['status'] ?></td>
                </tr>
            </table>
        </div>

        <div class="">
            <h1 class="fs-3">Tanggapan</h1>

            <?php if (!empty($data['responses'])) : ?>
                <div class="d-flex flex-column row-gap-3">
                    <?php foreach ($data['responses'] as $response) : ?>
                        <div class="bg-body-tertiary p-3 d-flex flex-column row-gap-3">
                            <div class="">
                                <div class="d-flex column-gap-2">
                                    <h1 class="fs-5"><?= $response['fullName'] ?></h1>
                                    <span class="badge text-bg-primary rounded-0" style="height: fit-content;">Admin</span>
                                </div>
                                <h2 class="fs-6 text-muted"><?= date("d F Y (H:i)", $response['createdAt']) ?></h2>
                            </div>
                            <p><?= $response['response'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>