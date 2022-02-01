<div>
    <table class="table table-hover text-center align-middle" style="margin-top: 5rem;">

        <thead>
            <tr>
                <th scope="col">Chiesta da</th>
                <th scope="col">Argomento</th>
                <th scope="col">Domanda</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody id="MyTable">

            @if($questions->count() == 0)
                <tr>
                    <td colspan="5">Non ci sono ancora domande</td>
                </tr>
            @endif

            @foreach($questions as $question)

            <tr class="clickable-row" style="cursor:pointer;" data-href="/answers?id={{ $question->id }}">
                <td scope="row" id="name" value='{{ $question->name }}'>{{ $question->name }}</td>
                <td>{{ $question->title }}</td>
                <td>{{ $question->content }}</td>
                <td>
                    <form method="post" action="{{ route('answer.show') }}">
                        <input type="submit" name="question-id" class="btn btn-outline-success p-4" value="Rispondi" />
                        <input type="hidden" name="question-id" value="{{ $question->id }}" />
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>
</div>

