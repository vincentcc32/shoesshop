<section class="table-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Users Management</h2>
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
                                            <h6>Phone Number</h6>
                                        </th>
                                        <th>
                                            <h6>Status</h6>
                                        </th>
                                        <th>
                                            <h6>Action</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td>
                                                <div class="employee-image">
                                                    <?php if (isset($user['Avatar'])): ?>
                                                        <img src="./public/images/uploads/<?= $user['Avatar'] ?>" alt="" />
                                                    <?php else: ?>
                                                        <img src="./public/images/user.jpg" alt="" />
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <p><?= $user['Username'] ?></p>
                                            </td>
                                            <td class="min-width">
                                                <p><a href="mailto:<?= $user['Email'] ?>"><?= $user['Email'] ?></a></p>
                                            </td>
                                            <td class="min-width">
                                                <p><?= $user['SDT'] ?></p>
                                            </td>
                                            <td class="min-width">
                                                <?php if ($user['Active']): ?>
                                                    <span class="status-btn success-btn">Done</span>
                                                <?php else: ?>
                                                    <span class="status-btn active-btn">Active</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <button class="text-danger p-0">
                                                        <i class="lni lni-trash-can delete-user d-block p-2" data-userid="<?= $user['UserID'] ?>"></i>
                                                    </button>
                                                </div>
                                            </td>
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