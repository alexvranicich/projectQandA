<style>

    .text-underline-hover {
        text-decoration: none;
        color: black;
    }
    .text-underline-hover:hover {
        text-decoration: underline;
        color: black;
    }

    svg{
        width: 2rem;
    }

</style>

@foreach ($questions as $question)


<div class="h-full shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex flex-column p-2">
        <div>
            <div class="d-flex flex-column justify-content-start">
                <div class="flex">
                    <span class="text-gray-900 mr-5 fst-italic">{{ ucfirst(trans($question->name)) }}</span>
                </div>
            </div>
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

    <div class="row justify-content-start pt-2 mt-4">

            <span class="col-2">
                <button name="question-id" class="btn btn-outline-dark border-light" value="{{ $question->id }}">
                    <span class="material-icons md-24">thumb_up</span>
                </button>
                <span>0</span>
            </span>

            <span class="col-2">
                <form method="get" action="{{ route('answer.show') }}">
                    <button type="submit" name="question-id" class="btn btn-outline-dark border-light" value="{{ $question->id }}">
                        <span class="material-icons md-24">comment</span>
                    </button>
                    <span>
                        {{ $answers->where('question_id', $question->id)->count() }}
                    </span>
                </form>
            </span>

    </div>
</div>

@endforeach
