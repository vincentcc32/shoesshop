<section class="signin-section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Sign up</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <div class="row g-0 auth-row">
            <div class="col-lg-6">
                <div class="auth-cover-wrapper bg-primary-100">
                    <div class="auth-cover">
                        <div class="title text-center">
                            <h1 class="text-primary mb-10">Get Started</h1>
                            <p class="text-medium">
                                Start creating Admin Account
                            </p>
                        </div>
                        <div class="cover-image">
                            <img src="assets/images/auth/signin-image.svg" alt="" />
                        </div>
                        <div class="shape-image">
                            <img src="assets/images/auth/shape.svg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
                <div class="signup-wrapper">
                    <div class="form-wrapper">
                        <h6 class="mb-15">Register Admin Account</h6>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Name</label>
                                        <input required type="text" placeholder="Name" name="username" />
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Email</label>
                                        <input required type="email" placeholder="Email" name="email" />
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Password</label>
                                        <input required type="password" placeholder="Password" name="password" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Confirm Password</label>
                                        <input required type="password" placeholder="Password" name="confpassword" />
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="button-group d-flex justify-content-center flex-wrap">
                                        <?php if (isset($_SESSION['mess'])): ?>
                                            <p class="alert alert-warning fs-6"><?= $_SESSION['mess'] ?></p>
                                        <?php unset($_SESSION['mess']);
                                        endif;  ?>
                                        <button class="main-btn primary-btn btn-hover w-100 text-center" name="registeradmin">
                                            Sign Up
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</section>