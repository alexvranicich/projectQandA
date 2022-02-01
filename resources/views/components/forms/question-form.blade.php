<div>
    <form id="question_form" action="{{ route('question.store') }}" method="post">
        @csrf

        <div class="form-outline p-4 m-4 mb-4 font-weight-bold">
            <h4 class="form-label p-2" for="text">Argomento</h4>
            <input type="text" value="{{ old('title') }}" class="form-control p-2 rounded border border-dark" name="title" placeholder="Matematica, storia ..." name="title">
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <hr>

        <div class="answer row m-5 p-4">

            <div class="form-outline col-md-8">
                <h4 class="form-label p-2" for="text">Domanda</h4>
                <textarea class="form-control rounded border border-dark p-3" value="{{ old('content') }}" form="question_form" name="content" rows="8" placeholder="Scrivi qui la domanda..."></textarea>
                @error('content')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3 offset-md-1">
                <button name="question_form" type="submit" class="btn btn-outline-success btn-block p-5" style="margin-top:5rem;">Manda</button>
            </div>

        </div>
    </form>
</div>