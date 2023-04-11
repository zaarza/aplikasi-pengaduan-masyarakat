<?php Flasher::flash() ?>
<div class="d-flex flex-column row-gap-2">
    <div class="ms-auto">
        <a href="<?= BASE_URL; ?>/auth/logout" class="btn btn-danger" style="width: fit-content;">Logout</a>
    </div>
    <div class="d-flex flex-column row-gap-1 bg-secondary text-light p-3 rounded">
        <p class="m-0">Halo,</p>
        <h3 class="m-0"><?= $_SESSION['user']['fullName'] ?></h3>
        <p class="m-0">Admin</p>
    </div>
</div>