<!-- ========== table components start ========== -->
<section class="table-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Product List</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6 text-end">
                    <a href="admin.php?ctrl=product&view=addproduct" type="button" class="btn btn-primary px-3 d-inline-flex align-items-center">
                        <span class="me-2">Add product</span>
                        <i class="lni lni-plus fs-6"></i>
                    </a>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <!-- ========== tables-wrapper start ========== -->
        <div class="tables-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <h6 class="mb-10">Data Table</h6>
                        <div class="table-wrapper table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="lead-info">
                                            <h6>Name</h6>
                                        </th>
                                        <th class="lead-email">
                                            <h6>Price</h6>
                                        </th>
                                        <th class="lead-phone">
                                            <h6>Sale Price</h6>
                                        </th>
                                        <th class="lead-company">
                                            <h6>Instock</h6>
                                        </th>
                                        <th>
                                            <h6>Action</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    <?php foreach ($dssp as $sp): ?>
                                        <tr>
                                            <td class="min-width">
                                                <a href="admin.php?ctrl=product&view=admindetail&sp=<?= $sp['Slug'] ?>">
                                                    <div class="lead">
                                                        <div class="lead-image">
                                                            <img src="public/images/uploads/<?= $sp['Image'] ?>" alt="" />
                                                        </div>
                                                        <div class="lead-text">
                                                            <p><?= $sp['Name'] ?></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="min-width">
                                                <p><?= number_format($sp['Price']) . "đ" ?></p>
                                            </td>
                                            <td class="min-width">
                                                <p class="text-danger"><?= number_format($sp['SalePrice']) . "đ" ?></p>
                                            </td>
                                            <td class="min-width">
                                                <p><?= $sp['Instock'] ?></p>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <button class="text-danger p-0">
                                                        <i class="lni lni-trash-can delete-product fs-4 d-block p-2" data-productid="<?= $sp['ProductID'] ?>"></i>
                                                    </button>
                                                    <button class="text-success p-0">
                                                        <a href="admin.php?ctrl=product&view=editproduct&id=<?= $sp['ProductID'] ?>" class="lni lni-pencil-alt fs-4 text-decoration-none d-block p-2"></a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- end table row -->
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <?php if ($index > 1): ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if (isset($_GET['page'])): ?>
                            <li class="page-item">
                                <a class="page-link fs-4" href="admin.php?ctrl=product&view=productlist<?= (int)$_GET['page'] === 1 ? "" : "&page=" . $_GET['page'] - 1 ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php for ($i = 1; $i < $index; $i++): ?>
                            <li class="page-item"><a class="page-link fs-4 <?= isset($_GET['page']) && (int)$_GET['page'] === $i ? "active" : "" ?>" href="admin.php?ctrl=product&view=productlist&page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                        <?php if (isset($_GET['page'])): ?>
                            <?php if ((int)$_GET['page'] < $index - 1): ?>
                                <li class="page-item">
                                    <a class="page-link fs-4" href="admin.php?ctrl=product&view=productlist&page=<?= isset($_GET['page']) ? (int)$_GET['page'] + 1 : 1 ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php endif ?>
                        <?php else: ?>
                            <li class="page-item">
                                <a class="page-link fs-4" href="admin.php?ctrl=product&view=productlist&page=1" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif ?>
        </div>
    </div>