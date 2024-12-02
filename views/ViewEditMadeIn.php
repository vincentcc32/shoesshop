<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Edit Made</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="admin.php?ctrl=product&view=madeinlist">Made In List</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Made In
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
                        <h6>Made IN</h6>
                    </div>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Made In</label>
                                    <input required type="text" placeholder="Made IN" name="name" value="<?= $made['Name'] ?>" />
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="main-btn primary-btn btn-hover" name="editmadein">
                                    Edit Made IN
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