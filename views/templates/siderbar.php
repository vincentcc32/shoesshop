<div class="siderbar d-none d-lg-block">
    <h4 class="text-uppercase fs-1 text-center my-2">MENU</h4>
    <ul class="siderbar__list">
        <?php if (isset($_SESSION['user'])): ?>
            <li class="py-3"><a href="?ctrl=user&view=profileuser" class="siderbar__list-link text-danger overflow-hidden">Welcom: <?= $_SESSION['user']['Username'] ?></a></li>
        <?php endif; ?>
        <li class="py-3"><a href="?ctrl=product&view=favourite" class="siderbar__list-link">Favourite</a></li>
        <?php if (isset($_SESSION['user'])): ?>
            <li class="py-3"><a href="?ctrl=product&view=orders" class="siderbar__list-link">orders</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['user'])): ?>
            <li class="py-3"><a href="?ctrl=product&view=orders" class="siderbar__list-link">Chat</a></li>
        <?php endif; ?>
        <li class="py-3">
            <p class="d-inline-flex gap-1">
                <button class="btn fs-3 p-0 d-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1 py-2">
                    Category <i class="fa-solid fa-caret-down fs-3"></i>
                </button>
            </p>
            <div class="collapse" id="collapseExample1">
                <div class="card border-0 rounded-0">
                    <a href="?ctrl=product&view=categoryshoes&make=1" class="d-block py-3 fs-3 text-dark ">Shoes</a>
                    <a href="?ctrl=product&view=categoryfashion&make=1" class="d-block py-3 fs-3 text-dark ">Fashion</a>
                </div>
            </div>
        </li>
        <?php if (isset($_SESSION['user'])): ?>
            <li class="py-3"><a href="?ctrl=user&view=logout" class="siderbar__list-link">Logout</a></li>
        <?php endif; ?>
    </ul>
</div>