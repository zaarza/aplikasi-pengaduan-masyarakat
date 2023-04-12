<div class="d-flex flex-column row-gap-3 py-5 container">
    <div class="d-flex flex-column row-gap-5">
        <div class="d-flex justify-content-between">
            <a href="<?= BASE_URL; ?>" class="btn btn-secondary rounded-0 d-flex align-content-center column-gap-2" style="width: fit-content;"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <div class="">
            <h1 class="fs-3">Detail</h1>
            <form action="<?= BASE_URL; ?>/index/updateComplaint/<?= $data['complaint']['id'] ?>" method="POST" enctype="multipart/form-data">
                <table class="table-bordered table-striped-columns table-hover table">
                    <tr>
                        <th>Nama pengadu</th>
                        <td><?= $data['complaint']['fullName'] ?></td>
                    </tr>

                    <tr>
                        <th>Judul</th>
                        <td><input type="text" name="title" id="title" value="<?= $data['complaint']['title'] ?>"></td>
                    </tr>

                    <tr>
                        <th>Deskripsi</th>
                        <td>
                            <textarea name="description" id="description"><?= $data['complaint']['description'] ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>Lokasi</th>
                        <td>
                            <input type="text" name="location" id="location" value="<?= $data['complaint']['location'] ?>">
                        </td>
                    </tr>

                    <tr>
                        <th>Gambar</th>
                        <td class="d-flex flex-column row-gap-3">
                            <img src="<?= BASE_URL; ?>/assets/images/uploaded/<?= $data['complaint']['image'] ?>?>" alt="" width="200">
                            <div class="input-group">
                                <label class="input-group-text rounded-0" for="image">Gambar</label>
                                <input type="file" class="form-control rounded-0" name="image" id="image">
                            </div>
                        </td>
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

                <button type="submit" class="btn btn-primary rounded-0">Simpan</button>
            </form>
        </div>
    </div>
</div>