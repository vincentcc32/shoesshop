<div class="category-shoes">
    <div class="container pb-5 min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Category Shoes</li>
            </ol>
        </div>
        <div class="category-shoes-filter">
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
                <button class="btn text-bg-dark ms-3 py-2 px-4 fs-5 btn-cate-shoes">Filter</button>
            </div>
        </div>
        <div class="d-flex py-5">
            <div class="d-inline-block category-list" style="height: 100%;">
                <h3 class="fs-3 fw-bold mt-5 mb-3">Category</h3>
                <ul class="category-shoes-list p-0">
                    <?php foreach ($dssm as $dm) : ?>
                        <li class="d-block py-2">
                            <a href="?ctrl=product&view=categoryshoes&make=<?= $dm['MakeInID'] ?>" class="d-block py-2 fs-4 text-decoration-none text-dark"><?= $dm['Name'] ?></a>
                            <input type="text" hidden name="shoesmake" value="<?= $_GET['make'] ?>">
                        </li>
                    <?php endforeach; ?>
                    <li class="d-block py-2">
                        <a href="?ctrl=product&view=categoryshoes&make=0" class="d-block py-2 fs-4 text-decoration-none text-dark text-uppercase">Other shoes</a>
                    </li>
                </ul>
            </div>
            <div class="row d-inline-flex w-100">
                <?php if ($dsspByDm): ?>
                    <?php foreach ($dsspByDm as $sp) : ?>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="content__product-box position-relative">
                                <a href="?ctrl=product&view=detail&sp=<?= $sp['Slug'] ?>" class="content__product-link text-decoration-none">
                                    <div class="content__product-sale-flash">
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
                                        <img src="./public/images/uploads/<?= $sp['Image'] ?>" alt="" class="w-100 <?= $sp['CategoryID'] == 2 ? "object-fit-none" : "" ?>">
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
        <nav aria-label="Page navigation example" class="mt-5 pt-3">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <?php if (isset($_GET['page'])): ?>
                        <?php if (isset($_GET['sort'])): ?>
                            <a class="page-link fs-3 px-3 text-dark" href="index.php?ctrl=product&view=categoryshoes&make=<?= $_GET['make'] ?><?= $_GET['page'] === '1' ? "" : "&page=" . $index - 1 ?>&sort=<?= $_GET['sort'] ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        <?php else : ?>
                            <a class="page-link fs-3 px-3 text-dark" href="index.php?ctrl=product&view=categoryshoes&make=<?= $_GET['make'] ?><?= $_GET['page'] === '1' ? "" : "&page=" . $index - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </li>
                <?php if (isset($_GET['sort'])): ?>
                    <?php for ($j = 1; $j < $i; $j++): ?>
                        <li class="page-item"><a class="page-link fs-3 px-3 text-dark <?= isset($_GET['page']) && (int)$_GET['page'] === $j ? 'active' : '' ?>" href="index.php?ctrl=product&view=categoryshoes&make=<?= $_GET['make'] ?>&page=<?= $j ?>&sort=<?= $_GET['sort'] ?>"><?= $j ?></a></li>
                    <?php endfor; ?>
                <?php else : ?>
                    <?php for ($j = 1; $j < $i; $j++): ?>
                        <li class="page-item"><a class="page-link fs-3 px-3 text-dark <?= isset($_GET['page']) && (int)$_GET['page'] === $j ? 'active' : '' ?>" href="index.php?ctrl=product&view=categoryshoes&make=<?= $_GET['make'] ?>&page=<?= $j ?>"><?= $j ?></a></li>
                    <?php endfor; ?>
                <?php endif; ?>
                <li class="page-item">
                    <?php if ($i > 1 && $index + 1 < $i): ?>
                        <?php if (isset($_GET['sort'])): ?>
                            <a class="page-link fs-3 px-3 text-dark" href="index.php?ctrl=product&view=categoryshoes&make=<?= $_GET['make'] ?>&page=<?= $index + 1 ?>&sort=<?= $_GET['sort'] ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        <?php else : ?>
                            <a class="page-link fs-3 px-3 text-dark" href="index.php?ctrl=product&view=categoryshoes&make=<?= $_GET['make'] ?>&page=<?= $index + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</div>