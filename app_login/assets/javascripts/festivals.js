$(document).ready(function(){
  
    $('#festival_table').DataTable({
        "ajax": {
            'url':'festivals/festivals_list'
        },

        "columnDefs": [
            { 
                "targets": [ 0 ], //first column / numbering column
                "orderable": false, //set not orderable
            },
            ],
    });
    
  
    
})

function getslug(val){
    $.getJSON('ajax/getslug/festivals_model/page_slug/' + val, function(data) {
        $("#" + data.field_id).val(data.field_val);
    });
}
