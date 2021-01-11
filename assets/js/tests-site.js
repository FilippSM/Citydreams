$(document).ready(function() {
    $('.header__burger').click(function(event) {
        $('.header__burger,.header__menu').toggleClass('active');
        $('body').toggleClass('lock');
    }); 
});

//выделение активной ссылки
$(function() {
  $('.header__menu [href]').each(function() {
    if (this.href == window.location.href) {
      $(this).addClass('active');
    }
  });
});

//автоматическая нумерация таблицы

$('.tablepress-id-1 tbody tr').each(function(i) {
var number = i + 1;
$(this).find('td:first').text(number+".");
});

$('.tablepress-id-2 tbody tr').each(function(i) {
var number = i + 1;
$(this).find('td:first').text(number+".");
});

$('.tablepress-id-3 tbody tr').each(function(i) {
var number = i + 1;
$(this).find('td:first').text(number+".");
});

$('.tablepress-id-4 tbody tr').each(function(i) {
var number = i + 1;
$(this).find('td:first').text(number+".");
});

$('.tablepress-id-5 tbody tr').each(function(i) {
var number = i + 1;
$(this).find('td:first').text(number+".");
});

$('.tablepress-id-6 tbody tr').each(function(i) {
var number = i + 1;
$(this).find('td:first').text(number+".");
});



//вывод таблицы в pdf
//$(document).ready(function() {
//    $('.tablepress-id-1').DataTable( {
//        dom: 'Bfrtip',
//        buttons: [
//            {
//                extend: 'pdfHtml5',
//                orientation: 'landscape',
//                pageSize: 'LEGAL'
//            }
//        ]
//    } );
//} );


//автоматическая нумерация таблицы, в строках ставится нумерация которая получается при вывыводе, а не общая

//$(document).ready(function() {
//    var t = $('.tablepress-id-1').DataTable( {
//        "columnDefs": [ {
//            "searchable": false,
//            "orderable": false,
//            "targets": 0
//        } ],
////        "order": [[ 1, 'asc' ]]
//    } );
// 
//    t.on( 'order.dt search.dt', function () {
//        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
//            cell.innerHTML = i+1;
//        } );
//    } ).draw();
//} );

////горизонтальная прокрутка
//$(document).ready(function() {
//    $('.tablepress-id-1').DataTable( {
//        "scrollX": true
//    } );
//} );

