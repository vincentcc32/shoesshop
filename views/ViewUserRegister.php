<div class="register">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="index.php?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Register</li>
            </ol>
        </div>
        <div class="Register__title">
            <h1 class="fs-1 fw-bold mb-3">Register</h1>
            <p class="fs-4 ">If you don't have an account, please register here</p>
        </div>
        <form action="" method="post" class="register__form">
            <label for="register-name" class="fs-3 d-block mb-3">Username<span class="text-danger">*</span></label>
            <input required type="text" name="username" id="register-name" class="fs-4 w-100 p-3 mb-4" placeholder="Username">
            <label for="register-email" class="fs-3 d-block mb-3">Email<span class="text-danger">*</span></label>
            <input required type="email" name="email" id="register-email" class="fs-4 w-100 p-3 mb-4"
                placeholder="Exam@gmail.com">
            <label for="register-pass" class="fs-3 d-block mb-3">Password<span class="text-danger">*</span></label>
            <input required type="password" name="password" id="register-pass" class="fs-4 w-100 p-3 mb-4">
            <label for="register-confpass" class="fs-3 d-block mb-3">Confirm password<span class="text-danger">*</span></label>
            <input required type="password" name="confpassword" id="register-confpass" class="fs-4 w-100 p-3 ">
            <?php if (isset($_SESSION['mess'])): ?>
                <p class="alert alert-warning fs-4 mt-4"><?= $_SESSION['mess'] ?></p>
            <?php unset($_SESSION['mess']);
            endif;  ?>
            <button type="submit" class="text-light text-bg-dark px-5 py-2 fs-3 mt-4"
                name="register">Register</button>
        </form>
    </div>
</div>