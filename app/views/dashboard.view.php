<?php require 'partials/head.php'; ?>
<?php require 'partials/navbar.php'; ?>

<main>
    <div class="container-fluid">
        <a class="btn btn-primary my-3" href="/dashboard/files/upload">Nieuw bestand uploaden</a>
        <table id="table_id" class="display table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Bestandsnaam</th>
                    <th>Datum aangemaakt</th>
                    <th>Opties</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($files as $file) : ?>
                <tr>
                    <td class="">
                        <?= $file->name ?>
                    </td>
                    <td class="">
                        <?= $file->created ?>
                    </td>

                    <td class="">

                        <a class="d-inline-block"
                            href="<?= "/dashboard/files/show?file_id=$file->id" ?>">
                            Openen
                        </a>
                        <a class="d-inline-block"
                            href="<?= "/dashboard/files/download?file_id=$file->id" ?>">
                            Downloaden
                        </a>
                        <a class="d-inline-block"
                            href="<?= "/dashboard/files/delete?file_id=$file->id" ?>">
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
            language: {
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