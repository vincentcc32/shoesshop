<footer class="footer mt-5">
    <div class="container">
        <div class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom py-4 mb-3">
                <li class="nav-item"><a href="index.php?ctrl=page&view=home" class="nav-link px-2 text-light fs-4">Home</a></li>
                <li class="nav-item"><a href="index.php?ctrl=page&view=about" class="nav-link px-2 text-light fs-4">About</a></li>
                <li class="nav-item"><a href="index.php?ctrl=page&view=services" class="nav-link px-2 text-light fs-4">Services</a></li>
                <li class="nav-item"><a href="index.php?ctrl=page&view=contact" class="nav-link px-2 text-light fs-4">Contact</a></li>
            </ul>

        </div>
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5 class="text-light fs-2 mb-4">Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=home" class="nav-link p-0 text-light fs-4">Home</a></li>
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=about" class="nav-link p-0 text-light fs-4">About</a></li>
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=services" class="nav-link p-0 text-light fs-4">Services</a></li>
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=contact" class="nav-link p-0 text-light fs-4">Contact</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5 class="text-light fs-2 mb-4">Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=home" class="nav-link p-0 text-light fs-4">Home</a></li>
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=about" class="nav-link p-0 text-light fs-4">About</a></li>
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=services" class="nav-link p-0 text-light fs-4">Services</a></li>
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=contact" class="nav-link p-0 text-light fs-4">Contact</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5 class="text-light fs-2 mb-4">Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=home" class="nav-link p-0 text-light fs-4">Home</a></li>
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=about" class="nav-link p-0 text-light fs-4">About</a></li>
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=services" class="nav-link p-0 text-light fs-4">Services</a></li>
                    <li class="nav-item mb-2"><a href="index.php?ctrl=page&view=contact" class="nav-link p-0 text-light fs-4">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-5">
                <form>
                    <h5 class="text-light fs-4 mb-4">Subscribe to our newsletter</h5>
                    <p class="text-light fs-4 mb-4">Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary fs-5" type="button">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center text-light fs-4 pb-5">© 2024 Copyright belongs to Ta Cong Cuong</p>
    </div>
</footer>



<script>
    window.addEventListener('load', function() {
        document.querySelector('.loader-wapper').className += ' hidden';
    });
</script>

<script>
    const searchIcon = document.querySelector('.header__item-search-icon');
    const searchInput = document.querySelector('.header__item-search-input');
    searchIcon.onclick = () => {
        if (searchInput.value.length > 0) {
            window.location.href = `index.php?ctrl=product&view=search&key=${searchInput.value}`;
        } else {

            alert('Enter product to search');
        }
    }
</script>
<script src="./public/js/app.js"></script>
<script src="./public/js/bootstrap.bundle.min.js"></script>
</body>

</html>