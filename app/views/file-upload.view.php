<?php require 'partials/head.php'; ?>
<?php require 'partials/navbar.php' ?>

<main>
    <div class="container">
        <form action="/dashboard/files/upload" method="post" enctype="multipart/form-data" name="csv_import_form">
            <div class="form-group">
                <label for="file-name">Naam</label>
                <input type="text" class="form-control" id="file-name" name="file_name" accept=".csv" required>
            </div>

            <div class="form-group">
                <label for="csv-file">Urenbestand selecteren</label>
                <input type="file" class="form-control" id="csv-file" name="csv_file" accept=".csv" required>
            </div>

            <button type="submit" class="btn btn-primary" name="csv_import">Uploaden</button>
        </form>
    </div>
</main>

<?php require 'partials/footer.php';
