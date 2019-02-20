/**
 * Created by Aaroor on 12/30/2017.
 */
/* Get Page Data*/
var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;
getPageData();
function getPageData() {
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page:page}
    }).done(function(data){
        manageRow(data);
       // is_ajax_fire=1;
    });
}


/* Add new Item table row */
function manageRow(data) {



    //$("tbody").append('<tr><td>Tiger Nixon</td><td>System Architect</td><td>System Architect</td><td>61</td><td>2011/04/25</td><td>$320,800</td></tr>' +
    //        '<tr><td>Aarooran</td><td>System Architect</td><td>System Architect</td><td>61</td><td>2011/04/25</td><td>$320,800</td></tr>');
    var val=document.getElementById("test");
    var	rows = '';

    $.each( data, function( key, value ) {


        rows = rows + '<tr>';
        rows = rows + '<td>Tiger Nixon</td>';
        rows = rows + '<td>System Architect</td>';
        rows = rows + '<td>61</td>';
        rows = rows + '<td>2011/04/25</td>';
        rows = rows + '<td>$320,800</td>';
        rows = rows + '</tr>';


    });

    val.innerHTML=rows;






    $("tbody").html(rows);
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
