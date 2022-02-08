<div>

    {{--  Tabella da autenticato  --}}

    @auth
    <table class="table table-hover text-center align-middle" style="margin-top: 5rem;">

        <div id="error"></div>

        <thead>
            <tr>
                <th scope="col">Chiesta da</th>
                <th scope="col">Argomento</th>
                <th scope="col">Domanda</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>

            @if($questions->count() == 0)
                <tr>
                    <td colspan="5">Non ci sono ancora domande</td>
                </tr>
            @endif

            @foreach($questions as $question)

            <tr class="clickable-row" style="cursor:pointer;" data-href="/answerList?id={{ $question->id }}">
                <td scope="row" id="user_id" value='{{ $question->user_id }}'>{{ ucfirst(trans($question->name)) }}</td>
                <td>{{ ucfirst(trans($question->title)) }}</td>
                <td>{{ ucfirst(trans($question->content)) }}</td>
                <td>
                    <form method="get" action="{{ route('answer.show') }}">
                        <input type="submit" name="question-id" class="btn btn-outline-success p-4" value="Rispondi" />
                        <input type="hidden" name="question-id" value="{{ $question->id }}" />
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>
    @endauth

    {{--  Tabella da guest  --}}

    @guest
    <table class="table table-hover align-middle mt-5">

        <thead>
            <tr>
                <th scope="col">Argomento</th>
                <th scope="col">Domanda</th>
            </tr>
        </thead>

        <tbody>

            @if($questions->count() == 0)
                <tr>
                    <td colspan="5">Non ci sono ancora domande</td>
                </tr>
            @endif

            @foreach ($questions as $question)

                <tr>
                    <td scope="row"> {{ ucfirst(trans($question->title)) }} </td>
                    <td> {{ ucfirst(trans($question->content)) }} </td>
                </tr>

            @endforeach

        </tbody>

    </table>
    @endguest

</div>

@auth
<script>

    ////    Rende l'intera riga cliccabile  /////

    var log_id = {{ Auth::user()->id }};

    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            if ($(".clickable-row #user_id").val() == log_id) {
                $('#error').empty().text('Non puoi rispondere ad una tua domanda');
            } else
            window.location = $(this).data("href");
        });
    });

</script>
@endauth
