<section class="table-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Admin Management</h2>
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
                        <h6 class="mb-10">Data Table</h6>
                        <div class="table-wrapper table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6>Avatar</h6>
                                        </th>
                                        <th>
                                            <h6>Name</h6>
                                        </th>
                                        <th>
                                            <h6>Email</h6>
                                        </th>
                                        <th>
                                            <h6>Status</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    <?php foreach ($admins as $admin): ?>
                                        <tr>
                                            <td>
                                                <div class="employee-image">
                                                    <?php if (isset($admin['Avatar'])): ?>
                                                        <img src="./public/images/uploads/<?= $admin['Avatar'] ?>" alt="" />
                                                    <?php else: ?>
                                                        <img src="./public/images/user.jpg" alt="" />
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <p><?= $admin['Username'] ?></p>
                                            </td>
                                            <td class="min-width">
                                                <p><a href="mailto:<?= $admin['Email'] ?>"><?= $admin['Email'] ?></a></p>
                                            </td>
                                            <td class="min-width">
                                                <span class="status-btn success-btn">Done</span>
                                            </td>
                                            <?php if ($_SESSION['user']['UserID'] === 1): ?>
                                                <td>
                                                    <div class="action">
                                                        <button class="text-danger p-0">
                                                            <i class="lni lni-trash-can delete-admin d-block p-2" data-userid="<?= $admin['UserID'] ?>"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach ?>
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
        </div>
        <!-- ========== tables-wrapper end ========== -->
    </div>
    <!-- end container -->
</section>