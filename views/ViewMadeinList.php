<!-- ========== table components start ========== -->
<section class="table-components">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Made in List</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6 text-end">
                    <a href="admin.php?ctrl=product&view=addmadein" type="button" class="btn btn-primary px-3 d-inline-flex align-items-center"><span class="me-2">Add Made In</span> <i class="lni lni-plus fs-6"></i></a>
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
                                        <th class="lead-phone">
                                            <h6>STT</h6>
                                        </th>
                                        <th class="lead-company">
                                            <h6>Made IN</h6>
                                        </th>
                                        <th>
                                            <h6>Action</h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($dsmade); $i++): ?>
                                        <tr>
                                            <td class="min-width">
                                                <p><?= $i + 1 ?></p>
                                            </td>
                                            <td class="min-width">
                                                <p><?= $dsmade[$i]['Name'] ?></p>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <button class="text-danger p-0 ">
                                                        <i class="lni lni-trash-can delete-madein fs-4 d-block p-2" data-madeinid="<?= $dsmade[$i]['MakeInID'] ?>"></i>
                                                    </button>
                                                    <button class="text-success p-0">
                                                        <a href="admin.php?ctrl=product&view=editmadein&id=<?= $dsmade[$i]['MakeInID'] ?>" class="lni lni-pencil-alt fs-4 d-block p-2"></a>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
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
    </div>