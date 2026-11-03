</div> <!-- Penutup div container -->

    <footer class="bg-white border-top py-3 mt-5">
        <div class="container text-center text-muted">
            <small>&copy; 2026 SIPERPUS - Perpustakaan Digital MVC (Bootstrap 5)</small>
        </div>
    </footer>

    <!-- JS Scripts (jQuery, Bootstrap 5 Bundle, DataTables Bootstrap 5) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.tabel-data').DataTable({
                "pageLength": 10, // Maksimal 10 data per halaman
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });
    </script>

    <!-- Global Flash Notification -->
    <?php if(isset($_SESSION['notifikasi'])): ?>
        <script>
            alert("<?= $_SESSION['notifikasi'] ?>");
        </script>
        <?php unset($_SESSION['notifikasi']); ?>
    <?php endif; ?>
</body>
</html>