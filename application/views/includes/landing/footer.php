</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="text-center">
                <div class="copyright">
                    Copyright © <strong>E-MedCo</strong>. <?= date('Y'); ?>
                </div>

            </div>

        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor-user/'); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/vendor-user/'); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/vendor-user/'); ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/vendor-user/'); ?>assets/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url('assets/vendor-user/'); ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/vendor-user/'); ?>assets/vendor/counterup/counterup.min.js"></script>
<script src="<?= base_url('assets/vendor-user/'); ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/vendor-user/'); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/vendor-user/'); ?>assets/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url('assets/vendor-user/'); ?>assets/vendor/aos/aos.js"></script>

<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- Chat -->
<script src="<?= base_url('assets/'); ?>js/chat.js"></script>


<script>
    $('.custom-file-input').on('change', function() { // cari file custom input
        let fileName = $($this).val().split('\\').pop(); // untuk ambil nama file 
        $(this).next('.custom-file-label').addClass("Selected").html(fileName); // simpan kedalam file
    });
</script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets/vendor-user/'); ?>assets/js/main.js"></script>

<!-- Script Maps -->
<script>
    function setToForm(Latitude, Longitude) {
        $('input[name="lat"]').val(Latitude);
        $('input[name="lng"]').val(Longitude);
    }

    function compute() {
        let price = document.getElementById("harga").value;
        let qty = document.getElementById("qty").value;
        document.getElementById("total").value = price * qty;
    }



    function setToForm(Latitude, Longitude) {
        $('input[name="lat"]').val(Latitude);
        $('input[name="lng"]').val(Longitude);
    }
</script>


<!-- Collapse -->
<script>
    $(document).on('click', '.panel-heading span.clickable', function(e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');

        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');

        }
    })
</script>

</body>

</html>