    ///// Chiamata ajax per gestire il rating  /////


    $(document).on("click", ".open-modal", function () {
        var user_id = $(this).data('logid');
        var answer_id = $(this).data('answerid');
        var user_answer_id = $(this).data('useranswerid');
        var rating = 0;

    if (user_id === user_answer_id) {
        alert("Non puoi rispondere ad una tua domanda");
        $('#modal-rate-' + answer_id).modal('hide');
        exit();
    }

    else if (user_id === '' || answer_id === '') {
        alert("C'è un prolema con gli ID di questa risposta, riprova con un'altra domanda");
        exit();
    }

    else {
        $('#star-submit-' + answer_id).click(function () {
            rating = $('input[name=voto-' + answer_id + ']:checked').val();

            if (rating === 0 || typeof rating === "undefined")
                alert("Selezionare un voto");
            else
            {
                $.ajax({
                    url: "/rating",
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        answer_id: answer_id,
                        rating: rating
                    }
                })

                    .done(function (result) {
                        $('#modal-rate-' + answer_id).modal('hide');

                        jQuery('.alert').show();
                        jQuery('.alert').html(result.success);
                    })

                    .fail(function (jqXHR, textStatus, errorThrown) {
                        alert("C'è stato un problema con la chiamata ajax");
                    })
            }
        });
    }
});


