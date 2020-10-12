<!-- Includes -->
<?php $this->load->view('includes/auth/header.php'); ?>
<!-- Includes -->

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="<?= base_url('login'); ?>">
                    <!-- Controller -->
                    <span class="login100-form-title p-b-26">
                        Halaman Login
                    </span>
                    <span class="login100-form-title p-b-48">
                    </span>

                    <!-- Pesan Jika Sudah Membuat Akun -->
                    <?= $this->session->flashdata('message'); ?>

                    <div class="wrap-input100 validate-input" data-validate="Input Data Dengan Benar">
                        <input class="input100" type="text" id="email" name="email">
                        <span class="focus-input100" data-placeholder="Email" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" id="password" name="password">
                        <span class="focus-input100" data-placeholder="Password" value="<?= set_value('password'); ?>">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Don’t have an account?
                        </span>

                        <a class="txt2" href="<?= base_url('login/registrasi'); ?>">
                            Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!-- Includes -->
    <?php $this->load->view('includes/auth/footer.php'); ?>
    <!-- Includes -->