<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.bootstrap.php");
    exit();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['new_username'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';

    if (!empty($newUsername) && !empty($newPassword)) {
        $_SESSION['username'] = $newUsername;
        $_SESSION['password'] = $newPassword;
        $message = "Username dan password berhasil diperbarui.";
    } else {
        $message = "Semua kolom harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <title>Pengaturan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="container">
        <h2>Pengaturan Akun</h2>

        <?php if ($message): ?>
            <div class="alert alert-info"><?= htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="new_username" class="form-label">Username Baru</label>
                <input type="text" class="form-control" name="new_username" id="new_username" required value="<?= htmlspecialchars($_SESSION['username']) ?>">
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" name="new_password" id="new_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="dashboard.bootstrap.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>