<div class="cart">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Cart</li>
            </ol>
        </div>
        <?php if (isset($_SESSION['cart'])): ?>
            <?php
            $sum = 0;
            foreach ($_SESSION['cart'] as $sp) : ?>

                <div class="cart__item d-flex align-items-center justify-content-between border border-1">
                    <div class="cart__item-img">
                        <img src="./public/images/uploads/<?= $sp['Image'] ?>" alt="" class="w-100">
                    </div>
                    <div class="cart__item-name">
                        <div class="cart__item-title text-md-center">
                            <a href="index.php?ctrl=product&view=detail&sp=<?= $sp['Slug'] ?>" class="fs-4 d-block overflow-hidden text-dark" style="height: 100%;"><?= $sp['Name'] ?></a>
                            <span class="d-block text-danger fs-4">(size: <?= $sp['Size'] ?>)</span>
                            <p class="fs-4 d-md-none"><?= number_format($sp['SalePrice']) . "đ" ?></p>
                        </div>
                    </div>
                    <div class="cart__item-price d-none d-md-block">
                        <p class="fs-4"><?= number_format($sp['SalePrice']) . "đ" ?></p>
                    </div>
                    <div class="cart__item-quantity">
                        <div class="border border-1 d-flex align-items-center">
                            <i class="fas fa-minus p-2 fs-3 m-0 cursor-pointer btn-cart-down <?= $sp['Quantity'] === 1 ? 'opacity-50' : '' ?>"></i>
                            <span class="fs-3 px-3 cart-quantity" data-id="<?= $sp['ProductID'] ?>"><?= $sp['Quantity'] ?></span>
                            <input type="text" hidden value="<?= $sp['Instock'] ?>" name="cartinstock">
                            <i class=" fa-solid fa-plus p-2 fs-3 m-0 cursor-pointer btn-cart-up <?= $sp['Quantity'] === $sp['Instock'] ? 'opacity-50' : '' ?> data-id=" <?= $sp['ProductID'] ?>""></i>
                        </div>
                    </div>
                    <div class=" cart__item-into-money cart__sum-money">
                        <p class="fs-4 cart-sum-money" data-price="<?= $sp['SalePrice'] ?>"><?= number_format($sp['SalePrice'] * $sp['Quantity']) . "đ" ?></p>
                    </div>
                    <div class="cart__item-delete">
                        <a href="?ctrl=product&view=deletecart&slug=<?= $sp['Slug'] ?>&index=<?= $sp['ProductID'] ?>" class="fa-regular fa-trash-can p-3 pe-5 fs-3 m-0 cursor-pointer text-dark text-decoration-none"></a>
                    </div>
                </div>

            <?php
                $sum = $sum + ($sp['SalePrice'] * $sp['Quantity']);
            endforeach; ?>
        <?php else: ?>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="text-center w-75 pt-5">
                        <img src="./public/images/noproduct.jpg" alt="" class="w-100">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="cart__item-btn d-flex flex-column align-items-end ">
            <?php if (isset($_SESSION['cart'])): ?>
                <p class="fs-2 mt-4 total-money">Total: <?= isset($sum) ? number_format($sum) : 0 ?>đ</p>
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="btn p-3 text-bg-dark border rounded px-5 fs-4 text-decoration-none" href="index.php?ctrl=product&view=buy&productlist">Buy</a>
                <?php else: ?>
                    <button class="btn p-3 text-bg-dark border rounded px-5 fs-4 text-decoration-none" onclick="goLogin();">Buy</button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>