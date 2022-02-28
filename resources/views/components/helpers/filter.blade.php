
<div class="w-100 border-start border-2 border-danger p-4 bg-white">
    <div class="d-flex flex-column mb-5 pb-2">

        <div class="justify-content-start">
            <h5 class="mb-3 fw-bolder">Argomenti più cercati</h5>
        </div>

    </div>

    @foreach ($questions->unique('title') as $question)

    <div class="p-2">
        <p class="text-gray-900 font-semibold fst-italic">
            <a href="/home?search={{ ucfirst(trans($question->title)) }}" class="text-underline-hover">{{ ucfirst(trans($question->title)) }}</a>
        </p>
    </div>

    @endforeach

</div>


