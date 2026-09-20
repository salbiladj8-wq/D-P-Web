<?php
$page_title = "Daftar Anggota";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

if (!isset($_SESSION['anggota'])) {
    $_SESSION['anggota'] = [
        ['no_anggota' => 'A001', 'nama' => 'Siti Aminah', 'alamat' => 'Malang', 'no_hp' => '0812xxxx'],
        ['no_anggota' => 'A002', 'nama' => 'Budi Santoso', 'alamat' => 'Batu', 'no_hp' => '0813xxxx'],
        ['no_anggota' => 'A003', 'nama' => 'Salbila', 'alamat' => 'Bima', 'no_hp' => '0814xxxx'],
        ['no_anggota' => 'A004', 'nama' => 'Najwa', 'alamat' => 'Blitar', 'no_hp' => '0815xxxx'],
        ['no_anggota' => 'A005', 'nama' => 'Bebe', 'alamat' => 'Tuban', 'no_hp' => '0816xxxx'],
        ['no_anggota' => 'A006', 'nama' => 'Andra', 'alamat' => 'Bekasi', 'no_hp' => '0817xxxx'],
        ['no_anggota' => 'A007', 'nama' => 'Dewfan', 'alamat' => 'Lombok', 'no_hp' => '0817xxxx']
    ];
}

$daftarAnggota = $_SESSION['anggota'];
?>

<section>
    <h2>Daftar Anggota</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
    <?php endif; ?>

    <div class="search-box">
        <label for="search-input">Cari Nama Anggota</label>
        <input type="text" id="search-input" placeholder="Ketik nama anggota...">
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No. Anggota</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($daftarAnggota as $anggota): ?>
                <tr>
                    <td><?php echo $anggota['no_anggota']; ?></td>
                    <td><?php echo $anggota['nama']; ?></td>
                    <td><?php echo $anggota['alamat']; ?></td>
                    <td><?php echo $anggota['no_hp']; ?></td>
                    <td>
                        <button type="button">Edit</button>
                        <button type="button" class="btn-hapus">Hapus</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>