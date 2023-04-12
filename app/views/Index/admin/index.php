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
    </div>
    <form action="<?= BASE_URL; ?>/Index/deleteMultipleComplaint" method="POST">
        <div class="table-responsive-lg">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <th><input type="checkbox" name="selectAll" id="selectAll" onclick="checkAllComplaints(event)"></th>
                    <th class="w-auto">Judul</th>
                    <th style="max-width: 200px;">Waktu Aduan</th>
                    <th style="max-width: 200px;">Waktu Diperbarui</th>
                    <th>Status</th>
                    <th style="max-width: 60px;">Lihat</th>
                    <th style="max-width: 60px;">Tandai</th>
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
                            <td><?= $complaint['editedAt'] === NULL ? "" : date("d F Y (H:i)", $complaint['editedAt']) ?></td>
                            <td><?= $complaint['status'] ?></td>
                            <td><a href="<?= BASE_URL; ?>/index/detail/<?= $complaint['id'] ?>" class="btn btn-primary rounded-0"><i class="bi bi-eye-fill"></i></a></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?= BASE_URL; ?>/Index/markComplaint/<?= $complaint['id'] ?>/0">Belum diproses</a></li>
                                        <li><a class="dropdown-item" href="<?= BASE_URL; ?>/Index/markComplaint/<?= $complaint['id'] ?>/1">Dalam proses</a></li>
                                        <li><a class="dropdown-item" href="<?= BASE_URL; ?>/Index/markComplaint/<?= $complaint['id'] ?>/2">Selesai</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td><a href="<?= BASE_URL; ?>/index/deleteComplaint/<?= $complaint['id']  ?>" class="btn btn-danger rounded-0" onclick="return confirm('Apakah Anda ingin menghapus aduan ini?')"><i class="bi bi-trash3-fill"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
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

<!-- Logout confirm modal -->
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
<!-- End of logout confirm modal -->