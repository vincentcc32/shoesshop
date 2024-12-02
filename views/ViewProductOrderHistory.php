<section class="table-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Order</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">

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
                        <h6 class="mb-10">Order History</h6>
                        <div class="table-wrapper table-responsive">
                            <table class="table striped-table">
                                <thead>
                                    <tr>
                                        <th>Invoice</th>
                                        <th>
                                            <h6>Name</h6>
                                        </th>
                                        <th>
                                            <h6>Email</h6>
                                        </th>
                                        <th>
                                            <h6>Phone Number</h6>
                                        </th>
                                        <th>
                                            <h6>Pay</h6>
                                        </th>
                                        <th>
                                            <h6>Status</h6>
                                        </th>
                                        <th>
                                            <h6>Order confirm</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    <?php if (isset($htr)): ?>
                                        <?php foreach ($htr as $value): ?>
                                            <tr>
                                                <td>
                                                    <h6 class="text-sm"><button type="button" class="btn text-primary btn-detail-order btn-open-modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-orderid="<?= $value['IDOder'] ?>">
                                                            Invoice <?= $value['IDOder'] ?>
                                                        </button></h6>
                                                </td>
                                                <td>
                                                    <p><?= $value['UserName'] ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $value['Email'] ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $value['SDT'] ?></p>
                                                </td>
                                                <td>
                                                    <p class="<?= $value['Pay'] ? "text-success" : "text-danger" ?>"><?= $value['Pay']  ?  "Đã thanh toán" : "Chưa thanh toán" ?></p>
                                                </td>
                                                <td>
                                                    <p class="<?= $value['Status'] ? "text-success" : "text-danger" ?>"><?= $value['Status'] ? "Đã nhận" : "Đang giao hàng" ?></p>
                                                </td>
                                                <?php if (!$value['Status']): ?>
                                                    <td>
                                                        <a href="admin.php?ctrl=product&view=activeorder&invoice=<?= $value['IDOder'] ?>" class="btn btn-primary">Confirm</a>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <?php if ($sl > 12): ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">

                        <li class="page-item <?= !isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] === '0') ? "disabled" : "" ?>">
                            <a class="page-link" <?= isset($_GET['page']) && (int)$_GET['page'] > 1 ? " href=\"admin.php?ctrl=product&view=orderhistory&page=" . (int)$_GET['page'] - 1 . "\"" : "href=\"admin.php?ctrl=product&view=orderhistory\"" ?>>Previous</a>
                        </li>

                        <?php for ($i = 1; $i < $page; $i++): ?>
                            <li class="page-item <?= isset($_GET['page']) && $_GET['page'] == $i ? "active" : "" ?>"><a class="page-link" href="admin.php?ctrl=product&view=orderhistory&page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor; ?>

                        <li class="page-item <?= (isset($_GET['page']) && ((int)$_GET['page']) === $page - 1) ? "disabled" : "" ?>">
                            <a class="page-link" <?= !isset($_GET['page']) ? " href=\"admin.php?ctrl=product&view=orderhistory&page=1\"" : "href=\"admin.php?ctrl=product&view=orderhistory&page=" . (int)$_GET['page'] + 1 . "\"" ?>>Previous</a>
                        </li>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
        <!-- ========== tables-wrapper end ========== -->
    </div>
    <!-- end container -->
</section>


<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalLabel">Invoice</h1>
                <button type="button" class="btn-close fs-6" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="invoice-container">
                    <div class="invoice-header">
                        <h1>Invoice</h1>
                        <p class="invoice-store-name">SHOES SHOP</p>
                        <p class="invoice-store-address">213 Trường Chinh</p>
                    </div>

                    <div class="invoice-info">
                        <div class="invoice-customer-info">
                            <h3 class="fs-5">Customer:</h3>
                            <p class="invoice-customer-info-name">Name: ${tmp.UserName}</p>
                            <p class="invoice-customer-info-address">Address: ${tmp.UserAddress}</p>
                            <p class="invoice-customer-info-email">Email: ${tmp.UserEmail}</p>
                        </div>

                        <div class="invoice-date">
                            <p class="invoice-date-date"><strong>Date:</strong> ${tmp.UserTime}</p>
                            <p class="invoice-date-invoice"><strong>Invoice #:</strong> ${tmp.UserIDOder}</p>
                        </div>
                    </div>
                    <div class="overflow-x-scroll">
                        <table class="invoice-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="invoice-body">
                                <!-- <tr>
                                    <td class="invoice-table-name">${tmp.ProductName}</td>
                                    <td class="invoice-table-size">${tmp.UserSize}</td>
                                    <td class="invoice-table-instock">${tmp.UserInstock}</td>
                                    <td class="invoice-table-price">${(tmp.UserSalePrice + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',')}đ</td>
                                    <td class="model-sum">${((tmp.UserInstock * tmp.UserSalePrice) + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',')}đ</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="invoice-total d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mt-4 invoice-total-pay"><strong>Pay: ${tmp.UserPay ? "Paid" : "Not yet paid"}</strong></p>
                        </div>
                        <div>
                            <p class="mt-4 invoice-total-shipping"><strong>Shipping: ${(tmp.UserShipping + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',')}đ</strong></p>
                            <p class="invoice-total-total"><strong>Total: ${(tmp.UserMoney + "").replace(/\B(?=(\d{3})+(?!\d))/g, ',')}đ</strong></p>
                        </div>
                    </div>
                    <div class="invoice-footer">
                        <p>Thank you for your purchase!</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fs-6 fw-bold px-3" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary fs-6 fw-bold px-3">Save PDF</button>
            </div>
        </div>
    </div>
</div>