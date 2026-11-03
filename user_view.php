<?php require_once 'view/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 m-0">Data User (Anggota & Admin)</h2>
    <a href="index.php?controller=user&action=create" class="btn btn-primary">+ Tambah User Baru</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <table class="table table-striped table-hover tabel-data align-middle" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th width="5%">No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($users as $user): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($user['nama']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td>
                        <?php if($user['role'] == 'admin'): ?>
                            <span class="badge bg-danger">Admin</span>
                        <?php else: ?>
                            <span class="badge bg-success">Anggota</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="index.php?controller=user&action=edit&id=<?= $user['id'] ?>" class="btn btn-sm btn-warning text-white">Edit</a> 
                        <a href="index.php?controller=user&action=delete&id=<?= $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'view/layout/footer.php'; ?>