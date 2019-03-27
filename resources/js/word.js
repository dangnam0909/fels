$(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#favorite-form').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            type : 'get',
            url: '/add/word/' + id,
            cache: false,
            success: function(data){
                location.reload();
            }
        });
    });
});
