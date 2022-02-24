<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alex's Q&A</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/fontawesome.min.css" type="text/css" media="all" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    @stack('scripts')

</head>

<style>
    html,
    body {
        font-family: 'Montserrat', sans-serif;
        padding-top: 4rem;
    }

    .main {
        height: 30rem;
    }

    .image {
        object-fit: fill;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 1em;
        font-size: 30px;
        font-weight: 300;
        color: #FFD600;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }
</style>

<body>

    <x-header.show-header />

    <div class="main container-fluid pt-2">

        <!--    Domanda    -->
        <div class="row m-5 p-4 gx-2">

            <div class="col-2 col-lg">
                <h5>Domanda</h5>
            </div>

            <div class="col-lg border-start border-danger p-3">
                <h3> {{ $question->content }} </h3>
            </div>

        </div>

        <div class="container-fluid d-flex justify-content-center">
            <hr style="width:85%; opacity:1;">
        </div>


        <div class="alert alert-success alert-dismissible collapse w-25" id="alert-success" role="alert">
            <span class="success"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>


        <div class="row m-5 p-4 gx-1">

            <div class="col-2 col-lg">
                <h5>Risposte</h5>
            </div>

            <div class="col-lg">

                @if($answers->count() == 0)
                    <div>
                        <h5>Non ci sono ancora risposte a questa domanda</h5>
                    </div>
                @else
                    <div id="fetchData">
                        @include('components.tables.answer-table', ['answers' => $answers])
                    </div>
                @endif

            </div>

        </div>

                <!--  Button per rispondere  -->

        <div class="text-center p-4 m-5">
                <h4 class="pb-4">@if($answers->count()!=0) Non sei soddisfatto delle risposte? @else Vuoi essere il primo a rispondere? @endif</h4>
            <form method="get" action=" {{ route('answer.show') }}">
                <input type="submit" name="question-id" class="btn btn-outline-dark p-4" value="Prova te a dare una risposta" />
                <input type="hidden" name="question-id" value="{{ $question->id }}" />
            </form>
        </div>

        <div class="d-flex justify-content-center ">
            {{ $answers->links('vendor.pagination.bootstrap-4', ['elements' => $answers]) }}
        </div>


    </div>


<script src="{{ url('js/rating.js') }}"></script>
<script src="{{ url('js/pagination.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>

</html>

