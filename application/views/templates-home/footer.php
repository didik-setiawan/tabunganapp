<footer class="m-0 p-0 bg-dark">
    <div class="text-center text-light p-3">
        Copyright &copy; 2020 App Tabungan Siswa
    </div>
</footer>
<script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('asset/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('asset/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<script>
    $('#UserTable').DataTable({
        "ordering": false,
        "searching": false,
        "info": false
    });
</script>
</body>

</html>