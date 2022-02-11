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


<div class="h-full rounded shadow-lg p-5 mt-5 bg-white">
    <div class="d-flex flex-column justify-content-between align-items-center">
        <div>
            <div class="d-flex flex-column align-items-center">
                <div class="flex">
                        <span class="text-gray-900 mr-5">{{ ucfirst(trans($question->name)) }}</span>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-3 break-words">
        <h3 class="text-xl text-gray-900 font-semibold">
            <a href="/answerList?id={{ $question->id }}" class="text-underline-hover">{{ ucfirst(trans($question->title)) }}</a>
        </h3>

        <p class="text-gray-800 leading-7 mt-1">
            {{ ucfirst(trans($question->content)) }}
        </p>
    </div>

    <div class="row justify-content-start mt-4">

            <span class="col-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                </svg>
                <span>0</span>
            </span>

            <span class="col-2">
                <form method="get" action="{{ route('answer.show') }}">
                    <button type="submit" name="question-id" class="btn btn-outline-dark border-light p-1" value="{{ $question->id }}">
                        <svg class="fw-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                        </svg>
                    </button>
                    <span>0</span>
                </form>
            </span>

    </div>
</div>

@endforeach
