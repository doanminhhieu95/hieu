$(document).ready(function () {
    $(document).on('click', '.delete-modal', function () {
        $('#footer_action_button').text("Delete");
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.dname').html($(this).data('name'));
        $('.deleteContent').show();
        $('#myModal').modal('show');
    });
    $('.modal-footer').on('click', '.delete', function () {
        $.ajax({
            type: 'get',
            url: '/deleteUser',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function (data) {
                $('.item' + $('.did').text()).remove();
                window.location.reload();
            }
        });
    });
});