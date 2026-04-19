<nav class="navbar navbar-expand-lg navforum px-2 mb-3">
    <div class="container-fluid">

        <!-- Bouton hamburger -->
        <button class="navbar-toggler custom-toggler mb-3" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuPrincipal"
                aria-controls="menuPrincipal"
                aria-expanded="false"
                aria-label="Ouvrir le menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-center" id="menuPrincipal">
            <ul class="navbar-nav gap-2 text-center">

                <li class="nav-item">
                    <a class="nav-link menu-btn <?= ($page == 1) ? 'active-link' : 'inactive-link' ?>"
                       href="sommes.php">
                        Qui sommes-nous ?
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-btn <?= ($page == 2) ? 'active-link' : 'inactive-link' ?>"
                       href="ressourcerie.php">
                        Qu'est ce qu'une ressourcerie ?
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-btn <?= ($page == 3) ? 'active-link' : 'inactive-link' ?>"
                       href="projet.php">
                        Le projet et son avancement
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-btn <?= ($page == 6) ? 'active-link' : 'inactive-link' ?>"
                       href="ouverture.php">
                        Ouvertures du local
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-btn <?= ($page == 5) ? 'active-link' : 'inactive-link' ?>"
                       href="contact.php">
                        Contact, docs et adhésion
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>