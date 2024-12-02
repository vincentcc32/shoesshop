<div class="content min-h-70vh">
    <div class="content__img mt-5">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="height: 100%;">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="./public/images/banner.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="./public/images/banner3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./public/images/banner5.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./public/images/banner7.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon text-bg-dark" style="height: 20%; width: 20%;"
                    aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon text-bg-dark" style="height: 20%; width: 20%;"
                    aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container">
        <div class="content__item">
            <div class="content__title">
                <h2>
                    <a href="?ctrl=product&view=shoes">SHOES</a>
                </h2>
            </div>
            <div class="row g-5">
                <?php if ($dsspShoes): ?>
                    <?php foreach ($dsspShoes as $sp) : ?>

                        <div class="col-6 col-md-3 col-lg-4">
                            <div class="content__product-box position-relative">
                                <a href="?ctrl=product&view=detail&sp=<?= $sp['Slug'] ?>" class="content__product-link text-decoration-none">
                                    <div class="content__product-sale-flash">-
                                        <?= number_format((($sp['Price'] - $sp['SalePrice']) / $sp['Price']) * 100) . "%" ?>
                                    </div>
                                    <?php $hasFavour = false;
                                    if (isset($_SESSION['favourite'])) {
                                        foreach ($_SESSION['favourite'] as $value) {
                                            if ($value['ID'] === $sp['ProductID']) {
                                                $hasFavour = true;
                                                break;
                                            }
                                        }
                                    } ?>
                                    <button type="button" class="btn btn-outline-danger border-0 btn-favourite <?= $hasFavour ? "active" : "" ?>" data-productid="<?= $sp['ProductID'] ?>" data-bs-toggle="button">
                                        <i class="fa-regular fa-heart fs-2"></i>
                                    </button>
                                    <?php if ($sp['Instock'] == 0): ?>
                                        <div class="content__product-sale-off">
                                            het hang
                                        </div>
                                    <?php endif; ?>
                                    <div class="content__product-img">
                                        <img src="./public/images/uploads/<?= $sp['Image'] ?>" alt="" class="w-100">
                                    </div>
                                    <div class="content__product-info text-center">
                                        <div class="content__product-name">
                                            <h3 class="text-uppercase"><?= $sp['Name'] ?></h3>
                                        </div>
                                        <div class="content__product-price fs-4">
                                            <span class="contant__product-old-price mx-2">
                                                <del><?= $sp['Price'] == $sp['SalePrice'] ? "" : number_format($sp['Price']) . "đ" ?></del>
                                            </span>
                                            <span class="contant__product-sale-price mx-2"><?= $sp['Price'] == $sp['SalePrice'] ? number_format($sp['Price']) . "đ" : number_format($sp['SalePrice']) . "đ" ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="text-center w-75 pt-5">
                            <img src="./public/images/noproduct.jpg" alt="" class="w-100">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="content__item mt-5">
            <div class="content__title">
                <h2>
                    <a href="?ctrl=product&view=fashion">FASHION</a>
                </h2>
            </div>
            <div class="row g-5">
                <?php if ($dsspFashion): ?>
                    <?php foreach ($dsspFashion as $sp) : ?>

                        <div class="col-6 col-md-3 col-lg-4">
                            <div class="content__product-box position-relative">
                                <a href="?ctrl=product&view=detail&sp=<?= $sp['Slug'] ?>" class="content__product-link text-decoration-none">
                                    <div class="content__product-sale-flash"> -
                                        <?= number_format((($sp['Price'] - $sp['SalePrice']) / $sp['Price']) * 100) . "%" ?>
                                    </div>
                                    <?php $hasFavour = false;
                                    if (isset($_SESSION['favourite'])) {
                                        foreach ($_SESSION['favourite'] as $value) {
                                            if ($value['ID'] === $sp['ProductID']) {
                                                $hasFavour = true;
                                                break;
                                            }
                                        }
                                    } ?>
                                    <button type="button" class="btn btn-outline-danger border-0 btn-favourite <?= $hasFavour ? "active" : "" ?>" data-productid="<?= $sp['ProductID'] ?>" data-bs-toggle="button">
                                        <i class="fa-regular fa-heart fs-2"></i>
                                    </button>
                                    <?php if ($sp['Instock'] == 0): ?>
                                        <div class="content__product-sale-off">
                                            het hang
                                        </div>
                                    <?php endif; ?>
                                    <div class="content__product-img">
                                        <img src="./public/images/uploads/<?= $sp['Image'] ?>" alt="" class="w-100">
                                    </div>
                                    <div class="content__product-info text-center">
                                        <div class="content__product-name">
                                            <h3 class="text-uppercase"><?= $sp['Name'] ?></h3>
                                        </div>
                                        <div class="content__product-price fs-4">
                                            <span class="contant__product-old-price mx-2">
                                                <del><?= $sp['Price'] == $sp['SalePrice'] ? "" : number_format($sp['Price']) . "đ" ?></del>
                                            </span>
                                            <span class="contant__product-sale-price mx-2"><?= $sp['Price'] == $sp['SalePrice'] ? number_format($sp['Price']) . "đ" : number_format($sp['SalePrice']) . "đ" ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="text-center w-75 pt-5">
                            <img src="./public/images/noproduct.jpg" alt="" class="w-100">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="content__item mt-5">
            <div class="content__title">
                <h2>
                    <a href="?ctrl=product&view=sales">SALES</a>
                </h2>
            </div>
            <div class="row g-5">
                <?php if ($dsspSales): ?>
                    <?php foreach ($dsspSales as $sp) : ?>

                        <div class="col-6 col-md-3 col-lg-4">
                            <div class="content__product-box position-relative">
                                <a href="?ctrl=product&view=detail&sp=<?= $sp['Slug'] ?>" class="content__product-link text-decoration-none">
                                    <div class="content__product-sale-flash"> -
                                        <?= number_format((($sp['Price'] - $sp['SalePrice']) / $sp['Price']) * 100) . "%" ?>
                                    </div>
                                    <?php $hasFavour = false;
                                    if (isset($_SESSION['favourite'])) {
                                        foreach ($_SESSION['favourite'] as $value) {
                                            if ($value['ID'] === $sp['ProductID']) {
                                                $hasFavour = true;
                                                break;
                                            }
                                        }
                                    } ?>
                                    <button type="button" class="btn btn-outline-danger border-0 btn-favourite <?= $hasFavour ? "active" : "" ?>" data-productid="<?= $sp['ProductID'] ?>" data-bs-toggle="button">
                                        <i class="fa-regular fa-heart fs-2"></i>
                                    </button>
                                    <?php if ($sp['Instock'] == 0): ?>
                                        <div class="content__product-sale-off">
                                            het hang
                                        </div>
                                    <?php endif; ?>
                                    <div class="content__product-img">
                                        <img src="./public/images/uploads/<?= $sp['Image'] ?>" alt="" class="w-100 <?= $sp['CategoryID'] == 2 ? "object-fit-cover" : "" ?>">
                                    </div>
                                    <div class="content__product-info text-center">
                                        <div class="content__product-name">
                                            <h3 class="text-uppercase"><?= $sp['Name'] ?></h3>
                                        </div>
                                        <div class="content__product-price fs-4">
                                            <span class="contant__product-old-price mx-2">
                                                <del><?= $sp['Price'] == $sp['SalePrice'] ? "" : number_format($sp['Price']) . "đ" ?></del>
                                            </span>
                                            <span class="contant__product-sale-price mx-2"><?= $sp['Price'] == $sp['SalePrice'] ? number_format($sp['Price']) . "đ" : number_format($sp['SalePrice']) . "đ" ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="text-center w-75 pt-5">
                            <img src="./public/images/noproduct.jpg" alt="" class="w-100">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>