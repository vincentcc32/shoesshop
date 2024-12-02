<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Edit Product</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin.php?ctrl=product&view=productlist">Product List</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Product
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <div class="row">
            <div class="col-12">
                <div class="card-style settings-card-2 mb-30">
                    <div class="title mb-30">
                        <h6>Product</h6>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <label class="d-block mb-4">Image</label>
                                    <input type="file" name="image" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Product name</label>
                                    <input type="text" placeholder="Product Name" name="productname" value="<?= $sp['Name'] ?>" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Price</label>
                                    <input type="number" placeholder="Price" min="0" name="price" value="<?= $sp['Price'] ?>" />
                                </div>
                            </div>
                            <div class=" col-12">
                                <div class="input-style-1">
                                    <label>Sale Price</label>
                                    <input type="number" placeholder="Sale Price" min="0" name="saleprice" value="<?= $sp['SalePrice'] ?>" />
                                </div>
                            </div>
                            <div class=" col-12">
                                <div class="input-style-1">
                                    <label>Stock</label>
                                    <input type="number" placeholder="Stock" min="0" name="stock" value="<?= $sp['Instock'] ?>" />
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div class="select-style-1">
                                    <label>Category</label>
                                    <div class="select-position">
                                        <select class="light-bg" name="category">
                                            <option value="<?= $sp['CategoryID'] ?>" selected><?= $sp['CategoryName'] ?></option>
                                            <?php foreach ($cate as $value) : ?>
                                                <option value="<?= $value['CategoryID'] ?>"><?= $value['CategoryName'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-6">
                                    <div class="select-style-1">
                                        <label>Made IN</label>
                                        <div class="select-position">
                                            <select class="light-bg" name="madein">
                                                <option value="<?= $sp['MakeInID'] ?>" selected><?= $sp['MakeInName'] ?></option>
                                                <?php foreach ($made as $value) : ?>
                                                    <option value="<?= $value['MakeInID'] ?>"><?= $value['Name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Size</label>
                                        <input required type="text" placeholder="Enter multiple sizes separated by spaces" min="0" name="size" />
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <label class="d-block mb-4">review photo</label>
                                    <input required type="file" name="images[]" multiple />
                                </div>
                                <div class="col-12">
                                    <button class="main-btn primary-btn btn-hover" name="editproduct">
                                        Edit Product
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>