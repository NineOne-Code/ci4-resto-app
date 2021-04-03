<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand brand-icon fw-light" href="<?= base_url('/') ?>">Waroeng Pinggiran</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="" id="navbarNav">
            <ul class="navbar-nav float-end">
                <li class="nav-item dropdown">
                    <a class="btn btn-light dropdown" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user text-secondary"></i><span class="badge rounded-circle bg-danger badge-counter order-count"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item d-flex justify-content-between btn-finish" data-bs-target="#finishModal" data-bs-toggle="modal" href="#">
                                Cart<span class="badge rounded-circle bg-danger order-count"></span>
                            </a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>