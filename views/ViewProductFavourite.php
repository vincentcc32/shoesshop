<div class="product">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Favourite</li>
            </ol>
        </div>
        <div class="row py-5 mt-5 g-5">
            <?php if (isset($_SESSION['favourite'])): ?>
                <?php foreach ($_SESSION['favourite'] as $sp) : ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="content__product-box position-relative">
                            <a href="?ctrl=product&view=detail&sp=<?= $sp['Slug'] ?>" class="content__product-link text-decoration-none">
                                <div class="content__product-sale-flash"> -
                                    <?= number_format((($sp['Price'] - $sp['SalePrice']) / $sp['Price']) * 100) . "%" ?>
                                </div>
                                <button type="button" class="btn btn-outline-danger border-0 btn-favourite active" data-productid="<?= $sp['ID'] ?>" data-bs-toggle="button">
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
</div>