<div class="data-benar" data-benar="<?= $this->session->flashdata('true'); ?>"></div>
<div class="data-salah" data-salah="<?= $this->session->flashdata('false'); ?>"></div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('asset/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('asset/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('asset/swall/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('asset/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('asset/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('asset/script.js'); ?>"></script>
<script>
    $('#AdminTable').DataTable();
</script>
</body>

</html>