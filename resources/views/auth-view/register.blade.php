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
</head>

<style>
    html,
    body {
        font-family: 'Montserrat', sans-serif;
    }
</style>

<body>

    <x-header.show-header />

    <section class="vh-100 main">
        <div class="container-fluid h-100">
            <div class="row vh-100">

                <div class="col-lg-5 bg-white text-dark d-flex align-items-center">
                    <div class="container-md">
                        <h2><i>Benvenuto!</i></h2>
                        <h3><i>Inserisci i tuoi dati per registrarti</i></h3>
                    </div>
                </div>
                <div class="col-lg-7 bg-dark text-white d-flex align-items-center">

                        <div class="card-body p-5 mt-5">

                            @error('exists')<div class="text-danger">* Questa mail è già registrata, provane una nuova o effettua il login *</div>@enderror

                            @include('components.forms.register-form')

                        </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
