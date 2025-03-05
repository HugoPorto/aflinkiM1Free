<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= $this->request->base . '/' ?>">Aflinki | Suite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= $this->request->base . '/' ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $this->request->base . '/receipts' ?>">Gerador de Recibos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Uppercase Lowercase
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= $this->request->base . '/utils/uppercase' ?>">Uppercase</a></li>
                            <li><a class="dropdown-item" href="<?= $this->request->base . '/utils/lowercase' ?>">Lowercase</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= $this->request->base . '/utils/how-works' ?>">Como Funciona?</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>