<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Dashboard</h2>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon purple">
                        <i class="lni lni-cart-full"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10 text-uppercase">SHOES</h6>
                        <h3 class="text-bold mb-10"><?= $slShoes['SL'] ?></h3>
                        <p class="text-sm text-success">
                            <!-- <i class="lni lni-arrow-up"></i> +2.00% -->
                            <span class="text-gray">(30 days)</span>
                        </p>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon purple">
                        <i class="lni lni-cart-full"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10 text-uppercase">Fasion</h6>
                        <h3 class="text-bold mb-10"><?= $slFashion['SL'] ?></h3>
                        <p class="text-sm text-success">
                            <!-- <i class="lni lni-arrow-up"></i> +2.00% -->
                            <span class="text-gray">(30 days)</span>
                        </p>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon primary">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total Expense</h6>
                        <h3 class="text-bold mb-10"><?= number_format($sumPrice['SumPrice']) . "đ" ?></h3>
                        <p class="text-sm text-danger">
                            <!-- <i class="lni lni-arrow-down"></i> -2.00% -->
                            <span class="text-gray">Expense</span>
                        </p>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon primary">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total sale money</h6>
                        <h3 class="text-bold mb-10"><?= number_format($sumSalePrice['money']) . "đ" ?></h3>
                        <p class="text-sm text-danger">
                            <!-- <i class="lni lni-arrow-down"></i> -2.00% -->
                            <span class="text-gray">Expense</span>
                        </p>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon orange">
                        <i class="lni lni-user"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">User</h6>
                        <h3 class="text-bold mb-10"><?= $quantityUser['user'] ?></h3>
                        <p class="text-sm text-danger">
                            <!-- <i class="lni lni-arrow-down"></i> -25.00% -->
                            <span class="text-gray"> Earning</span>
                        </p>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
        </div>
        <div class="row mt-5 gy-5">
            <div class="col-lg-6">
                <canvas id="userline" style="min-width: 100%; min-height: 450px;"></canvas>
            </div>
            <div class="col-lg-6">
                <canvas id="userbar" style="min-width: 100%; min-height: 450px;"></canvas>
            </div>
            <div class="mt-5 d-flex align-items-center justify-content-center gap-4">
                <select name="yearuser" id="" class="py-2 px-5 text-center" required>
                    <option value="" selected class="text-center">Select by year</option>
                    <?php foreach ($userYear as  $value): ?>
                        <option value="<?= $value['year'] ?>" class="text-center" <?= isset($_GET['useryear']) && $_GET['useryear'] == $value['year'] ? "selected" : "" ?>><?= $value['year'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="py-2 px-5 border-0 btn btn-primary btn-user-year">Ok</button>
            </div>
        </div>
        <div class="row mt-5 gy-5">
            <div class="col-lg-6">
                <canvas id="orderline" style="min-width: 100%; min-height: 450px;"></canvas>
            </div>
            <div class="col-lg-6">
                <canvas id="orderbar" style="min-width: 100%; min-height: 450px;"></canvas>
            </div>
            <div class="mt-5 d-flex align-items-center justify-content-center gap-4">
                <select name="yearorder" id="" class="py-2 px-5 text-center" required>
                    <option value="" selected class="text-center">Select by year</option>
                    <?php foreach ($oderYear as  $value): ?>
                        <option value="<?= $value['year'] ?>" class="text-center" <?= isset($_GET['orderyear']) && $_GET['orderyear'] == $value['year'] ? "selected" : "" ?>><?= $value['year'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="py-2 px-5 border-0 btn btn-primary btn-order-year">Ok</button>
            </div>
        </div>
        <div class="row mt-5 gy-5">
            <div class="col-lg-6">
                <canvas id="moneyline" style="min-width: 100%; min-height: 450px;"></canvas>
            </div>
            <div class="col-lg-6">
                <canvas id="moneybar" style="min-width: 100%; min-height: 450px;"></canvas>
            </div>
            <div class="mt-5 d-flex align-items-center justify-content-center gap-4">
                <select name="yearmoney" id="" class="py-2 px-5 text-center" required>
                    <option value="" selected class="text-center">Select by year</option>
                    <?php foreach ($moneyYear as  $value): ?>
                        <option value="<?= $value['year'] ?>" class="text-center" <?= isset($_GET['moneyyear']) && $_GET['moneyyear'] == $value['year'] ? "selected" : "" ?>><?= $value['year'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="py-2 px-5 border-0 btn btn-primary btn-money-year">Ok</button>
            </div>
        </div>

</section>
<!-- ========== section end ========== -->

<!-- ========== footer start =========== -->