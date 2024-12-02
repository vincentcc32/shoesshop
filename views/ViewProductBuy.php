<div class="buy">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-4"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item active fs-4" aria-current="page">Buy</li>
            </ol>
        </div>
        <form action="" method="post" id="formbuy">
            <div class="row">
                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body">
                            <ol class="activity-checkout mb-0 px-4 mt-3">
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bxs-receipt text-white fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="fs-4 mb-1">Shipping Info</h5>
                                            <p class="text-muted fs-4 text-truncate mb-4">Sed ut perspiciatis unde omnis iste</p>
                                            <div class="mb-3">
                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label fs-4" for="billing-name">Name</label>
                                                                <input type="text" class="form-control fs-4" id="billing-name" placeholder="Enter name" readonly value="<?= $_SESSION['user']['Username'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label fs-4" for="billing-email-address">Email Address</label>
                                                                <input type="email" class="form-control fs-4" id="billing-email-address" placeholder="Enter email" readonly value="<?= $_SESSION['user']['Email'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label fs-4" for="billing-phone">Phone</label>
                                                                <input type="text" class="form-control fs-4" id="billing-phone" minlength="10" maxlength="10" placeholder="Enter Phone no." readonly value="<?= $_SESSION['user']['SDT'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fs-4" for="billing-address">Address</label>
                                                        <textarea name="detailaddress" class="form-control fs-4" id="billing-address" rows="3" placeholder="Enter detail address" required></textarea>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-4 mb-lg-0">
                                                                <label class="form-label fs-4">City</label>
                                                                <select class="form-control fs-4 form-select form-city" title="Country" name="country" required>
                                                                    <option value="" selected>Select Country</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="mb-4 mb-lg-0">
                                                                <label class="form-label fs-4">District</label>
                                                                <select class="form-control fs-4 form-select form-district" title="District" name="district" required>
                                                                    <option value="" selected>Select District</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="mb-4 mb-lg-0">
                                                                <label class="form-label fs-4">Commune</label>
                                                                <select class="form-control fs-4 form-select form-commune" title="Commune" name="commune" required>
                                                                    <option value="" selected>Select Commune</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </li>
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bxs-truck text-white fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="fs-4 mb-1">Address type</h5>
                                            <p class="text-muted fs-4 text-truncate mb-4">Neque porro quisquam est</p>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div data-bs-toggle="collapse">
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="address" id="info-address1" class="card-radio-input" checked="" value="office">
                                                                <div class="card-radio text-truncate p-3">
                                                                    <span class="fs-4 mb-4 d-block">Office</span>
                                                                    <span class="text-muted fs-4 fw-normal text-wrap mb-1 d-block">The recipient no delivery during business hours</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-6">
                                                        <div>
                                                            <label class="card-radio-label mb-0">
                                                                <input type="radio" name="address" id="info-address2" class="card-radio-input" value="home">
                                                                <div class="card-radio text-truncate p-3">
                                                                    <span class="fs-4 mb-4 d-block">home</span>
                                                                    <span class="text-muted fs-4 fw-normal text-wrap mb-1 d-block">The recipient can receive the goods at any time</span>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="checkout-item">
                                    <div class="avatar checkout-icon p-1">
                                        <div class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bxs-wallet-alt text-white fs-4"></i>
                                        </div>
                                    </div>
                                    <div class="feed-item-list">
                                        <div>
                                            <h5 class="fs-4 mb-1">Payment Info</h5>
                                            <p class="text-muted fs-4 text-truncate mb-4">Duis arcu tortor, suscipit eget</p>
                                        </div>
                                        <div>
                                            <h5 class="fs-4 mb-3">Payment method :</h5>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div data-bs-toggle="collapse">
                                                        <label class="card-radio-label">
                                                            <input type="radio" name="pay-method" id="pay-methodoption1" class="card-radio-input" checked="" value="cod">
                                                            <span class="card-radio py-3 text-center text-truncate fs-4">
                                                                <i class="bx bx-credit-card d-block h2 mb-3"></i>
                                                                COD
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <label class="card-radio-label">
                                                            <input type="radio" name="pay-method" id="pay-methodoption2" class="card-radio-input" value="bank">
                                                            <span class="card-radio py-3 text-center text-truncate fs-4">
                                                                <i class="bx bxl-paypal d-block h2 mb-3"></i>
                                                                BANK
                                                            </span>
                                                        </label>
                                                    </div>

                                                    <?php if (isset($_SESSION['mess'])): ?>
                                                        <div class="d-block fs-4 text-warning"><?= $_SESSION['mess'] ?></div>
                                                    <?php unset($_SESSION['mess']);
                                                    endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col">
                            <?php if (isset($_GET['product'])): ?>
                                <a href="index.php?ctrl=product&view=detail&sp=<?= $sp['Slug'] ?>" class="btn btn-link text-muted fs-4">
                                    <i class="mdi mdi-arrow-left me-1 fs-3"></i> Continue Shopping </a>
                            <?php elseif (isset($_GET['productlist'])): ?>
                                <a href="index.php?ctrl=product&view=cart" class="btn btn-link text-muted fs-4">
                                    <i class="mdi mdi-arrow-left me-1 fs-3"></i> Continue Shopping </a>
                            <?php endif; ?>
                        </div> <!-- end col -->
                        <div class="col">
                            <div class="text-end mt-2 mt-sm-0">
                                <button type="submit" class="btn btn-success px-4 py-2 fs-3" name="buyproduct">
                                    <i class="mdi mdi-cart-outline me-1"></i> Procced </button>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                </div>
                <div class="col-xl-4">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="p-3 bg-light mb-3">
                                <h5 class="fs-4 mb-0">Order Summary</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-centered mb-0 table-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0 fs-4" style="width: 110px;" scope="col">Image</th>
                                            <th class="border-top-0 fs-4" scope="col" style="min-width: 220px;">Product</th>
                                            <th class="border-top-0 fs-4" scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($_GET['product'])): ?>
                                            <tr>
                                                <th scope="row"><img src="./public/images/uploads/<?= $sp['Image'] ?>" alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                                <td>
                                                    <h5 class="fs-4 text-truncate"><?= $sp['Name'] ?></h5>
                                                    <div class="d-flex align-items-center mt-2">
                                                        <p class="text-muted fs-4 m-0 price-btn"><?= number_format($sp['SalePrice']) . 'đ' ?> x </p>
                                                        <input name="buysl" type="number" class="fs-4 border-0 text-danger ms-3  quantity-btn" style="max-width: 50px; outline: none;" value="1" min="1" max="<?= $sp['Instock'] ?>">
                                                        <p class="fs-4 m-0 text-muted">Size: <?= $_SESSION['sizebuy'] ?></p>
                                                    </div>
                                                </td>
                                                <td class="fs-4 total-product m-0">$ 520</td>
                                            </tr>
                                        <?php elseif (isset($_GET['productlist'])): ?>
                                            <?php foreach ($_SESSION['cart'] as $item): ?>
                                                <tr>
                                                    <th scope="row"><img src="./public/images/uploads/<?= $item['Image'] ?>" alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                                    <td>
                                                        <h5 class="fs-4 text-truncate"><?= $item['Name'] ?></h5>
                                                        <div class="d-flex align-items-center mt-2">
                                                            <p class="text-muted fs-4 m-0 price-btn"><?= number_format($item['SalePrice']) . 'đ' ?> x </p>
                                                            <input name="buysl[]" type="number" class="fs-4 border-0 text-danger ms-3  quantity-btn" style="max-width: 50px; outline: none;" value="<?= $item['Quantity'] ?>" min="1" max="<?= $item['Instock'] ?>">
                                                            <p class="fs-4 m-0 text-muted">Size: <?= $item['Size'] ?></p>
                                                        </div>
                                                    </td>
                                                    <td class="fs-4 total-product">$ 520</td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="fs-4 m-0">Sub Total :</h5>
                                            </td>
                                            <td class="fs-4 sum-price-btn" style="min-width: 100px;">
                                                $ 780
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="fs-4 m-0">Shipping fee :</h5>
                                            </td>
                                            <td class="fs-4 shipping-btn" style="min-width: 100px;">
                                                30,000 đ
                                            </td>
                                        </tr>
                                        <tr class="bg-light">
                                            <td colspan="2">
                                                <h5 class="fs-4 m-0">Total:</h5>
                                                <input type="number" hidden name="sumtotalbuy" value="0">
                                            </td>
                                            <td class="fs-4 sum-total-price" style="min-width: 100px;">
                                                $ 745.2
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end row -->

    </div>
</div>