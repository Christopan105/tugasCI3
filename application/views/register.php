<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('header'); ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="name" name="name"
                                            placeholder="Full name" value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger p1-3">', '</small>'); ?>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 ">
                                        <input type="email" class="form-control form-control-user" id="email"
                                            name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger p1-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1"
                                            name="password1" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2"
                                            name="password2" placeholder="Repeat Password">
                                    </div>
                                    <?= form_error('password1', '<small class="text-danger p1-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('login'); ?>">Already have an account?
                                    Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- js dipintahkan ke js.php -->
    <?php $this->load->view('js'); ?>

</body>

</html>