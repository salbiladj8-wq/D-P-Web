<?php
$page_title = 'Register';
require __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<section>
    <div class="section-title">
        <span>Akun Petugas</span>
        <h2>Register</h2>
    </div>

    <?php if ($flash): ?>
        <p class="flash flash-<?php echo htmlspecialchars($flash['type'], ENT_QUOTES, 'UTF-8'); ?>">
            <?php echo htmlspecialchars($flash['pesan'], ENT_QUOTES, 'UTF-8'); ?>
        </p>
    <?php endif; ?>

    <form method="post" action="proses_register.php">
        <p>
            <label for="nama">Nama</label><br>
            <input type="text" id="nama" name="nama" maxlength="100" required>
        </p>
        <p>
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" maxlength="50" autocomplete="username" required>
        </p>
        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" minlength="8" autocomplete="new-password" required>
        </p>
        <p>
            <button type="submit">Buat Akun</button>
        </p>
    </form>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>