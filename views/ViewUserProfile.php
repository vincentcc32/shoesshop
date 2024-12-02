<div class="profile">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Profile</li>
            </ol>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-bg-light p-4 border rounded-1 mb-4">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h6 class="fs-2">My Profile</h6>
                        <button class="border-0 bg-transparent d-flex flex-column align-items-center active-btn">
                            <i class="fa-regular fa-pen-to-square fs-2"></i>
                            <span class="fs-4 text-decoration-none <?= $_SESSION['user']['Active'] ? "text-success" : "text-primary" ?>"><?= $_SESSION['user']['Active'] ? "Done" : "Active" ?></span>
                        </button>
                    </div>
                    <form class="profile-info" action="" method="POST" enctype="multipart/form-data">
                        <div class="d-flex align-items-center mb-4">
                            <div class="profile-image">
                                <?php if (isset($_SESSION['user']['Avatar'])): ?>
                                    <img src="./public/images/uploads/<?= $_SESSION['user']['Avatar'] ?>" alt="" />
                                <?php else: ?>
                                    <img src="./public/images/user.jpg" alt="" />
                                <?php endif; ?>
                                <div class="update-image">
                                    <input class="" type="file" id="user-update-img" name="avatar" />
                                    <label class="d-inline-blockblock" for="user-update-img"><i class="fa-solid fa-cloud-arrow-up fs-4"></i></label>
                                </div>
                            </div>
                            <div class="profile-meta">
                                <h5 class="fw-bold fs-4 text-dark mb-4"><?= $_SESSION['user']['Username'] ?></h5>
                                <p class="opacity-50 fs-4"><?= $_SESSION['user']['Email'] ?></p>
                            </div>
                        </div>
                        <div class="input-style-1">
                            <label class="mb-4 fs-4 d-block">Name</label>
                            <input class="fs-4 w-100 p-3 mb-4" type="text" placeholder="Username" name="name" value="<?= $_SESSION['user']['Username'] ?>" />
                        </div>
                        <div class="input-style-1">
                            <label class="mb-4 fs-4 d-block">Email</label>
                            <input readonly class="fs-4 w-100 p-3 mb-4" type="email" placeholder="admin@example.com" name="email" value="<?= $_SESSION['user']['Email'] ?>" />
                        </div>
                        <div class="input-style-1">
                            <label class="mb-4 fs-4 d-block">Password</label>
                            <input class="fs-4 w-100 p-3 mb-4 input-password-user" type="password" name="password" placeholder="Enter password" />
                        </div>
                        <div class="change-password-user">
                            <div class="input-style-1">
                                <label class="mb-4 fs-4 d-block">New Password</label>
                                <input class="fs-4 w-100 p-3 mb-4" type="password" name="newpassword" placeholder="Enter new password" />
                            </div>
                            <div class="input-style-1">
                                <label class="mb-4 fs-4 d-block">Confirm New Password</label>
                                <input class="fs-4 w-100 p-3 mb-4" type="password" name="confnewpassword" placeholder="Enter confirm new password" />
                            </div>
                        </div>
                        <div class="input-style-1">
                            <label class="mb-4 fs-4 d-block">Phone Number</label>
                            <input class="fs-4 w-100 p-3 mb-4" type="number" min="0" minlength="10" name="phonenumber" maxlength="0" placeholder="+84" value="<?= $_SESSION['user']['SDT'] ?>" />
                        </div>
                        <div class="input-style-1">
                            <label class="mb-4 fs-4 d-block">Address</label>
                            <input class="fs-4 w-100 p-3 mb-4" type="text" placeholder="Address" name="address" value="<?= $_SESSION['user']['DiaChi'] ?>" />
                        </div>
                        <?php if (isset($_SESSION['mess'])): ?>
                            <p class="alert alert-warning fs-4"><?= $_SESSION['mess'] ?></p>
                        <?php unset($_SESSION['mess']);
                        endif; ?>
                        <button class="btn btn-primary p-3 text-bg-primary fs-4 w-100 text-center" name="updateuser">
                            Update
                        </button>
                    </form>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
</div>