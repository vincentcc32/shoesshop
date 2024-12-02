<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Profile</h2>
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

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card-style settings-card-1 mb-30">
                    <div class="title mb-30 d-flex justify-content-between align-items-center">
                        <h6>My Profile</h6>
                        <button class="border-0 bg-transparent">
                            <i class="lni lni-pencil-alt"></i>
                        </button>
                    </div>
                    <form class="profile-info" action="" method="POST" enctype="multipart/form-data">
                        <div class="d-flex align-items-center mb-30">
                            <div class="profile-image">
                                <?php if (isset($user['Avatar'])): ?>
                                    <img src="./public/images/uploads/<?= $user['Avatar'] ?>" alt="" />
                                <?php else: ?>
                                    <img src="./public/images/user.jpg" alt="" />
                                <?php endif; ?>
                                <div class="update-image">
                                    <input type="file" id="admin-update-img" name="avatar" />
                                    <label for="admin-update-img"><i class="lni lni-cloud-upload"></i></label>
                                </div>
                            </div>
                            <div class="profile-meta">
                                <h5 class="text-bold text-dark mb-10"><?= $user['Username'] ?></h5>
                                <p class="text-sm <?= $user['Active'] ? "text-success" : "text-primary" ?>"><?= $user['Active'] ? "Don" : "Active" ?></p>
                            </div>
                        </div>
                        <div class="input-style-1">
                            <label>Name</label>
                            <input type="text" placeholder="Username" name="name" value="<?= $user['Username'] ?>" />
                        </div>
                        <div class="input-style-1">
                            <label>Email</label>
                            <input readonly type="email" placeholder="admin@example.com" name="email" value="<?= $user['Email'] ?>" />
                        </div>
                        <div class="input-style-1">
                            <label>Password</label>
                            <input type="password" class="input-password-admin" name="password" placeholder="Enter password" />
                        </div>
                        <div class="change-password-admin">
                            <div class="input-style-1">
                                <label>New Password</label>
                                <input type="password" name="newpassword" placeholder="Enter new password" />
                            </div>
                            <div class="input-style-1">
                                <label>Confirm New Password</label>
                                <input type="password" name="confnewpassword" placeholder="Enter confirm new password" />
                            </div>
                        </div>
                        <div class="input-style-1">
                            <label>Phone Number</label>
                            <input type="number" min="0" minlength="10" name="phonenumber" maxlength="0" placeholder="+84" value="<?= $user['SDT'] ?>" />
                        </div>
                        <div class="input-style-1">
                            <label>Address</label>
                            <input type="text" placeholder="Address" name="address" value="<?= $user['DiaChi'] ?>" />
                        </div>
                        <?php if (isset($_SESSION['mess'])): ?>
                            <p class="alert alert-warning fs-4"><?= $_SESSION['mess'] ?></p>
                        <?php unset($_SESSION['mess']);
                        endif; ?>
                        <button class="main-btn primary-btn btn-hover w-100 text-center" name="updateadmin">
                            Update Admin
                        </button>
                    </form>
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>