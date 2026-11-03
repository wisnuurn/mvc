<?php require_once 'view/layout/header.php'; ?>

<div style="max-width: 400px; margin: 40px auto; text-align: center; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
    <h2 style="border: none; margin-bottom: 20px;">Login Akun</h2>
    <form action="index.php?controller=auth&action=proses_login" method="POST">
        
        <label style="text-align: left; display: block;">Email:</label>
        <input type="email" name="email" required placeholder="Contoh: admin@perpus.com" style="width: 100%; padding: 12px; margin-top: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="text-align: left; display: block;">Password:</label>
        <input type="password" name="password" required placeholder="Masukkan password" style="width: 100%; padding: 12px; margin-top: 8px; margin-bottom: 25px; border: 1px solid #ccc; border-radius: 5px;">
        
        <button type="submit" style="width: 100%; padding: 12px; font-size: 16px;">Masuk</button>
    </form>

    <div style="margin-top: 20px; font-size: 14px;">
        Belum punya akun? <a href="index.php?controller=auth&action=register" style="color: #3498db; text-decoration: none; font-weight: bold;">Daftar di sini</a>
    </div>
</div>

<?php require_once 'view/layout/footer.php'; ?>