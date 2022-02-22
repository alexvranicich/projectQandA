/////  Gestisce la paginazione   /////


$(document).ready(function () {

    $(document).on('click', '.pagination page-item', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page) {

        var l = window.location;

        $.ajax({
            url: l.origin + l.pathname + "?page=" + page,
            success: function (questions) {
                $('#fetchData').html(questions);
            }
        });
    }
});
