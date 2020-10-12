<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a href="<?= base_url('Login/logout'); ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>copyright &copy; E-MedCo <script>
                    document.write(new Date().getFullYear());
                </script>
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('assets/js/chat.js'); ?>"></script>

<!-- Laravel -->
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');

</script>
<!-- Laravel -->

<script src="<?= base_url('assets/vendor-admin/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/vendor-admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/vendor-admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/vendor-admin/'); ?>js/ruang-admin.min.js"></script>


<!-- Page level plugins Datatables -->
<script src="<?= base_url('assets/vendor-admin/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/vendor-admin/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Script Datatables -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>

<script>
    $('.custom-file-input').on('change', function() { // cari file custom input
        let fileName = $($this).val().split('\\').pop(); // untuk ambil nama file 
        $(this).next('.custom-file-label').addClass("Selected").html(fileName); // simpan kedalam file
    });
</script>


</body>

</html>