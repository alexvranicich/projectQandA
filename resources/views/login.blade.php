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

    .log {
        color: white;
        padding-top: 22rem;
    }

    .log-form {
        padding-top: 10rem;
        padding-left: 3rem;
        width: 45rem;
    }
</style>

<body>

    <x-header.show-header />

    <section class="main">
        <div class="container-fluid pt-5 mt-4" style="height: 58rem;">
            <div class="row h-100">
                <div class="col-md-5 bg-dark">
                    <div class="log container-md">
                        <h2><i>Bentornato!</i></h2>
                        <h3><i>Inserisci i tuoi dati per loggarti</i></h3>
                    </div>
                </div>
                <div class="log-form col-md-7 bg-white">
                    <div class="card-body">

                        @error('exist')<div class="text-danger">{{ $message }}</div>@enderror

                        <x-forms.login-form />

                    </div>
                </div>
            </div>
        </div>

    </section>

</body>

</html>