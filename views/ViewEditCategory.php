<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Edit Category</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin.php?ctrl=product&view=categorylist">Category List</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Category
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
                        <h6>Category</h6>
                    </div>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Category name</label>
                                    <input type="text" placeholder="Category Name" name="categoryname" value="<?= $cate['CategoryName'] ?>" />
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="main-btn primary-btn btn-hover" name="editcategory">
                                    Edit Category
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