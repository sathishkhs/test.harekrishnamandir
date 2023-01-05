$(document).ready(function(){

    // var donations = $('#festival_donations_table').DataTable({ 
    //     // 'processing': true,
    //     //  'serverSide': true,
    //     //  'serverMethod': 'post',
    //     //  "searching": true,
    //     "ajax": {
    //         url: "festival_donations/donations_list/",
           
    //     },
        
    //     // Set column definition initialisation properties.
    //     "columnDefs": [
    //     { 
    //         "targets": [ 0 ], //first column / numbering column
    //         "orderable": false, //set not orderable
    //     },
    //     ],
    // })

});

function get_list(slug){
  
    var donations = $('#donations_table').DataTable({ 
            // 'processing': true,
            //  'serverSide': true,
            //  'serverMethod': 'post',
            'destroy':true,
             "searching": false,
             "paging":false,
            "ajax": {
                url: "festival_donations/donations_list/"+slug,
               
            },
            
            // Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ 0 ], //first column / numbering column
                "orderable": false, //set not orderable
            },
            ],
        })
}