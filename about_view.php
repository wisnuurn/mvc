<?php require_once 'view/layout/header.php'; ?>

<h2>Tentang Saya</h2>

<div style="background-color: #f8f9fa; padding: 25px; border-radius: 8px; border-left: 5px solid #3498db; margin-bottom: 25px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <p style="font-size: 16px; color: #2c3e50; line-height: 1.8;">
        <?php echo $info; ?>
    </p>
</div>

<a href="index.php?controller=user&action=index" class="btn">Kembali ke Beranda</a>

<?php require_once 'view/layout/footer.php'; ?>