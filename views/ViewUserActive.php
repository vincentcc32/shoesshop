<div class="profile">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item fs-3"><a href="?ctrl=user&view=profileuser">Profile</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Active</li>
            </ol>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-bg-light p-4 border rounded-1 mb-4">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h6 class="fs-2">Active</h6>
                    </div>
                    <?php if (isset($_SESSION['mess'])): ?>
                        <h4 class="fs-3 text-danger"><?= $_SESSION['mess'] ?></h4>
                    <?php unset($_SESSION['mess']);
                    endif; ?>
                    <div class="profile-info">
                        <div class="input-style-1">
                            <label class="mb-4 fs-4 d-block">SDT</label>
                            <input class="fs-4 w-100 p-3 mb-4" type="text" placeholder="<?= $_SESSION['user']['SDT'] == null ? 'enter phone number' : "" ?>" name="sdt" value="<?= $_SESSION['user']['SDT'] ?>" />
                        </div>
                        <button class="btn btn-primary p-3 text-bg-primary fs-4 w-100 text-center send-code-sdt">
                            Send code
                        </button>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
</div>