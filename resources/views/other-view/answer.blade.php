<!DOCTYPE html>
<html lang="it">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alex's Q&A</title>

    <!-- Fonts & Scripts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
    html,
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .main {
        margin-top: 8rem;
        height: 30rem;
    }

    .image {
        object-fit: fill;
    }
</style>


<body>

    <div class="container-fluid">

        <x-header.show-header />

        <!-- Main with form and image -->

        <section class="main container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <div class="container-md">

                        @isset($errorMsg)
                        <div class="mail p-3 w-100 text-danger">
                            <h5>
                               {{ $errorMsg }}
                            </h5>
                        </div>
                        @endisset

                        @empty($errorMsg)
                        <div class="mail p-2 w-100">
                            <h5>
                                @empty($errorMsg) Rispondi a <i>{{ $name }}</i> @endempty
                            </h5>
                        </div>
                        @endempty

                        <hr>

                        <div class="question p-5 w-100">
                            <h2> {{ $questions->content }}  </h2>
                        </div>

                        <hr>

                        <div class="answer p-5">

                            @include('components.forms.answer-form', ['questions' => $questions])

                        </div>
                    </div>
                </div>

                <div class="col-md-4 image">
                    <img src="https://images.unsplash.com/photo-1555435024-e86cc54f6e48?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8dGhpbmtpbmclMjBtYW58ZW58MHwxfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                </div>

            </div>

        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>

</html>
