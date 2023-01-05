function getslug(val){
    $.getJSON('ajax/getslug/charitable_programs_model/page_slug/' + val, function(data) {
        $("#" + data.field_id).val(data.field_val);
    });
}
$(document).ready(function() {



    $('#charitable_program_table').DataTable({
        "ajax": {
            url: "charitable_programs/charitable_programs_list",
        },

        "columnDefs": [
            { 
                "targets": [ 0 ], //first column / numbering column
                "orderable": false, //set not orderable
            },
            ],
    });
})