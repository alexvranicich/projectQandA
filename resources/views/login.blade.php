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

    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top p-3">
            <div class="container-md">
                <a class="navbar-brand mr-5">Alex's Q&A</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-end h5" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="/home">Home</a>
                    </div>
                </div>
            </div>
        </nav>
    </section>


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
        
                        <form action="{{ route('login.perform') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <h1 class="mb-5">Loggati</h1>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-5">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control form-control-lg" />
                            </div>

                            <button class="btn btn-outline-dark btn-lg btn-block mt-1 mb-5" id="create" type="submit">Login</button>

                            <div class="w-50">
                                <p class="mb-0 mb-2">Non sei ancora registrato?</p>
                                <a href="/register" class="btn btn-outline-secondary pl-3" role="button" data-bs-toggle="button">Registrati</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>

</body>

</html>