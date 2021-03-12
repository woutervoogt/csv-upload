<header>
    <nav id="top-navbar" class="navbar navbar-expand-lg">

        <div class="container-fluid">
            <a class="navbar-brand p-0 me-1 me-sm-2" href="/">
                CSV upload
            </a>
            <button class="navbar-toggler top-nav-toggle" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i data-feather="menu"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="/dashboard">Dashboard</a>
                    </li>

                </ul>

                <ul class="navbar-nav">
                    <?php if (isset($_SESSION) && isset($_SESSION['user'])) : ?>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" role=" button" id="logout-dropdown" data-toggle="dropdown">
                            <?= $_SESSION['user']['name'] ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="nav-link" href="/logout" style="color:black">
                                Uitloggen
                            </a>
                        </div>


                    </li>
                    <?php else : ?>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" role="button" id="login-dropdown" data-toggle="dropdown">
                            Inloggen
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form class="px-3 py-2 needs-validation" method="POST" action="/login" novalidate>
                                <div class="form-group mb-2">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback">
                                        Vul een geldig e-mailadres in.
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password">Wachtwoord</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <div class="invalid-feedback">
                                        Vul een wachtwoord in.
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Inloggen</button>
                            </form>

                            <a class="dropdown-item" href="/register">Nog geen account? Maak er een aan</a>
                            <a class="dropdown-item" href="#">Wachtwoord vergeten?</a>
                        </div>



                    </li>
                    <?php endif ?>
                </ul>


            </div>
        </div>
    </nav>

</header>