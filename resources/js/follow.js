$(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#follow-form').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            type : 'POST',
            url: '/user/follow',
            cache: false,
            data: {id: id},
            success: function(data){
                location.reload();
            }
        });
    });
});
