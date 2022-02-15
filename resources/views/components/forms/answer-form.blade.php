<div>

    <form id="answer_form" action="{{ route('answer.store') }} " method="post">
        @csrf

        <div class=row>

            <div class="form-outline col-md-8">
                <textarea class="form-control" form="answer_form" name="content" value = "{{ old('content') }}" rows="10" placeholder="Scrivi qui la risposta" required></textarea>
                @error('content')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3 offset-md-1">
                <button name="answer_form" type="submit" class="btn btn-outline-success btn-block p-5 m-5">Rispondi</button>
                <input type="hidden" name="question_id" id="question_id" value="{{ $questions->id }}" />
            </div>

        </div>
    </form>

</div>
