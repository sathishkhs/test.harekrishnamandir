$(document).ready(function(){
    $('#events_table').DataTable({
        "ajax": {
            'url':'events/events_list'
        },

        "columnDefs": [
            { 
                "targets": [ 0 ], //first column / numbering column
                "orderable": false, //set not orderable
            },
            ],
    });

});