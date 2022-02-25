<style>
    .text-underline-hover {
        text-decoration: none;
        color: black;
    }
    .text-underline-hover:hover {
        text-decoration: underline;
        color: black;
    }
</style>

@foreach ($questions as $question)

    <div class="w-100 border-bottom border-primary p-4 bg-white">
        <div class="d-flex flex-column p-2">

            <div class="justify-content-start">
                 <span class="text-gray-900 mr-5 fst-italic">{{ ucfirst(trans($question->name)) }}</span>
            </div>

        </div>

        <div class="mt-2 break-words p-2">
            <h4 class="text-xl text-gray-900 font-semibold">
                <a href="/answerList?id={{ $question->id }}" class="text-underline-hover">{{ ucfirst(trans($question->title)) }}</a>
            </h4>

            <p class="text-gray-800 leading-7 mt-3">
                {{ ucfirst(trans($question->content)) }}
            </p>
        </div>

        <div class="row justify-content-start pt-2">
            @auth
            <span class="col-2">
                <form method="get" action="{{ route('answer.show') }}">
                    <button type="submit" name="question-id" class="btn btn-outline-dark border-light" value="{{ $question->id }}">
                        Rispondi
                    </button>
                </form>
            </span>
            @endauth

            <span class="col-2">
                <a class="btn btn-outline-dark border-light" href="/answerList?id={{ $question->id }}">
                    <span class="material-icons md-24">comment</span><span class="badge bg-dark">{{ $answers->where('question_id', $question->id)->count() }}</span>
                </a>
            </span>
        </div>

    </div>

@endforeach

    <div class="d-flex justify-content-center pt-5 mt-5">
            {{ $questions->links('vendor.pagination.bootstrap-4', ['elements' => $questions]) }}
    </div>
