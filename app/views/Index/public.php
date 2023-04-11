<div class="container py-4 d-flex flex-column row-gap-5">
    <?php Flasher::flash() ?>
    <div class="d-flex flex-column row-gap-2">
        <div class="ms-auto">
            <a href="<?= BASE_URL; ?>/auth/logout" class="btn btn-primary" style="width: fit-content;" data-bs-toggle="modal" data-bs-target="#modalComplaint" onclick="toggleAddComplaintModal()">Tambah Aduan</a>
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
        <form action="<?= BASE_URL; ?>/Index/deleteMultipleComplaint" method="POST">
            <table class="table table-bordered align-middle table-hover text-center">
                <tr>
                    <th><input type="checkbox" name="selectAll" id="selectAll" onclick="checkAllComplaints(event)"></th>
                    <th>Judul</th>
                    <th>Waktu Aduan</th>
                    <th>Waktu Diperbarui</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

                <?php if (empty($data['complaints'])) : ?>
                    <tr>
                        <td class="text-center p-5" colspan="6">Anda belum pernah membuat aduan!</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($data['complaints'] as $complaint) : ?>
                        <tr>
                            <td><input type="checkbox" name="complaints[]" value="<?= $complaint['id'] ?>" class="complaints"></td>
                            <td><?= $complaint['title'] ?></td>
                            <td><?= date("d F Y (H:i)", $complaint['createdAt']) ?></td>
                            <td><?= $complaint['editedAt'] ?></td>
                            <td><?= $complaint['status'] ?></td>
                            <td class="d-flex column-gap-2 justify-content-center">
                                <button class="btn btn-success" onclick="toggleUpdateComplaintModal(event)" data-bs-toggle="modal" data-bs-target="#modalComplaint" type="button" data-id="<?= $complaint['id'] ?>">Ubah</button>
                                <button class="btn btn-primary" type="button" onclick="toggleDetailComplaintModal(event)" data-bs-toggle="modal" data-bs-target="#modalComplaint" data-id="<?= $complaint['id'] ?>">Detail</button>
                                <a href="<?= BASE_URL; ?>/Index/deleteComplaint/<?= $complaint['id']  ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda ingin menghapus aduan ini?')">Hapus</a>
                            </td>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus aduan yang dipilih?')">Hapus dililih</button>
        </form>


    </div>

    <!-- Add complaint modal -->
    <div class="modal fade" id="modalComplaint" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="complaintModalTitle">Tambah aduan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= BASE_URL; ?>/Index/addComplaint" method="POST" enctype="multipart/form-data" id="complaintModalForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="title" id="complaintModalFormTitle">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" style="height: 100px" name="description" id="complaintModalFormDescription"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="location" id="complaintModalFormLocation">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <img src="" class="w-100 mb-3" id="complaintModalFormImagePreview">
                            <input class="form-control form-control-sm" type="file" name="image" id="complaintModalFormImage">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="complaintModalFormSubmit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of add complaint modal -->
</div>