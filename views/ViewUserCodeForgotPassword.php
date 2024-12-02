<div class="forgot-password pb-5">
    <div class="container min-h-70vh">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="my-5 pt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-3"><a href="?ctrl=page&view=home">Home</a></li>
                <li class="breadcrumb-item fs-3"><a href="?ctrl=user&view=login">Login</a></li>
                <li class="breadcrumb-item fs-3"><a href="?ctrl=user&view=forgotpassword">Forgot Password</a></li>
                <li class="breadcrumb-item active fs-3" aria-current="page">Code</li>
            </ol>
        </div>
        <div class="Register__title">
            <h1 class="fs-1 fw-bold mb-3">Code</h1>
            <p class="fs-4 ">Please enter code in email</p>
        </div>
        <div class="code-form">
            <div class="forgot-password__form ">
                <label for="code-email" class="fs-3 d-block mb-3">Code<span class="text-danger">*</span></label>
                <input type="text" name="code" id="code-email" class="fs-4 w-100 p-3 mb-4" placeholder="6 number" maxlength="6" minlength="6">
                <p class="alert alert-warning fs-4 mt-4 mess" hidden></p>
                <button class="text-light text-bg-dark px-5 py-2 fs-3 mt-4 code-forgot-password">send
                    code</button>
            </div>
        </div>
    </div>
</div>