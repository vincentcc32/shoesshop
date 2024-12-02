<div class="product">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Sales</li>
            </ol>
        </div>
        <div class="product-filter d-flex justify-content-end align-items-center border-bottom pb-5">
            <select class="form-select form-select-lg" aria-label="Large select example">
                <option value="" <?= isset($_GET['sort']) ? "" : 'selected' ?>>Default</option>
                <?php if (isset($_GET['sort'])): ?>
                    <option value="gradually-increase" <?= $_GET['sort'] === 'gradually-increase' ? "selected" : '' ?>>Gradually increase</option>
                <?php else: ?>
                    <option value="gradually-increase">Gradually increase</option>
                <?php endif ?>
                <?php if (isset($_GET['sort'])): ?>
                    <option value="gradually-decreasing" <?= $_GET['sort'] === 'gradually-decreasing' ? "selected" : '' ?>>Gradually decreasing</option>
                <?php else: ?>
                    <option value="gradually-decreasing">Gradually decreasing</option>
                <?php endif ?>
            </select>
            <button class="btn text-bg-dark ms-3 py-2 px-4 fs-5 btn-sale-filter">Filter</button>
        </div>
        <div class="row mt-5 pt-5 g-5">
            <?php if ($dsspSalesAll): ?>
                <?php foreach ($dsspSalesAll as $sp) : ?>

                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="content__product-box position-relative">
                            <a href="index.php?ctrl=product&view=detail&sp=<?= $sp['Slug'] ?>" class="content__product-link text-decoration-none">
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
                                        <h3><?= $sp['Name'] ?></h3>
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
        <nav aria-label="Page navigation example" class="mt-5 pt-3">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <?php if (isset($_GET['page'])): ?>
                        <?php if (isset($_GET['sort'])): ?>
                            <a class="page-link fs-3 px-3 text-dark" href="index.php?ctrl=product&view=sales<?= $_GET['page'] === '1' ? "" : "&page=" . $index - 1 ?>&sort=<?= $_GET['sort'] ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        <?php else : ?>
                            <a class="page-link fs-3 px-3 text-dark" href="index.php?ctrl=product&view=sales<?= $_GET['page'] === '1' ? "" : "&page=" . $index - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </li>
                <?php if (isset($_GET['sort'])): ?>
                    <?php for ($j = 1; $j < $i; $j++): ?>
                        <li class="page-item"><a class="page-link fs-3 px-3 text-dark <?= isset($_GET['page']) && (int)$_GET['page'] === $j ? 'active' : '' ?>" href="index.php?ctrl=product&view=sales&page=<?= $j ?>&sort=<?= $_GET['sort'] ?>"><?= $j ?></a></li>
                    <?php endfor; ?>
                <?php else : ?>
                    <?php for ($j = 1; $j < $i; $j++): ?>
                        <li class="page-item"><a class="page-link fs-3 px-3 text-dark <?= isset($_GET['page']) && (int)$_GET['page'] === $j ? 'active' : '' ?>" href="index.php?ctrl=product&view=sales&page=<?= $j ?>"><?= $j ?></a></li>
                    <?php endfor; ?>
                <?php endif; ?>
                <li class="page-item">
                    <?php if ($i > 1 && $index + 1 < $i): ?>
                        <?php if (isset($_GET['sort'])): ?>
                            <a class="page-link fs-3 px-3 text-dark" href="index.php?ctrl=product&view=sales&page=<?= $index + 1 ?>&sort=<?= $_GET['sort'] ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        <?php else : ?>
                            <a class="page-link fs-3 px-3 text-dark" href="index.php?ctrl=product&view=sales&page=<?= $index + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</div>