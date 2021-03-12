<?php require 'partials/head.php'; ?>
<?php require 'partials/navbar.php' ?>

<main>
    <div class="container-fluid">
        <a class="btn btn-primary my-3" href="/dashboard">Terug</a>
        <a class="btn btn-primary my-3"
            href="<?= "/dashboard/files/download?file_id=$file->id" ?>">
            Download CSV
        </a>
        <table id="table_id" class="display table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Boekjaar</th>
                    <th>Week</th>
                    <th>Datum</th>
                    <th>Persnr</th>
                    <th>Uren</th>
                    <th>Uurcode</th>
                    <th>Opties</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($fileRows as $row) : ?>
                <tr>

                    <td class="">
                        <?= $row->boekjaar ?>
                    </td>
                    <td class="">
                        <?= $row->week ?>
                    </td>
                    <td class="">
                        <?= $row->datum ?>
                    </td>
                    <td class="">
                        <?= $row->persnr ?>
                    </td>
                    <td class="">
                        <?= $row->uren ?>
                    </td>
                    <td class="">
                        <?= $row->uurcode ?>
                    </td>
                    <td class="">
                        <button type="button" class="btn btn-link p-0" data-toggle="modal"
                            data-target="#editModal<?= $row->id ?>">
                            Aanpassen
                        </button>
                        <div class="modal fade"
                            id="editModal<?= $row->id ?>"
                            tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form
                                        action="/dashboard/files/rows/edit?row_id=<?= $row->id ?>&file_id=<?= $file->id ?>"
                                        method="post" name="edit_csv_form">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label
                                                    for="input-boekjaar<?= $row->id ?>">Boekjaar</label>
                                                <input type="text" class="form-control"
                                                    id="input-boekjaar<?= $row->id ?>"
                                                    name="boekjaar"
                                                    value="<?= $row->boekjaar ?>"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="input-week<?= $row->id ?>">Week</label>
                                                <input type="text" class="form-control"
                                                    id="input-week<?= $row->id ?>"
                                                    name="week"
                                                    value="<?= $row->week ?>"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="input-datum<?= $row->id ?>">Datum</label>
                                                <input type="text" class="form-control"
                                                    id="input-datum<?= $row->id ?>"
                                                    name="datum"
                                                    value="<?= $row->datum ?>"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="input-persnr<?= $row->id ?>">Persnr</label>
                                                <input type="text" class="form-control"
                                                    id="input-persnr<?= $row->id ?>"
                                                    name="persnr"
                                                    value="<?= $row->persnr ?>"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="input-uren<?= $row->id ?>">Uren</label>
                                                <input type="text" class="form-control"
                                                    id="input-uren<?= $row->id ?>"
                                                    name="uren"
                                                    value="<?= $row->uren ?>"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="input-uurcode<?= $row->id ?>">Uurcode</label>
                                                <input type="text" class="form-control"
                                                    id="input-uurcode<?= $row->id ?>"
                                                    name="uurcode"
                                                    value="<?= $row->uurcode ?>"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annuleren</button>
                                            <button type="submit" class="btn btn-primary">Opslaan</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <a class="d-inline-block"
                            href="<?= "/dashboard/files/rows/delete?row_id=$row->id&file_id=$file->id" ?>">
                            Verwijderen
                        </a>
                    </td>

                </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</main>


<?php require 'partials/footer.php'; ?>

<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            "lengthMenu": [
                [25, 50, 75, 100, 200, -1],
                [25, 50, 75, 100, 200, "Alles"]
            ],
            "language": {
                "lengthMenu": "_MENU_ resultaten weergeven",
                "zeroRecords": "Geen resultaten gevonden",
                "infoEmpty": "Geen resultaten om weer te geven",
                "search": "Zoeken:",
                "emptyTable": "Geen resultaten aanwezig in de tabel",
                "infoThousands": ".",
                "loadingRecords": "Een moment geduld aub - bezig met laden...",
                "paginate": {
                    "first": "Eerste",
                    "last": "Laatste",
                    "next": "Volgende",
                    "previous": "Vorige"
                },
                "aria": {
                    "sortAscending": ": activeer om kolom oplopend te sorteren",
                    "sortDescending": ": activeer om kolom aflopend te sorteren"
                },
                "autoFill": {
                    "fill": "Vul alle cellen met <i>%d<\/i>",
                    "fillHorizontal": "Vul cellen horizontaal",
                    "fillVertical": "Vul cellen verticaal",
                    "cancel": "Annuleren",
                    "info": "Informatie"
                },
                "buttons": {
                    "collection": "Collectie",
                    "colvis": "Kolom zichtbaarheid",
                    "colvisRestore": "Herstel zichtbaarheid",
                    "copy": "Kopieer",
                    "copySuccess": {
                        "1": "1 regel naar klembord gekopieerd",
                        "_": "%ds regels naar klembord gekopieerd"
                    },
                    "copyTitle": "Kopieer naar klembord",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Toon alle regels",
                        "_": "Toon %d regels",
                        "1": "Toon 1 regel"
                    },
                    "pdf": "PDF",
                    "print": "Print",
                    "copyKeys": "Klik ctrl of u2318 + C om de tabeldata to kopiëren naar je klembord. Om te annuleren klik hier of klik op escape."
                },
                "info": "_START_ tot _END_ van _TOTAL_ regels",
                "infoFiltered": " (gefilterd uit _MAX_ regels)",
                "processing": "Verwerken...",
                "decimal": ",",
                "searchBuilder": {
                    "add": "Toevoegen",
                    "clearAll": "Verwijder alles",
                    "condition": "Conditie",
                    "data": "Data",
                    "deleteTitle": "Verwijder",
                    "value": "Waarde",
                    "conditions": {
                        "date": {
                            "after": "Na",
                            "before": "Voor",
                            "between": "Tussen",
                            "empty": "Leeg",
                            "equals": "Gelijk aan",
                            "not": "Niet",
                            "notBetween": "Niet tussen",
                            "notEmpty": "Niet leeg"
                        },
                        "number": {
                            "between": "Tussen",
                            "empty": "Leeg",
                            "equals": "Gelijk aan",
                            "gt": "Groter dan",
                            "gte": "Groter dan of gelijk aan",
                            "lt": "Kleiner dan",
                            "lte": "kleiner dan of gelijk aan",
                            "not": "Niet",
                            "notBetween": "Niet tussen",
                            "notEmpty": "Niet leeg"
                        },
                        "string": {
                            "contains": "Bevat",
                            "empty": "Leeg",
                            "endsWith": "Eindigt met",
                            "equals": "Gelijk aan",
                            "not": "Niet",
                            "notEmpty": "Niet leeg",
                            "startsWith": "Start met"
                        },
                        "array": {
                            "equals": "Gelijk aan",
                            "empty": "Leeg",
                            "contains": "Bevat",
                            "not": "Niet",
                            "notEmpty": "Niet leeg",
                            "without": "Zonder"
                        }
                    },
                    "logicAnd": "En",
                    "logicOr": "Of",
                    "button": {
                        "0": "Zoekwizard",
                        "_": "Zoekwizard (%d)"
                    },
                    "leftTitle": "Afwijkende criteria",
                    "rightTitle": "Criteria inspringen",
                    "title": {
                        "0": "Zoekwizard",
                        "_": "Zoekwizard (%d) "
                    }
                },
                "searchPanes": {
                    "clearMessage": "Alles leegmaken",
                    "collapse": {
                        "0": "Zoekpanelen",
                        "_": "Zoekpanelen (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Geen zoekpanelen",
                    "loadMessage": "Zoekpanelen laden...",
                    "title": "%d filters actief"
                },
                "select": {
                    "1": "%d rij geselecteerd",
                    "_": "%d rijen geselecteerd",
                    "cells": {
                        "1": "1 cel geselecteerd",
                        "_": "%d cellen geselecteerd"
                    },
                    "columns": {
                        "1": "1 kolom geselecteerd",
                        "_": "%d kolommen geselecteerd"
                    },
                    "rows": {
                        "0": "%d rijen geselecteerd",
                        "1": "1 rij geselecteerd",
                        "_": "%d rijen geselecteerd"
                    }
                },
                "thousands": ".",
                "searchPlaceholder": "Zoekterm"
            }
        });
    });
</script>