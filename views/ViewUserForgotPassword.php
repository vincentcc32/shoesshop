<div class="forgot-password pb-5">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item fs-3"><a href="?ctrl=user&view=login">Login</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Forgot Password</li>
            </ol>
        </div>
        <div class="Register__title">
            <h1 class="fs-1 fw-bold mb-3">Forgot Password</h1>
            <p class="fs-4 ">Please enter email</p>
        </div>
        <form action="" method="POST" class="forgot-password__form">
            <label for="forgot-email" class="fs-3 d-block mb-3">Email<span class="text-danger">*</span></label>
            <input required type="email" name="email" id="forgot-email" class="fs-4 w-100 p-3 mb-4" placeholder="Exam@gmail.com">
            <?php if (isset($_SESSION['mess'])): ?>
                <p class="alert alert-warning fs-4 mt-4"><?= $_SESSION['mess'] ?></p>
            <?php unset($_SESSION['mess']);
            endif;  ?>
            <button type="submit" name="forgot-password-btn" class="text-light text-bg-dark px-5 py-2 fs-3 mt-4 ">send
                email</button>
        </form>
    </div>
</div>