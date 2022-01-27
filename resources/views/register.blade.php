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
                <a class="navbar-brand">Alex's Q&A</a>
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
                <div class="col-md-5 bg-white text-dark">
                    <div class="log container-md">
                        <h2><i>Benvenuto!</i></h2>
                        <h3><i>Inserisci i tuoi dati per registrarti</i></h3>
                    </div>
                </div>
                <div class="col-md-7 bg-dark text-white">
                    <div class="log-form">
                        <div class="card-body">


                            @error('exist')<div class="text-danger">*Questa mail è già registrata, provane una nuova o effettua il login</div>@enderror


                            <form action="{{ route('register.perform') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <h1 class="mb-5">Registrati</h1>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Nome</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control form-control-lg" />
                                    @error('name')<div class="text-danger">* Inserire un nome</div>@enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input id="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" />
                                    @error('email')<div class="text-danger">*Inserire un mail valida </div>@enderror

                                </div>

                                <div class="form-outline mb-5">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control form-control-lg" />
                                    @error('password')<div class="text-danger">*La password deve contenere almeno 4 caratteri</div>@enderror
                                </div>

                                <button class="btn btn-outline-light btn-lg btn-block mt-1 mb-5" id="create" type="submit">Registrati</button>

                                <div class="d-flex mt-4 pb-4">
                                    <a href="/login" class="btn btn-outline-secondary" role="button" data-bs-toggle="button">Hai già un account?</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</body>

</html>