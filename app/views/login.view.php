<?php require 'partials/head.php'; ?>
<?php require 'partials/navbar.php' ?>

<main>
    <div class="container">
        <h1>
            Inloggen
        </h1>

        <div class="row">
            <div class="col-6">
                <form action="/login" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Vul een geldig e-mailadres in.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Wachtwoord</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Vul een wachtwoord in.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Inloggen</button>
                </form>
            </div>
        </div>
    </div>

</main>

<?php require 'partials/footer.php';
