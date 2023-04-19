$(document).ready(function() {
    let rowsShown = 10;
    let rowsTotal = $('#displayTable').attr('data-length');
    let totalPages = Math.ceil(rowsTotal/rowsShown);
    let currentPage = 0;
    let currentHeader = $('#displayTable').attr('data-sortHeader');
    let currentDirection = $('#displayTable').attr('data-sortDirection');

    $('#page-select').html('Page 1/'+totalPages);

    // Populate pagination buttons
    for(i=0;i<totalPages;i++) {
        var pageNum = i + 1;
        $('.insert-pages').append('<li class="page-item"><a class="page-link" href="#" rel="'+i+'">'+pageNum+'</a></li>');
        $('.dropdown-pages').append('<a class="dropdown-item" href="#" rel="'+i+'">'+pageNum+'</a>');
    }

    $('.insert-pages li').filter(function () {
        return $(this).children('.page-link').attr('rel') == currentPage;
    }).addClass('active');

    $('.insert-pages li:first').addClass('active');

    function paginate() {
        $('.insert-pages li').removeClass('active');
        $('.pagination .page-item').removeClass('disabled');
        $('.insert-pages li').filter(function () {
            return $(this).children('.page-link').attr('rel') == currentPage;
        }).addClass('active');
        $('#page-select').html('Page '+(parseInt(currentPage)+1)+'/'+totalPages);
        $('#bodyContent').html('<tr><td><strong>Loading...</strong></td></tr>');
        $.ajax({
            url:'populate-content.php',
            method:'POST',
            dataType: 'html',       
            data:{page: currentPage,
                sortHeader: currentHeader,
                sortDirection: currentDirection,
                perPage: rowsShown},
            success:function(data){
                $('#bodyContent').html(data);
            },
            error:function(){
                $('#bodyContent').html('<tr><td><strong>Error...</strong></td></tr>');
            }
        });
    }

    // Select Dropdown Page Number
    $('.dropdown-pages a').bind('click',function(){
        if (currentPage != $(this).attr('rel')) {
            if (parseInt(currentPage) < parseInt($(this).attr('rel')) && parseInt($(this).attr('rel')) > 2 && parseInt($(this).attr('rel')) < parseInt(totalPages)) {
                $('.insert-pages').animate({scrollLeft: ((parseInt($(this).attr('rel')) - 2) * 42) - 2}, 0);
            } else if (parseInt(currentPage) > parseInt($(this).attr('rel')) && parseInt($(this).attr('rel')) > 0 && parseInt($(this).attr('rel')) < parseInt(totalPages) - 2) {
                $('.insert-pages').animate({scrollLeft: ((parseInt($(this).attr('rel')) - 2) * 42) - 2}, 0);
            }
            currentPage = $(this).attr('rel');
            paginate();
        }
    });

    // Select Page Number
    $('.insert-pages li').bind('click', function(){
        if (currentPage != $(this).children('.page-link').children('.page-link').attr('rel')) {
            if (parseInt(currentPage) < parseInt($(this).children('.page-link').attr('rel')) && parseInt($(this).children('.page-link').attr('rel')) > 2 && parseInt($(this).children('.page-link').attr('rel')) < parseInt(totalPages)) {
                $('.insert-pages').animate({scrollLeft: ((parseInt($(this).children('.page-link').attr('rel')) - 2) * 42) - 2}, 0);
            } else if (parseInt(currentPage) > parseInt($(this).children('.page-link').attr('rel')) && parseInt($(this).children('.page-link').attr('rel')) > 0 && parseInt($(this).children('.page-link').attr('rel')) < parseInt(totalPages) - 2) {
                $('.insert-pages').animate({scrollLeft: ((parseInt($(this).children('.page-link').attr('rel')) - 2) * 42) - 2}, 0);
            }
            currentPage = $(this).children('.page-link').attr('rel');
            paginate();
        }
    });

    // Select First Page
    $('.firstPage').bind('click', function(){
        $(this).addClass('disabled');
        if (currentPage > 0) {
            $('.insert-pages').animate({scrollLeft: 0}, 0);
            currentPage = 0;
            paginate();
        }
    });

    // Select Previous Page
    $('.prevPage').bind('click', function(){
        $(this).addClass('disabled');
        if (currentPage > 0) {
            $('.insert-pages').animate({scrollLeft: ((parseInt(currentPage) - 3) * 42) - 2}, 0);
            currentPage = currentPage - 1;
            paginate();
        }
    });

    // Select Next Page
    $('.nextPage').bind('click', function(){
        $(this).addClass('disabled');    
        if (currentPage < totalPages - 1) {
            $('.insert-pages').animate({scrollLeft: ((parseInt(currentPage) - 1) * 42) - 2}, 0);
            currentPage = parseInt(currentPage) + 1;   
            paginate();
        }
    });

    // Select Last Page
    $('.lastPage').bind('click', function(){
        $(this).addClass('disabled');    
        if (currentPage < totalPages - 1) {
            $('.insert-pages').animate({scrollLeft: parseInt(totalPages) * 212}, 0);
            currentPage = totalPages - 1;
            paginate();
        }
    });

    paginate();
});