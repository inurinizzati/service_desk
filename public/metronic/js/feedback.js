$(document).ready(function () {
    var table;
    if ($.fn.DataTable.isDataTable('.m-datatable')) {
        table = $('.m-datatable').DataTable();
    } else {
        table = $('.m-datatable').DataTable({
            language: { url: "https://cdn.datatables.net/plug-ins/1.13.7/i18n/en-GB.json" },
        });
    }


    $('#feedbackSearch').on('keyup', function () {
        table.search(this.value).draw();
    });


    if ($("#ratingFilter").length) {
        $("#ratingFilter").on("change", function () {
            var rating = $(this).val();

            if (rating && rating !== "all") {
                table.rows().every(function () {
                    var row = this.node();
                    var match = $(row).find('[data-filter="' + rating + '"]').length > 0;
                    if (match) $(row).show();
                    else $(row).hide();
                });
            } else {
                table.rows().every(function () {
                    $(this.node()).show();
                });
            }
        });
    }
});
