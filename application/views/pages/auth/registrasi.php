<!-- Includes -->
<?php $this->load->view('includes/auth/header.php'); ?>
<!-- Includes -->

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="<?= base_url('login/registrasi'); ?>">
                    <!--  -->

                    <span class="login100-form-title p-b-26">
                        Halaman Registrasi
                    </span>
                    <span class="login100-form-title p-b-48">
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Isi Data Dengan Benar">
                        <input class="input100" type="text" id="name" name="name" value="<?= set_value('name'); ?>">
                        <span class="focus-input100" data-placeholder="Full Name"></span>
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- <div class="wrap-input100 validate-input" data-validate="Isi Data Dengan Benar">
                        <input class="input100" type="text" id="role_id" name="role_id" value="<?= set_value('role_id'); ?>">
                        <span class="focus-input100 dropdown-item" data-placeholder="Daftar Sebagai"></span>
                        
                        <select name="role" class="form-control" id="id">
                            <?php
                            $sql = $this->db->query("SELECT * FROM tb_user WHERE role_id='{$_SESSION['role_id']}'");
                            foreach ($sql->result() as $row) {
                                ?>
                                <option value="<?= $row->id ?>"><?= $row->role ?></option>
                            <?php } ?>
                        </select>

                    </div> -->



                    <div class="wrap-input100 validate-input" data-validate="Isi Data Dengan Benar">
                        <input class="input100" type="text" id="email" name="email" value="<?= set_value('email'); ?>">
                        <span class="focus-input100" data-placeholder="Email"></span>
                        <!-- <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="wrap-input100 validate-input" data-validate="Masukkan password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" id="password1" name="password1">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Masukkan password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" id="password2" name="password2">
                        <span class="focus-input100" data-placeholder="Repeat Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Daftar
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Already have an account?
                        </span>

                        <a class="txt2" href="<?= base_url('login'); ?>">
                            Sign In
                        </a>
                        <!--  -->

                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!-- Includes -->
    <?php $this->load->view('includes/auth/footer.php'); ?>
    <!-- Includes -->