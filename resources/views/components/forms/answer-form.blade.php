<div>

    <form id="answer_form" action="{{ route('answer.store') }} " method="post">
        @csrf

        <div class=row>

            <div class="form-outline col-md-8">
                <textarea class="form-control" form="answer_form" name="content" value = "{{ old('content') }}" rows="10" placeholder="Scrivi qui la risposta" required></textarea>
            </div>

            <div class="col-md-3 offset-md-1">
                <button name="answer_form" type="submit" class="btn btn-outline-success btn-block p-5 m-5">Rispondi</button>
                <input type="hidden" name="question_id" value="<?php echo $id_question ?>" />
            </div>
            
        </div>
    </form>

</div>