var base_url = js_base_url;
var site_url = js_site_url;


//////////////////Statistics//////////////////////////////////////////////////////////////
$(document).ready(function() {
    //statistics table
    var statistics_table = $('#statistics_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar statistics_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
        "oTableTools": {
            "aButtons": [
                {
                    "sExtends": "collection",
                    "sButtonText": "<i class='fa fa-cloud-download'></i>",
                    "aButtons": ["csv", "xls", "pdf", "copy"]
                }
            ]
        },
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [0]}
        ],
        "aaSorting": [[3, "desc"]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        },
    });

    $(".statistics_table_tbar").html('<div class="table-tools-actions"></div>');

    $('#statistics_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#statistics_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

});