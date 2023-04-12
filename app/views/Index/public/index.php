<div class="d-flex flex-column row-gap-3 py-5 container">
    <button class="btn btn-danger ms-auto rounded-0" data-bs-toggle="modal" data-bs-target="#logOutModal" style="width: fit-content;">Keluar</button>
    <?php Flasher::flash() ?>
    <div class="">
        <h1 class="p-0 m-0">Aduan Saya</h1>
        <p class="p-0 m-0">Daftar aduan yang telah Anda buat</p>
    </div>

    <div class="d-flex justify-content-between">
        <div class="input-group">
            <input type="text" class="form-control rounded-0" placeholder="Cari aduan..." style="max-width: 300px;">
            <span class="input-group-text rounded-0" id="basic-addon2">Cari</span>
        </div>
        <a href="" class="btn btn-success rounded-0 d-flex align-content-center column-gap-2" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#modalComplaint"><i class="bi bi-plus-lg"></i>Tambah</a>
    </div>
    <form action="<?= BASE_URL; ?>/Index/deleteMultipleComplaint" method="POST">
        <table class="table table-bordered table-hover table-striped table-responsive">
            <tr>
                <th><input type="checkbox" name="selectAll" id="selectAll" onclick="checkAllComplaints(event)"></th>
                <th class="w-auto">Judul</th>
                <th style="max-width: 200px;">Waktu Aduan</th>
                <th style="max-width: 200px;">Waktu Diperbarui</th>
                <th>Status</th>
                <th style="max-width: 60px;">Ubah</th>
                <th style="max-width: 60px;">Hapus</th>
            </tr>

            <?php if (empty($data['complaints'])) : ?>
                <tr>
                    <td class="p-5 text-center" colspan="7">Anda belum pernah membuat aduan!</td>
                </tr>
            <?php else : ?>
                <?php foreach ($data['complaints'] as $complaint) : ?>
                    <tr>
                        <td><input type="checkbox" name="complaints[]" value="<?= $complaint['id'] ?>" class="complaints"></td>
                        <td><?= $complaint['title'] ?></td>
                        <td><?= date("d F Y (H:i)", $complaint['createdAt']) ?></td>
                        <td><?= $complaint['editedAt'] === 0 ? "-" : date("d F Y (H:i)", $complaint['editedAt']) ?></td>
                        <td><?= $complaint['status'] ?></td>
                        <td><button class="btn btn-primary rounded-0" onclick="toggleUpdateComplaintModal(event)" data-bs-toggle="modal" data-bs-target="#modalComplaint" type="button" data-id="<?= $complaint['id'] ?>"><i class="bi bi-pencil-fill"></i></button></td>
                        <td><a href="<?= BASE_URL; ?>/Index/deleteComplaint/<?= $complaint['id']  ?>" class="btn btn-danger rounded-0" onclick="return confirm('Apakah Anda ingin menghapus aduan ini?')"><i class="bi bi-trash3-fill"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <button type="button" class="btn btn-danger rounded-0" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus dipilih</button>

        <!-- Delete confirm modal -->
        <div class="modal" tabindex="-1" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin menghapus aduan yang dipilih?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of delete confirm modal -->
    </form>
</div>

<!-- Add complaint modal -->
<div class="modal fade" id="modalComplaint" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="complaintModalTitle">Tambah aduan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASE_URL; ?>/Index/addComplaint" method="POST" enctype="multipart/form-data" id="complaintModalForm">
                <div class="modal-body d-flex flex-column row-gap-3">
                    <input type="text" class="form-control rounded-0" name="title" id="complaintModalFormTitle" placeholder="Judul">
                    <textarea class="form-control rounded-0" style="height: 100px" name="description" id="complaintModalFormDescription" placeholder="Deskripsi"></textarea>
                    <input type="text" class="form-control rounded-0" name="location" id="complaintModalFormLocation" placeholder="Lokasi">

                    <div class="input-group mb-3">
                        <label class="input-group-text rounded-0" for="inputGroupFile01">Gambar</label>
                        <input type="file" class="form-control rounded-0" name="image" id="complaintModalFormImage">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-0 d-flex align-content-center column-gap-2" id="complaintModalFormSubmit"><i class="bi bi-plus-lg"></i>Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of add complaint modal -->

<!-- Delete confirm modal -->
<div class="modal" tabindex="-1" id="logOutModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a href="<?= BASE_URL; ?>/Auth/logOut" class="btn btn-primary">Ya</a>
            </div>
        </div>
    </div>
</div>
<!-- End of delete confirm modal -->