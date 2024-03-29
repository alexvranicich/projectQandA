@foreach ($answers as $answer)

    <!--    Parte superiore: nome utente che ha risposto e Avg Rating     -->

    <div class="w-75 border-bottom border-primary p-4 bg-white">
        <div class="d-flex flex-column">

            <div class="row justify-content-between">

                <div class="col">
                    Risposta di <span class="text-gray-900 mr-5 fst-italic">{{ ucfirst(trans($answer->name)) }}</span>
                </div>

                <div class="col-1">
                    <div class="badge bg-light text-warning">
                        <span class="material-icons">star_rate</span>
                        <span class="badge bg-dark">{{ App\Models\Rating::AvgRating($answer->id) }}</span>
                    </div>
                </div>

            </div>
        </div>

    <!--  Parte inferiore: contenuto risposta e testo per valutare  -->

        <div class="row mt-3 justify-content-between">
            <div class="col">
                <h3>
                    {{ ucfirst(trans($answer->content)) }}
                </h3>
            </div>
            @auth
            <div class="col-1">
                <button type="button" class="open-modal btn btn-outline-dark border-secondary mt-4 popover-dismiss" data-useranswerid="{{ $answer->user_id }}"
                    data-logid="{{ Auth::user()->id ?? ''}}" data-answerid="{{ $answer->id }}" data-bs-target="#modal-rate-{{ $answer->id }}">
                    Valuta
                </button>
            </div>
            @endauth
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
                            <input type="radio" class="rating" id="5-{{ $answer->id }}" name="voto-{{ $answer->id }}" value="5.0" /><label for="5-{{ $answer->id }}">☆</label>
                            <input type="radio" class="rating" id="4-{{ $answer->id }}" name="voto-{{ $answer->id }}" value="4.0" /><label for="4-{{ $answer->id }}">☆</label>
                            <input type="radio" class="rating" id="3-{{ $answer->id }}" name="voto-{{ $answer->id }}" value="3.0" /><label for="3-{{ $answer->id }}">☆</label>
                            <input type="radio" class="rating" id="2-{{ $answer->id }}" name="voto-{{ $answer->id }}" value="2.0" /><label for="2-{{ $answer->id }}">☆</label>
                            <input type="radio" class="rating" id="1-{{ $answer->id }}" name="voto-{{ $answer->id }}" value="1.0" /><label for="1-{{ $answer->id }}">☆</label>
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
