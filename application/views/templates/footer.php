</div> <!-- Penutup container -->

<footer class="text-center mt-5 mb-3">
    <span class="badge badge-success">&copy; 2025 - Instalasi Tangga</span>
</footer>

<!-- DataTables Responsive CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">

<!-- jQuery sudah di-include sebelumnya -->
<!-- DataTables Responsive JS -->
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

<!-- Aktifkan DataTables -->
<script>
    $(document).ready(function () {
        $('#tabelResep').DataTable({
            responsive: true,
            order: [[5, 'desc']],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });
    });
</script>

</body>
</html>
