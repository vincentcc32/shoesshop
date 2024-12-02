<div class="login">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Login</li>
            </ol>
        </div>
        <div class="login__title">
            <h1 class="fs-1 fw-bold mb-3">Login</h1>
            <p class="fs-4 ">If you already have an account, please log in here</p>
        </div>
        <form action="" method="post" class="login__form">
            <label for="login-email" class="fs-3 d-block mb-3">Email<span class="text-danger">*</span></label>
            <input type="email" name="email" id="login-email" class="fs-4 w-100 p-3 mb-4" placeholder="Exam@gmail.com">
            <label for="login-pass" class="fs-3 d-block mb-3">Password<span class="text-danger">*</span></label>
            <input type="password" name="password" id="login-pass" class="fs-4 w-100 p-3 ">
            <?php if (isset($_SESSION['mess'])): ?>
                <p class="alert alert-warning fs-4 mt-4"><?= $_SESSION['mess'] ?></p>
            <?php unset($_SESSION['mess']);
            endif;  ?>
            <?php if (isset($_SESSION['timeout'])): ?>
                <p class="alert alert-warning fs-4 mt-4"><?= $_SESSION['timeout'] ?></p>
            <?php unset($_SESSION['timeout']);
            endif;  ?>
            <button type="submit" class="text-light text-bg-dark px-5 py-2 fs-3 mt-4" name="login">Login</button>
            <a href="?ctrl=user&view=forgotpassword" class="fs-4 ms-sm-4 text-dark p-1 d-block d-sm-inline-block mt-4">Forgot Password</a>
        </form>
    </div>
</div>