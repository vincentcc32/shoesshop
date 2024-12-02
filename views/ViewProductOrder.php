<div class="cart">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Order</li>
            </ol>
        </div>
        <?php if (!empty($dssp)): ?>
            <div class="overflow-x-scroll">
                <table class="table__collapse">
                    <thead>
                        <tr>
                            <th class="table__th">Invoice number</th>
                            <th class="table__th">Time</th>
                            <th class="table__th">Price</th>
                            <th class="table__th">Status</th>
                            <th class="table__th">Pay</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dssp as $sp) : ?>

                            <tr>
                                <td class="tabel__td"> <button type="button" class="btn fs-3 text-primary btn-detail-order btn-open-modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-orderid="<?= $sp['IDOder'] ?>">
                                        Số phiếu <?= $sp['IDOder'] ?>
                                    </button> </td>
                                <td class="tabel__td"><?= $sp['Time'] ?></td>
                                <td class="tabel__td"><?= number_format($sp['Money']) . "đ" ?></td>
                                <td class="tabel__td <?= $sp['Status'] ? "text-success" : "text-danger" ?>"><?= $sp['Status'] ? "Đã nhận" : "Đang giao hàng" ?></td>
                                <td class="tabel__td <?= $sp['Pay'] ? "text-success" : "text-danger" ?>"><?= $sp['Pay'] ? "Đã thanh toán" : "Chưa thanh toán" ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="text-center w-75 pt-5">
                        <img src="./public/images/noproduct.jpg" alt="" class="w-100">
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalLabel">Invoice</h1>
                <button type="button" class="btn-close fs-3" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <h3>Customer:</h3>
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
                <button type="button" class="btn btn-secondary fs-3 fw-bold px-3" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary fs-3 fw-bold px-3">Save PDF</button>
            </div>
        </div>
    </div>
</div>