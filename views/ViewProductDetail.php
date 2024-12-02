<div class="detail">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Detail</li>
            </ol>
        </div>

        <div class="row gy-5">
            <div class="col-12 col-lg-6">
                <div id="carouselExampleControlsNoTouching" class="carousel slide w-100" data-bs-touch="false">
                    <div class="carousel-inner w-100" style="height: 100%;">
                        <div class="carousel-item w-100 active" style="height: 100%;">
                            <img src="./public/images/uploads/<?= $sp['Image'] ?>" class="d-block w-100 object-fit-contain"
                                alt="..." style="height: 100%;">
                        </div>
                        <div class="carousel-item w-100" style="height: 100%;">
                            <img src="./public/images/uploads/<?= $sp['Image'] ?>" class="d-block w-100 object-fit-contain"
                                alt="..." style="height: 100%;">
                        </div>
                        <div class="carousel-item w-100" style="height: 100%;">
                            <img src="./public/images/uploads/<?= $sp['Image'] ?>" class="d-block w-100 object-fit-contain"
                                alt="..." style="height: 100%;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon text-bg-dark fs-4 d-block py-5 px-4"
                            aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon text-bg-dark fs-4 d-block py-5 px-4"
                            aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="detail__info text-center">
                    <h4 class="detail__info-title fs-3 fw-medium"><?= $sp['Name'] ?></h4>
                    <div class="detail__info-price">
                        <p class="fs-2 text-danger mb-2 fw-bold"><?= $sp['Price'] == $sp['SalePrice'] ? number_format($sp['Price']) . "đ" : number_format($sp['SalePrice']) . "đ" ?></p>
                        <del class="fs-3 "><?= $sp['Price'] == $sp['SalePrice'] ?  "" : number_format($sp['Price']) . "đ" ?></del>
                    </div>
                    <div class="detail__info-desc pb-4">
                        <p class="fs-5 fw-medium">- Chất lượng chuẩn 98% so với Real chỉ có Shoes</p>
                        <p class="fs-5 fw-medium">- Đi đúng size</p>
                        <p class="fs-5 fw-medium">- Vận chuyển toàn quốc [ Kiểm Tra Hàng Trước Khi Thanh Toán ] </p>
                        <p class="fs-5 fw-medium">- 100% Ảnh chụp trực tiếp tại Shoes </p>
                        <p class="fs-5 fw-medium">- Bảo Hành Trọn Đời Sản Phẩm </p>
                        <p class="fs-5 fw-medium">- Đổi Trả 7 Ngày Không Kể Lí Do </p>
                        <p class="fs-5 fw-medium">- Liên Hệ : 0366.409.378</p>
                        <input type="text" hidden name="productid" value="<?= $sp['ProductID'] ?>">
                    </div>
                    <div class="detail__info-size d-flex justify-content-center flex-wrap">
                        <?php foreach ($sizes as $size): ?>
                            <button id="btn-size" class="btn-size btn mb-3 border px-3 py-2 fs-5 mx-2 cursor-pointer list-group-item-action list-group-item-success"
                                style="width: 40px;" data-size="<?= $size['SizeNum'] ?>">
                                <?= $size['SizeNum'] ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                    <?php if (isset($_SESSION['mess'])): ?>
                        <div class="d-block fs-4 text-warning"><?= $_SESSION['mess'] ?></div>
                    <?php unset($_SESSION['mess']);
                    endif; ?>
                    <div class="detail__info-action pb-5">
                        <?php if ($sp['Instock'] > 0): ?>
                            <a class="btn text-bg-dark rounded-0 fs-4 py-2 px-5 mx-5 mt-5 text-decoration-none" href="?ctrl=product&view=addcart&sp=<?= $sp['Slug'] ?>">Add to cart</a>
                            <button class=" btn text-bg-dark rounded-0 fs-4 py-2 px-5 mx-5 mt-5 text-decoration-none buy-btn">Buy now</button>
                        <?php else: ?>
                            <h4 class="fs-2 fw-medium">out of stock</h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-5 py-5">
            <?php foreach ($imgs as $img): ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <img src="./public/images/uploads/<?= $img['Img']  ?>" alt="" style="width: 100%;">
                </div>
            <?php endforeach; ?>
        </div>
        <div class="commnet py-5 mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fs-1 fw-medium mb-5">Comment</h1>
                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="d-flex">
                            <textarea name="" id="" rows="1" class="w-100 py-3 fs-3 px-2 comment__input" placeholder="Comment"></textarea>
                            <button class="py-3 px-4 fs-4 btn btn-primary text-uppercase commnet-btn">Send</button>
                        </div>
                    <?php else: ?>
                        <h1 class="fw-medium">Please <a href="index.php?ctrl=user&view=login" class="text-primary text-decoration-none">log in</a> to comment</h1>
                    <?php endif; ?>
                    <ul class="commment__list list-unstyled pt-4">
                        <?php if (count($cmt)): ?>
                            <?php foreach ($cmt as $item): ?>
                                <li class="p-3">
                                    <h4 class="fs-2 fw-medium"><?= $item['Username'] ?></h4>
                                    <p class="fs-3"><?= $item['Content'] ?></p>
                                    <h6 class="fs-4 text-secondary"><?= $item['Time'] ?></h6>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h4 class="fs-4 mt-5">There are no comments yet</h4>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>