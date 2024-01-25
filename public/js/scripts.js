$(document).ready(function () {

  $('#search-button').click(function () {
    $.ajax({
      url: '/server-filtering-sorting/search',
      type: 'get',
      dataType: 'json',
      data: {
        query: $('#search-input').val()
      }
    }).done(function (response) {
      
      $('#users-table tbody').html(response.tableContent);
      $('.pagination').html(response.pagination);
    }).fail(function () {

    });
  });
});