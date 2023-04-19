function sortTable(selection) {
    $('input[name=sortBy]').val(selection);
    $('#sort-form').submit();
}

$('th.header').click(function() {
    if ($(this).hasClass('headerSortDown')) {
        sortTable($(this).attr('abbr')+' DESC');
    } else {
        sortTable($(this).attr('abbr')+' ASC');
    }    
});