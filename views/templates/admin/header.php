<main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-6">
                    <div class="header-left d-flex align-items-center">
                        <div class="menu-toggle-btn mr-15">
                            <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                <i class="lni lni-chevron-left me-2"></i> Menu
                            </button>
                        </div>

                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-6">
                    <div class="header-right">
                        <!-- profile start -->
                        <div class="profile-box ml-15">
                            <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="profile-info">
                                    <div class="info">
                                        <div class="image">
                                            <?php if (isset($_SESSION['user']['Avatar'])): ?>
                                                <img src="./public/images/uploads/<?= $_SESSION['user']['Avatar'] ?>" alt="" />
                                            <?php else: ?>
                                                <img src="./public/images/user.jpg" alt="" />
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <h6 class="fw-500"><?= $_SESSION['user']['Username'] ?></h6>
                                            <?= $_SESSION['user']['UserID'] === 1 ? '<p>SUDO</p>' : '<p>ADMIN</p>' ?>

                                        </div>
                                    </div>
                                </div>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                <li>
                                    <a href="admin.php?ctrl=user&view=profileadmin" class="author-info flex items-center p-1">
                                        <div class="image me-1">
                                            <?php if (isset($_SESSION['user']['Avatar'])): ?>
                                                <img src="./public/images/uploads/<?= $_SESSION['user']['Avatar'] ?>" alt="" />
                                            <?php else: ?>
                                                <img src="./public/images/user.jpg" alt="" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="content p-0 overflow-hidden">
                                            <h4 class="text-sm"><?= $_SESSION['user']['Username'] ?></h4>
                                            <p class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs"><?= $_SESSION['user']['Email'] ?></p>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="admin.php?ctrl=user&view=logout"> <i class="lni lni-exit"></i> Sign Out </a>
                                </li>
                            </ul>
                        </div>
                        <!-- profile end -->
                    </div>
                </div>
            </div>
        </div>
    </header>