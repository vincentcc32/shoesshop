<header class="header clearfix">
    <div class="header__item pt-4 clearfix">
        <div class="container">
            <div class="row align-items-center justify-content-between py-3 ">
                <div class="col-4 col-lg-2">
                    <div class="header__item-logo">
                        <a href="?ctrl=page&view=home">
                            <img src="./public/images/logo.png" alt="" class="w-100">
                        </a>
                    </div>
                </div>
                <div class="col-5 col-lg-6 col-md-6 position-relative">
                    <div class="d-sm-none text-end ">
                        <label for="show-search"
                            class="fa-solid fa-magnifying-glass fs-1 cursor-pointer header__item-icon-search-sm"></label>
                    </div>
                    <input type="checkbox" name="" id="show-search" hidden>
                    <form action="" method="post" class="header__item-search-sm d-none">
                        <input type="text" placeholder="Search" class="p-3 fs-4">
                    </form>
                    <div class="header__item-search text-center">
                        <form action="" method="get" class="position-relative d-none d-sm-inline-block">
                            <input type="text" class="py-2 w-100 fs-4 px-2 header__item-search-input"
                                placeholder="Search">
                            <i class="fa-solid fa-magnifying-glass position-absolute header__item-search-icon"></i>
                        </form>
                    </div>
                </div>
                <div class="col-3 col-lg-4 col-md-2 d-flex  align-items-end align-items-center">
                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle header__item-user me-3 me-sm-5 flex-grow-1 text-end align-items-center cursor-pointer" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if (isset($_SESSION['user']['Avatar'])): ?>
                                    <img src="./public/images/uploads/<?= $_SESSION['user']['Avatar'] ?>" class="d-inline-block rounded-5 header__item-user-img" alt="">
                                <?php else: ?>
                                    <img src="./public/images/user.jpg" class="d-inline-block rounded-5 header__item-user-img" alt="">
                                <?php endif; ?>
                                <p class="fs-4 d-inline-block mx-3 d-none d-lg-inline-block mb-0 text-danger"><?= $_SESSION['user']['Username'] ?></p>
                            </button>
                            <ul class="dropdown-menu p-3 overflow-hidden">

                                <li class="py-3">
                                    <a href="index.php?ctrl=user&view=profileuser" class="header__item-user me-3 me-sm-5 flex-grow-1 text-start align-items-center cursor-pointer dropdown-item fs-4">
                                        <?php if (isset($_SESSION['user']['Avatar'])): ?>
                                            <img src="./public/images/uploads/<?= $_SESSION['user']['Avatar'] ?>" class="d-inline-block rounded-5 header__item-user-img" alt="">
                                        <?php else: ?>
                                            <img src="./public/images/user.jpg" class="d-inline-block rounded-5 header__item-user-img" alt="">
                                        <?php endif; ?>
                                        <p class="fs-4 d-inline-block mx-3 d-none d-lg-inline-block mb-0 text-danger"><?= $_SESSION['user']['Username'] ?></p>
                                    </a>
                                </li>
                                <li class="py-3"><a class="dropdown-item fs-4" href="index.php?ctrl=user&view=logout">Log out</a></li>
                            </ul>
                        </div>

                    <?php else: ?>
                        <div class="header__item-user me-3 me-sm-5 flex-grow-1 text-end cursor-pointer dropdown">
                            <div class="btn dropdown-toggle header__item-dropdown" data-bs-toggle="dropdown"
                                aria-expanded="false" type="button">
                                <i class="fa-solid fa-user header__item-user-icon"></i>
                                <span class="fs-4 m-0 d-none d-lg-inline-block">Account</span>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item fs-4" href="?ctrl=user&view=login">Login</a></li>
                                <li><a class="dropdown-item fs-4" href="?ctrl=user&view=register">Register</a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="header__item-cart cursor-pointer">
                        <div class="fs-4 m-0 d-flex align-items-center ">
                            <a href="?ctrl=product&view=cart" class="text-dark text-decoration-none"><i class="fa-solid fa-cart-shopping me-2 header__item-cart-icon text-dark"></i>
                                <div class="d-none d-lg-block">
                                    <span class="d-block">
                                        <?php if (isset($_SESSION['cart'])): ?>
                                            Cart (<?= count($_SESSION['cart']) ?>)
                                        <?php else: ?>
                                            Cart (0)
                                        <?php endif; ?>
                                    </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand nav">
        <div class="container">
            <i class="fa-solid fa-bars bars-icon d-lg-none" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></i>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="<?= $_GET['view'] === 'home' ? 'header-active' : "" ?>" href="?ctrl=page&view=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?= $_GET['view'] === 'about' ? 'header-active' : "" ?>" href="?ctrl=page&view=about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?= $_GET['view'] === 'services' ? 'header-active' : "" ?>" href="?ctrl=page&view=services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="<?= $_GET['view'] === 'contact' ? 'header-active' : "" ?>" href="?ctrl=page&view=contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-start w-50" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="offcanvasScrollingLabel">
            </h4>
            <button type="button" class="btn-close fs-4" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <h4 class="text-uppercase fs-1 text-center my-2">MENU</h4>
            <ul class="siderbar__list">
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="py-3"><a href="?ctrl=user&view=profileuser" class="siderbar__list-link text-danger overflow-hidden">Welcom: <?= $_SESSION['user']['Username'] ?></a></li>
                <?php endif; ?>
                <li class="py-3"><a href="?ctrl=product&view=favourite" class="siderbar__list-link">Favourite</a></li>
                <li class="py-3"><a href="?ctrl=product&view=favourite" class="siderbar__list-link">Favourite</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="py-3"><a href="?ctrl=product&view=orders" class="siderbar__list-link">orders</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="py-3"><a href="?ctrl=user&view=chat" class="siderbar__list-link">Chat</a></li>
                <?php endif; ?>
                <li class="py-3">
                    <p class="d-inline-flex gap-1">
                        <button class="btn fs-3 p-0 d-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample py-2">
                            Category <i class="fa-solid fa-caret-down fs-3"></i>
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card border-0 rounded-0">
                            <a href="?ctrl=product&view=categoryshoes&make=1" class="d-block py-3 fs-3 text-dark ">Shoes</a>
                            <a href="?ctrl=product&view=categoryfashion&make=1" class="d-block py-3 fs-3 text-dark ">Fashion</a>
                        </div>
                    </div>
                </li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="py-3"><a href="?ctrl=user&view=logout" class="siderbar__list-link">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>