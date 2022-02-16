@foreach ($answers as $answer)


<div class="h-full border-start border-primary p-4 bg-white">
    <div class="d-flex flex-column">


        <div class="row justify-content-between">
            <div class="col">
                Risposta da: <span class="text-gray-900 mr-5 fst-italic">{{ ucfirst(trans($answer->name)) }}</span>
            </div>
            <div class="col-3">
                <button type="button" class="open-modal btn btn-outline-dark border-light" data-useranswerid="{{ $answer->user_id }}"
                    data-logid="{{ Auth::user()->id }}"  data-answerid="{{ $answer->id }}"
                    data-bs-toggle="modal"  data-bs-target="#modal-rate-{{ $answer->id }}">
                    <span class="material-icons">star_rate</span>
                </button>
                <span>0</span>
            </div>
        </div>


    </div>

    <div class="mt-3 justify-content-start">
        <h3>
            {{ ucfirst(trans($answer->content)) }}
        </h3>
    </div>


</div>


<!--  Rating Modal  -->

        <div class="modal modal-rate fade" aria-labelledby="rateModelLabel" id="modal-rate-{{ $answer->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rateModalLabel">Valuta la risposta di {{ $answer->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class ="rating" id="star-form-{{ $answer->id }}">
                        <div class="rating">
                            <input type="radio" class="rating" id="5-{{ $answer->id }}" name="voto-{{ $answer->id }}" value="5" /><label for="5-{{ $answer->id }}">☆</label>
                            <input type="radio" class="rating" id="4-{{ $answer->id }}" name="voto-{{ $answer->id }}" value="4" /><label for="4-{{ $answer->id }}">☆</label>
                            <input type="radio" class="rating" id="3-{{ $answer->id }}" name="voto-{{ $answer->id }}" value="3" /><label for="3-{{ $answer->id }}">☆</label>
                            <input type="radio" class="rating" id="2-{{ $answer->id }}" name="voto-{{ $answer->id }}" value="2" /><label for="2-{{ $answer->id }}">☆</label>
                            <input type="radio" class="rating" id="1-{{ $answer->id }}" name="voto-{{ $answer->id }}" value="1" /><label for="1-{{ $answer->id }}">☆</label>
                        </div>
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="star-submit-{{ $answer->id }}" name="star-submit-{{ $answer->id }}">Vota</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    </div>
                </div>
            </div>
        </div>

@endforeach
